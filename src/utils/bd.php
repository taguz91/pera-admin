<?php

  function getCon() {
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
      /*echo "<H1>Nos conectamos satisfactoriamente.</H1>";*/
      return $pdo;
    } catch (\Exception $e) {
      echo "Oh no: ".$e->getMessage();
      return null;
    }
  }


 ?>
