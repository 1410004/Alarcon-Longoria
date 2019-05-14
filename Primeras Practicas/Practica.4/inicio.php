<?php

session_start();
$estado = false;
if(isset($_SESSION['usuario'])){
    $estado=true;
}
?>