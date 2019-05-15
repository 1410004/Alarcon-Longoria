<?php
  include ("database.php");
  $conexion =new Database();
  if (isset($_POST['login'])){
      $usuario = $_POST['username'];
      $contrasena = $_POST['password'];

      if($conexion->conectar($usuario,$contrasena)!=NULL){
          session_start();
          $_SESSION['usuario'] = $usuario;
          header("location:login.php");
      }
      else{
          echo'No se pudo iniciar seccion';
      }
  }

?>