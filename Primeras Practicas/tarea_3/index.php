<?php
    include "promedio.php";

    $alumno_1 = new alumno();
    $alumno_1->setNombre('Carlos');
    $alumno_1->setU1(90);
    $alumno_1->setU2(80);
    $alumno_1->setU3(93);
    $alumno_1->setPromedio();
    $alumno_1->print();

?>