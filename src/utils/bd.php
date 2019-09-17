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

  static function execute($sql, $params) {
    $ct = getCon();
    if($ct != null){
      $sen = $ct->prepare($sql);
      return $sen->execute($params);
    } else {
      return false;
    }
  }

  static function getRes($sql, $params){
    $ct = getCon();
    if($ct != null){
      $res = $ct->prepare($sql);
      return $res->execute($params);
    }
  }


 ?>
