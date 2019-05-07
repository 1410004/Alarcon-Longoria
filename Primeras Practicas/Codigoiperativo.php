
<?php
// codigo imperativo espegeti
$automovil1=(object) ["marca"=>"Chevrolet","modelo"=>"chevy"];
$automovil2=(object) ["marca"=>"Ford","modelo"=>"Lobo"];
$automovil3=(object) ["marca"=>"Honda","modelo"=>"CVR"];

//Funcion con parametros para imprimir detalles automovil

function mostrar ($automovil1){
    echo"<p> Hola soy un un $automovil1->marca, modelo $automovil1->modelo</p>";

}
mostrar($automovil1);
///var_dump($automovil1)
mostrar($automovil2);
mostrar($automovil3);


?>