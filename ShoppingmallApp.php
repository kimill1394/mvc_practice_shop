<?php
  class ShoppingmallApp extends AppBase {

    protected $_signinAction = array('member', 'login');

    protected function doDbConnection() {
      $this->_connectModel->connect('master',
        array( 'string'   =>  'mysql:dbname=shoppingmall;host=localhost;charset=utf8',
               'user'     =>  'jina',
               'password' =>  'jina'));

    }

    public function getRootDirectory() {
      return dirname(__FILE__);
    }

    protected function getRouteDefinition() {
      return array(

        '/member/:action'    => array('controller' => 'member'),

        '/mypage'            => array('controller' => 'mypage', 'action' => 'index'),
        '/mypage/:action'    => array('controller' => 'mypage'),

        '/'                  => array('controller' => 'product', 'action' => 'list'),
        '/list/:no'          => array('controller' => 'product', 'action' => 'list'),
        '/list/:category/:page'          => array('controller' => 'product', 'action' => 'list'),
        '/detail/:no'        => array('controller' => 'product', 'action' => 'detail'),
        '/buy/:no'           => array('controller' => 'product', 'action' => 'buy'),
        '/:action'           => array('controller' => 'product'),

        '/board/list'                     => array('controller' => 'board', 'action' => 'list'),
        '/board/upload/'                  => array('controller' => 'board', 'action' => 'upload'),
        '/board/write'                    => array('controller' => 'board', 'action' => 'write'),
        '/board/:action/:no'              => array('controller' => 'board'),
        '/download/:freeno/:filename'     => array('controller' => 'board', 'action' => 'download')

      );
    }
  }
 ?>
