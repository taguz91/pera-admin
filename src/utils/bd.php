<?php

  function getCon(){
    try {
      $dir = "pgsql:dbname="
      .constant('DB')
      .";host="
      .constant('HOST')
      .";port="
      .constant('PORT')
      .";";

      $pdo = new PDO(
        $dir,
        constant('USER'),
        constant('PASS'));

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (\Exception $e) {
      Errores::errorConectarBD($e->getMessage());
      return null;
    }
  }

  function execute($sql, $params) {
    $ct = getCon();
    if($ct != null){
      $sen = $ct->prepare($sql);
      return $sen->execute($params);
    } else {
      return false;
    }
  }

  function getRes($sql, $params){
    $ct = getCon();
    if($ct != null){
      $res = $ct->prepare($sql);
      $res->execute($params);
      return $res;
    }
  }


  function getOneFromSQL($sql, $params){
    $ct = getCon();
    if($ct != null){
      $sen = $ct->prepare($sql);
      $sen->execute($params);
      $res = null;
      while($r = $sen->fetch(PDO::FETCH_ASSOC)){
        $res = $r;
      }
      return $res;
    }
  }

  function getArrayFromSQL($sql, $params){
    $res = [];
    $ct = getCon();
    if($ct != null){
      try {
        $sen = $ct->prepare($sql);
        $sen->execute($params);
        while($r = $sen->fetch(PDO::FETCH_ASSOC)){
          array_push($res, $r);
        }
      } catch (\PDOException $e) {
        return ['error' => $e->getMessage()];
      }
    }
    return $res;
  }

 ?>
