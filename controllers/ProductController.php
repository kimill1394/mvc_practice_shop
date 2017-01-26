<?php
  class ProductController extends Controller {
    protected $_authentication = array();
    const ITEMLIMIT = 6;

    public function listAction($params) {

      // 카테고리 초기화
      if (isset($params['category']))
        $category = $params['category'];
      else $category = 0;

      // 페이지 초기화
      if (isset($params['page']))
        $page = $params['page'];
      else $page = 1;

      // 페이징
      $start = ($page-1)*self::ITEMLIMIT;
      $end = $start + self::ITEMLIMIT;

      $items = $this->_connect_model->get('item')->getItem($category, $start, $end);
      $count = $this->_connect_model->get('item')->getItemCount($category);

      $page_count = ceil($count/self::ITEMLIMIT);

      $list_view = $this->render(
        array("items" => $items, "pagecount" => $page_count));

      return $list_view;
    }

    public function detailAction($params) {

      $num = $params['no'];

      $details = $this->_connect_model->get('item')->getItemDetail($num);
      $detail_view = $this->render(array("details" => $details));

      return $detail_view;
    }

    public function buyAction($params) {

      $userid = $this->_session->get('user')['userid'];
      $itemno = $params['no'];
      $sheepname = $this->_request->getPost('name');
      $itemname = $this->_connect_model->get('item')->getItemname($itemno);
        date_default_timezone_set('Asia/Seoul');
      $time = date("Y/m/d(D)");
      $listCount = $this->_connect_model->get('shoppinglist')->getListNext();


      $this->_connect_model->get('mysheep')->addMySheep($listCount, $userid, $itemno, $sheepname);
      $this->_connect_model->get('shoppinglist')->addItem($listCount, $userid, $itemname, $time);

      $this->redirect("/detail/$itemno");
    }

    public function addAction() {
      $category = $this->_connect_model->get('category')->getAllCategory();
      return $this->render(array('categorys' => $category));
    }

    public function insertAction() {
      $upload_dir = './img/';
      $insert_dir = '/img/';

      $itemname = $this->_request->getPost('itemname');
      $itemprice = $this->_request->getPost('itemprice');
      $category = $this->_request->getPost('category');
      $itemstar = $this->_request->getPost('itemstar');

      $imgfiles = $this->_request->getFiles('itemimg');
      $imgname = $imgfiles['name'];
      $imgtype = $imgfiles['type'];
      $imgtmp = $imgfiles['tmp_name'];
      $imgerror = $imgfiles['error'];


      if(!$imgerror) {

        $uploadedFile = $upload_dir.$imgname;
        if(!move_uploaded_file($imgtmp, $uploadedFile)) {
          echo "<script> alert('파일을 지정한 디렉토리에 복사하는 데 실패했습니다TT!'); history.go(-1) </script>";
        }
      }

      $insertFile = $insert_dir.$imgname;
      $this->_connect_model->get('item')->insertItem($itemname, $category, $itemprice, $insertFile, $itemstar);

      $this->redirect('/');

    }


  }
 ?>
