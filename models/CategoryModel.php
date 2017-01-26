<?php
  class CategoryModel extends ExecuteModel {

    public function getAllCategory() {
      $sql = "SELECT * FROM category WHERE comment IS NOT NULL";
      return $this->getAllRecord($sql);
    }

  }
 ?>
