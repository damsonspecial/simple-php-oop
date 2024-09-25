<?php

class Signup extends Dbh{
  
  protected function setUser($uid, $pwd, $email){
    $stmt = $this->connect()->prepare('insert into users (user,pwd, email) VALUES (?,?,?)');
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($uid, $hashedpwd, $email))){
      $stmt = null;
      header("Location:../index.php?error=stmtfailed");
      exit();
    }
    $resultcheck;
    if($stmt->rowCount()> 0){
      $resultCheck =true;
    }
  }

    protected function checkUser($uid, $email){
      $stmt = $this->connect()->prepare('SELECT * from users WHERE user = ? or email = ?');
      if(!$stmt->execute(array($uid, $email))){
        $stmt = null;
        header("Location:../index.php?error=stmtfailed");
        exit();
      }
      $resultcheck;
      if($stmt->rowCount()> 0){
        $resultCheck =true;
      }
    }
}