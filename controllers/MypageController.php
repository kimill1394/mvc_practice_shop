<?php
  class MypageController extends Controller {
    protected $_authentication = array();

    public function indexAction() {
      return $this->render();
    }


    public function historyAction() {
      $userid = $this->_session->get('user')['userid'];
      $historyItems = $this->_connect_model->get('mysheep')->getHistory($userid);
      return $this->render(array("historys" => $historyItems));
    }
  }
 ?>
