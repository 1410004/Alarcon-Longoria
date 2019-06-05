<?php

class Conexion{

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=practica07", "admin", "f8a367f87a7a609fb5ef41e2d89b546426cfbdebe9fee7eb");
        return $link;
    }

}