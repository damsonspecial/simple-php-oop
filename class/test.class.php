<?php

class Test extends Dbh{

public function getUsers(){
 $sql = "SELECT * FROM users";
 $stmt = $this->connect()->query($sql);
 while($row = $stmt->fetch()){

  echo $row['fname'];
 }
}

public function getUsersStmt($fname,$Lname){
  $sql = "SELECT * FROM users WHERE fname = ? AND Lname =?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$fname,$Lname]);
  $names = $stmt->fetchAll();

  foreach ($names as $name){
    
    echo $name['fname']. '<br>';

  }
  }

 
 }
