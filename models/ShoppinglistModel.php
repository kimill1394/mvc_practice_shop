<?php
  class ShoppinglistModel extends ExecuteModel {

    public function addItem($listno, $userid, $itemname, $time) {
      $sql = "INSERT INTO shoppinglist VALUES(:no, :id, :itemname, :shoppeddate)";
      $this->execute($sql, array(":no"=>$listno, ":id"=>$userid, ":itemname"=>$itemname, ":shoppeddate"=>$time));
    }

    public function getListNext() {
      $sql = "SELECT * FROM shoppinglist ORDER BY shoppingno DESC";
      $result = $this->getRecord($sql)['shoppingno'];
      if(!$result) return 1;
      return $result+1;

    }


  }
 ?>
