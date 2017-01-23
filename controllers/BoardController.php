<?php
  class BoardController extends Controller {

    public function listAction() {

      $boards = $this->_connect_model->get('free')->getList();

      return $this->render(
        array("boards" => $boards)
      );
    }

    public function writeAction($param) {
      if (isset($param['no'])) {
        $no = $param['no'];
        $board = $this->_connect_model->get('free')->read($no);
      } else
        $board = array('freetitle'=>'', 'freecontent'=>'', 'freeno'=>'');

      return $this->render(array('board' => $board));
    }

    public function uploadAction($param) {
        $id = $this->_session->get('user')['userid'];
          date_default_timezone_set('Asia/Seoul');
        $date = date("Y/m/d(D)");
        $title = $this->_request->getPost('title');
        $content = $this->_request->getPost('content');

        if(isset($param['no'])){
          $no = $param['no'];
          $this->_connect_model->get('free')->delete($no);
        } else {
          $no = $this->_connect_model->get('free')->getNextNum()+1;
        }

        $this->_connect_model->get('free')->upload($no, $id, $date, $title, $content);
        $this->redirect('/board/list');
    }

    public function readAction($param) {
      $no=$param['no'];
      $board = $this->_connect_model->get('free')->read($no);
      return $this->render(array("board" => $board));
    }

    public function deleteAction($param) {
      $no = $param['no'];
      $this->_connect_model->get('free')->delete($no);
      $this->redirect('/board/list');
    }

  }
 ?>
