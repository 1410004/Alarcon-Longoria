<?php

session_start();
$estado = false;
if(isset($_SESSION['usuarios'])){
    $estado=true;
}
?>