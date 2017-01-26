<?php
  class FileModel extends ExecuteModel {

    public function insertFile($no, $filename, $filepath, $date) {
      $sql = "INSERT INTO file VALUES(:freeno, :filename, :filepath, :filedate)";
      $this->execute($sql, array(":freeno"=>$no, ":filename"=>$filename, ":filepath"=>$filepath, ":filedate"=>$date));
    }

    public function delete($no) {
      $sql = "DELETE FROM file WHERE freeno = :no";
      $this->execute($sql, array(":no" => $no));
    }

    public function read($no) {
      $sql = "SELECT * FROM file WHERE freeno = :no";
      return $this->getAllRecord($sql, array(":no" => $no));
    }

    public function getPath($freeno, $filename) {
      $sql = "SELECT filepath FROM file where freeno=:freeno AND filename=:filename";
      return $this->getRecord($sql, array(":freeno"=>$freeno, ":filename"=>$filename))['filepath'];
    }

  }
 ?>
