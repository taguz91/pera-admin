<?php
require_once '../dto.php';

class SQL extends DTO {

  static function getCon() {
    try {
      $pdo = new PDO("pgsql:dbname=$this->nameDB;host=$this->hostDB;port=$this->port;", $this->userDB, $this->passBD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (\Exception $e) {
      echo "Oh no: ".$e->getMessage();
      return null;
    }
  }

  function query($query) {
    try {
      if($query != null){
        $res = $query->execute();
        return $res;
      }else{
        return null;
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
      return null;
    }
  }

  function noquery($noquery){
    try {
      if($noquery != null){
        $res = $noquery->execute();
        return $res;
      } else {
        return null;
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
      return null;
    }
  }
}
 ?>
