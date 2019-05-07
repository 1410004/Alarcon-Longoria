<?php

    // incluir la case
    include "persona2.php";

    //intanciar la clase

    $persona =new persona();

    //asignar valores a las popiedades del objetos


    $persona->setEdad(30);
    $persona->setAltura(1.80);
    $persona->peso(80);

    //impresiones de los resultado

    echo"<br>Edad:".$persona->edad;
    echo"<br>Altura:".$persona->altura;
    echo"<br>Peso:".$persona->peso;
    echo"<br>IMC:".$persona->imc();

?>  