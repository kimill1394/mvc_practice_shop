<?php
  class ProductController extends Controller {
    protected $_authentication = array();

    public function listAction($params) {

      if (isset($params['no']))
        $num = $params['no'];
      else print("카테고리 넘버 초기화 작업중~");

      $items = $this->_connect_model->get('item')->getAllItem($num);
      $itemcount = $this->_connect_model->get('item')->getItemCount($num);

      $list_view = $this->render(
        array("num" => $num,
              "items" => $items,
              "itemcount" => $itemcount));

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
      $itemname = $this->_connect_model->get('item')->getItemname($itemno)['itemname'];
        date_default_timezone_set('Asia/Seoul');
      $time = date("Y/m/d(D)");
      $listCount = $this->_connect_model->get('shoppinglist')->getListCount();


      $this->_connect_model->get('mysheep')->addMySheep($listCount, $userid, $itemno, $sheepname);
      $this->_connect_model->get('shoppinglist')->addItem($listCount, $userid, $itemname, $time);

      $this->redirect("/detail/$itemno");
    }
  }
 ?>
