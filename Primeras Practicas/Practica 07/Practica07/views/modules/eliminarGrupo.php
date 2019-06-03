<?php
    
	//Enviar los datos a la clase del controlador para llamar a una función
    $datos = new MvcController();
    //Llama a la funcion de eliminar los datos del usuario

    $grupos = $datos->verificarGrupos($_GET["id"]);

    if($grupos){
    	echo "<script>alert('No es posible eliminar el grupo debido a que posee alumnos registrados en él.')</script>";
    }else{
    	$eliminar = $datos->eliminarDatosGrupo($_GET["id"]);
    }

?>