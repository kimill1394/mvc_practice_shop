<?php
  class MemberController extends Controller {
    protected $_authentication = array();
    const JOIN  = 'member/join';
    const LOGIN = 'member/login';


    public function joinAction() {
      if($this->_session->isAuthenticated())
        $this->redirect('/member/mypage');

      $join_view = $this->render(array(
        'user_name' => '',
        'password'  => '',
        '_token'    => $this->getToken(self::JOIN)));

      return $join_view;
    }

    public function registerAction() {
      if(!$this->_request->isPost())
        $this->httpNotFound();

      if($this->_session->isAuthenticated())
        $this->redirect('/member/mypage');

      $token = $this->_request->getPost('_token');
      if(!$this->checkToken(self::JOIN, $token))
        return $this->redirect('/'.self::JOIN);


      $name = $this->_request->getPost('username');
      $id = $this->_request->getPost('userid');
      $pass = $this->_request->getPost('userpw');
      $email = $this->_request->getPost('email1').'@'.$this->_request->getPost('email2');

      $this->_connect_model->get('User')->insert($id, $name, $pass, $email);
      $this->_session->setAuthenticateStatus(true);

      $user = $this->_connect_model->get('User')->getUserRecord($id);
      $this->_session->set('user', $user);

      return $this->redirect('/');
    }




    public function loginAction() {
      if($this->_session->isAuthenticated())
        return $this->redirect('/member/mypage');

      $login_view = $this->render(array(
        'user_name' => '',
        'password' => '',
        '_token' => $this->getToken(self::LOGIN)));

      return $login_view;
    }

    public function authenticateAction() {
      if(!$this->_request->isPost())
        $this->httpNotFound();

      if($this->_session->isAuthenticated())
        return $this->redirect('/member/mypage');

      $token = $this->_request->getPost('_token');
      if(!$this->checkToken(self::LOGIN, $token))
        return $this->redirect('/'.self::LOGIN);

      $userid = $this->_request->getPost('id');
      $password = $this->_request->getPost('passwd');

      $errors = array();

      $user = $this->_connect_model->get('User')->getUserRecord($userid);
      if(!$user || (!password_verify($password, $user['userpw'])))
        $errors[] = '인증 에러!';
      else {
        $this->_session->setAuthenticateStatus(true);
        $this->_session->set('user', $user);
        return $this->redirect('/');
      }
        $this->_session->setAuthenticateStatus(true);
        $this->_session->set('user', $user);
        return $this->redirect('/');
      return $this->render(array(
        'userid' => $userid,
        'password' => $password,
        'errors' => $errors,
        '_token' => $this->getToken(self::LOGIN)
      ));
    }



    public function logoutAction() {
      $this->_session->clear();
      $this->_session->setAuthenticateStatus(false);
      return $this->redirect('/');
    }



    public function mypageAction() {
      if(!$this->_session->isAuthenticated())
        $this->redirect('/list');

      return $this->render();
    }
  }
 ?>
