<?php

// En esta parte se inclutye el archivo database.php en donde solicita el id que se encuentra en la base de datos 
  include ("database.php");
  $conexion =new Database();
  if (isset($_POST['login'])){
      $usuario = $_POST['username'];
      $contrasena = $_POST['password'];
        //Condicion en donde entra para ver si los datos ingresados son correctos y sino manda al "Else" y arojara como mensaje 
        //No se pudo iniciar seccion 
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