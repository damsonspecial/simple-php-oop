<?php
class Dbh {
// private $host ="localhost";
// private $user ="root";
// private $pwd ="";
// private $dbName ="phpoop";
// protected function connecting(){
//   $dsn = 'mysql:host='.$this->host.'; dbname=' . $this->dbName;
//   $pdo = new PDO($dsn, $this->user, $this->pwd);
//   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//   return $pdo;
// }
protected function connect(){

  
  try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbh = new PDO("mysql:host=$servername;dbname=phpoop", $username, $password);
    // set the PDO error mode to exception
   return $dbh;
  } 
  catch(PDOException $e) {
    echo "Error!: " . $e->getMessage(). "<br/>";
    die();
  }
}
}