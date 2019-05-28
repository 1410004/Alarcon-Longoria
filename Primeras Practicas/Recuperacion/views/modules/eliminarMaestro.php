<?php
    
    	//Enviar los datos a la clase del controlador para llamar a una función
        $datos = new MvcController();
        //Llama a la funcion de eliminar los datos del usuario
        $eliminar = $datos->eliminarDatosMaestro($_GET["id"]);
    
    
?>