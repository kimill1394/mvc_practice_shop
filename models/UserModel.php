<?php
  class UserModel extends ExecuteModel {

    public function insert($id, $name, $pass, $email) {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO user(userid, userpw, username, useremail) VALUES (:id, :pass, :name, :email)";
      $this->execute($sql, array(':id'=>$id, ':pass'=>$pass, ':name'=>$name, ':email'=>$email));
    }

    public function getUserRecord($id) {
      $sql = "SELECT * FROM user WHERE userid=:id";
      $user = $this->getRecord($sql, array(':id'=>$id));
      return $user;
    }

  }
?>
