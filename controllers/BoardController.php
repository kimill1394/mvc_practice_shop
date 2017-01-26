<?php
  class BoardController extends Controller {
    const WRITE = 'board/write';

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

      return $this->render(array('board' => $board, '_token' => $this->getToken(self::WRITE)));
    }

    public function uploadAction($param) {


      $token = $this->_request->getPost('_token');
      if(!$this->checkToken(self::WRITE, $token))
        return $this->redirect('/'.self::WRITE);


      $upload_dir = './upload/';

      $id = $this->_session->get('user')['userid'];
        date_default_timezone_set('Asia/Seoul');
      $date = date("Y/m/d(D)");
      $title = $this->_request->getPost('title');
      $content = $this->_request->getPost('content');
      $files = $this->_request->getFiles('upfile');

      if(isset($param['no'])){
        $no = $param['no'];
        $this->_connect_model->get('free')->delete($no);
      } else {
        $no = $this->_connect_model->get('free')->getNextNum()+1;
      }

      $this->_connect_model->get('free')->upload($no, $id, $date, $title, $content);

      for($i=0; $i<count($files); $i++) {
        $filename = $files['name'][$i];
        $filetmp = $files['tmp_name'][$i];
        $fileerror = $files['error'][$i];

        if(!$fileerror) {
          $uploadedFile = $upload_dir.$filename;
          if(!move_uploaded_file($filetmp, $uploadedFile))
            // echo "<script> alert('파일을 지정한 디렉토리에 복사하는 데 실패했습니다TT!'); history.go(-1) </script>";
            echo " ; ";
        }

        $filepath = $upload_dir.$filename;
        $this->_connect_model->get('file')->insertFile($no, $filename, $filepath, $date);


      }


      $this->redirect('/board/list');
    }


    public function downloadAction($param) {
      $freeno = $param['freeno'];
      $filename = $param['filename'];

      $filepath = $this->_connect_model->get('file')->getPath($freeno, $filename);

      $this->_response->setHeader('Content-Type','application/x-octetstream');
      $this->_response->send();

      $fp = fopen($filepath, "r"); //호스트의 파일을 열거나 새로 만듬  두번째 매개변수는 접근설정
      fpassthru($fp); //처음 파일 포인터에서 끝까지의 파일 내용을 읽어 표준 출력으로 보냄
      fclose($fp);

    }

    public function readAction($param) {
      $no=$param['no'];
      $board = $this->_connect_model->get('free')->read($no);
      $files = $this->_connect_model->get('file')->read($no);
      return $this->render(array("board" => $board, "files"=>$files));
    }

    public function deleteAction($param) {
      $no = $param['no'];
      $this->_connect_model->get('file')->delete($no);
      $this->_connect_model->get('free')->delete($no);
      $this->redirect('/board/list');
    }

  }
 ?>
