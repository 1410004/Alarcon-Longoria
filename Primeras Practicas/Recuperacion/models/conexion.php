<?php

class Conexion{

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=recu", "root", "");
        return $link;
    }

}