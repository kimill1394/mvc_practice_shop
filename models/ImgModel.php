<?php
  class ImgModel extends ExecuteModel {

    public function getImg($key) {
      $sql = "SELECT img FROM img WHERE name = :key";
      return $this->getRecord($sql, array(":key" => $key))['img'];
    }

  }
 ?>
