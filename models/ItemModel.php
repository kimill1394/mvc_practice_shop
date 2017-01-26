<?php
  class ItemModel extends ExecuteModel {

    public function getItem($categoryno, $start, $end) {
      if($categoryno != 0) {
        $sql = "SELECT * FROM item where category=:categoryno ORDER BY itemno DESC LIMIT :start, :end";
        var_dump($sql);
        $items = $this->getAllRecord($sql, array(":categoryno" => $categoryno, ":start" => (int)$start, ":end" => (int)$end));
      } else {
        $sql = "SELECT * FROM item ORDER BY itemno DESC LIMIT :start, :end";
        $items = $this->getAllRecord($sql, array(":start" => $start, ":end" => $end));
      }
      return $items;
    }

    public function getItemCount($categoryno) {
      $sql = "SELECT * FROM item where category=:categoryno";
      $stmt = $this->execute($sql, array(":categoryno" => $categoryno));
      return $stmt->rowCount();
    }

    public function getItemDetail($itemno) {
      $sql = "SELECT * FROM item WHERE itemno = :itemno";
      return $this->getRecord($sql, array(":itemno" => $itemno));
    }

    public function getItemname($itemno) {
      $sql = "SELECT itemname FROM item where itemno = :itemno";
      return $this->getRecord($sql, array(":itemno" => $itemno))['itemname'];
    }

    public function insertItem($itemname, $category, $itemprice, $insertFile, $itemstar) {
      $sql = "INSERT INTO item(itemname, category, itemprice, itemimg, itemstar) VALUES(:name, :category, :price, :img, :star)";
      $this->execute($sql, array(":name"=>$itemname, ":category"=>$category, ":price"=>$itemprice, ":img"=>$insertFile, ":star"=>$itemstar));
    }

  }
 ?>
