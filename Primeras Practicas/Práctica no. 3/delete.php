<?php
    include('database.php');
    $clientes = new Database();
    $id=$_REQUEST['id'];
    $clientes->delete($id);

?>