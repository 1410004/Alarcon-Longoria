<?php
    
	//Enviar los datos a la clase del controlador para llamar a una función
    $datos = new MvcController();
    //Llama a la funcion de eliminar los datos del usuario

    $materias_maestros = $datos->verificarMateriasMaestros($_GET["id"]);

    if($materias_maestros){
    	echo "<script>alert('No es posible eliminar el maestro debido a que tiene materias asignadas.')</script>";
    }else{
    	$eliminar = $datos->eliminarDatosMaestro($_GET["id"]);
    }

?>