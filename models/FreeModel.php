<?php
  class FreeModel extends ExecuteModel {

    public function getList() {
      $sql = "SELECT freeno, freewriter, freedate, freetitle FROM free";
      return $this->getAllRecord($sql);
    }

    public function upload($no, $id, $date, $title, $content) {
      $sql = "INSERT INTO free(freeno, freewriter, freedate, freetitle, freecontent)
              VALUES(:no, :id, :date, :title, :content)";
      $this->execute($sql, array(":no"=>$no, ":id"=>$id, ":date"=>$date, "title"=>$title, "content"=>$content));
    }

    public function read($no) {
      $sql = "SELECT * FROM free WHERE freeno = :no";
      return $this->getRecord($sql, array(":no" => $no));
    }

    public function delete($no) {
      $sql = "DELETE FROM free WHERE freeno = :no";
      $this->execute($sql, array(":no" => $no));
    }

    public function getNextNum() {
      $sql = "SELECT * FROM free ORDER BY freeno DESC";
      return $this->getRecord($sql)['freeno'];
    }

  }
 ?>
