<?php
  class ShoppinglistModel extends ExecuteModel {

    public function addItem($listno, $userid, $itemname, $time) {
      $sql = "INSERT INTO shoppinglist VALUES(:no, :id, :itemname, :shoppeddate)";
      $this->execute($sql, array(":no"=>$listno, ":id"=>$userid, ":itemname"=>$itemname, ":shoppeddate"=>$time));
    }

    public function getListCount() {
      $sql = "SELECT * FROM shoppinglist";
      $count = $this->getCount($sql);
      return $count;
    }


  }
 ?>
