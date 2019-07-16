<?php
require_once './dto.php';

function getCon() {
  try {
    /*$pdo = new PDO("pgsql:dbname=$this->nameDB;host=$this->hostDB;port=$this->port;", $this->userDB, $this->passBD);*/

    global $nameDB, $hostDB, $port, $userDB, $passBD; 

    $pdo = new PDO("pgsql:dbname=$nameDB;host=$hostDB;port=$port;", $userDB, $passBD);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (\Exception $e) {
    echo "Oh no: ".$e->getMessage();
    return null;
  }
}

 ?>
