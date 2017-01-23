<?php
  class ItemModel extends ExecuteModel {
    public $itemCount = array(); // 카테고리 별 아이템 개수를 저장하는 배열

    public function getAllItem($categoryno) {
      $sql = "SELECT * FROM item where category=:categoryno";
      $items = $this->getAllRecord($sql, array(":categoryno" => $categoryno));
      $this->itemCount[$categoryno] = count($items);
      return $items;
    }

    public function getItemCount($categoryno) {
      if(isset($this->itemCount[$categoryno]))
        return $this->itemCount[$categoryno];
      else {
        $sql = "SELECT * FROM item where category=:categoryno";
        $stmt = $this->execute($sql, array(":categoryno" => $categoryno));
        return $stmt->rowCount();
      }
    }

    public function getItemDetail($itemno) {
      $sql = "SELECT * FROM item WHERE itemno = :itemno";
      return $this->getRecord($sql, array(":itemno" => $itemno));
    }

    public function getItemname($itemno) {
      $sql = "SELECT itemname FROM item where itemno = :itemno";
      return $this->getRecord($sql, array(":itemno" => $itemno));
    }

  }
 ?>
