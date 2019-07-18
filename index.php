<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
  echo "<h1>Hola mundo!</h1>";

  //header('location: controlador/formulario.php');
  //Probando el modo de crear clases
  require_once 'src/modelo/permisoingresofichas/permisoingresofichasbd.php';

  $permisoingresofichas = new PermisoIngresoFichasBD();
  //$permisoingresofichas->guardarPermisoIngresoFichas();
 // $permisoingresofichas->eliminarPermisoIngresoFichas(25);
  $permisoingresofichas->editarPermisoIngresoFichas(18)
 ?>
