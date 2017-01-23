<?php
  class MysheepModel extends ExecuteModel {

    public function addMySheep($listcount, $userid, $itemno, $sheepname) {
      // $this->_connect_model->get('mysheep')->buySheep($userid, $itemno, $sheepname);
      $sql = "INSERT INTO mysheep(shoppingno, userid, itemno, sheepname) VALUES(:listno, :userid, :itemno, :sheepname)";
      $this->execute($sql, array(":listno"=>$listcount, ":userid"=>$userid, ":itemno"=>$itemno, ":sheepname"=>$sheepname));
    }

    public function getHistory($userid) {
      $sql = "SELECT sl.shoppeddate, i.itemimg, ms.sheepname, i.itemprice, ms.curstar
              FROM shoppinglist sl, mysheep ms, item i
              WHERE sl.shoppingno = ms.shoppingno AND ms.itemno = i.itemno
              AND ms.userid = :userid";
      $result = $this->getAllRecord($sql, array(":userid" => $userid));
      return $result;
    }
  }
 ?>
