<?php
//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$controller = new MvcController();
$materia = $controller -> obtenerDatosMateria();


    $respuesta_maestros= $controller->obtenerMaestros();

    $st_maestros="";
        for($i=0;$i<sizeof($respuesta_maestros);$i++)
            $st_maestros=$st_maestros."<option value='".$respuesta_maestros[$i]['id']."'>".$respuesta_maestros[$i]['nombre']." ".$respuesta_maestros[$i]['apellido']."</option>";


    $respuesta_grupos= $controller->obtenerGrupos();

    $st_grupos="";
        for($i=0;$i<sizeof($respuesta_maestros);$i++)
            $st_grupos=$st_grupos."<option value='".$respuesta_grupos[$i]['id']."'>".$respuesta_grupos[$i]['nombre']."</option>";


if($_POST){
        $controller->actualizarMateria($_GET["id"]);
    }
?>

<!--Forumario donde se editaran los datos de un usuario previamente registrado-->
<center><h2>Editar Materia</h2></center>
	
	

	<form method="POST">
		<label>Nombre :</label>
		<input type="text" name="nombre" value="<?php echo $materia["nombre"]?>" placeholder="ingresar nombre" required><br><br>

        <label>Hora inicio :</label>
        <input type="time" name="hora_inicio" value="<?php echo $materia["hora_inicio"]?>" placeholder="ingresar hora inicio" required><br><br>

        <label>Hora fin :</label>
        <input type="time" name="hora_fin" value="<?php echo $materia["hora_fin"]?>" placeholder="ingresar hora fin" required><br><br>

        <label for="maestro">Maestro:</label>
         <select name="maestro" required>
            <?php echo $st_maestros?>
         </select>
         <br><br>

         <label for="grupo">Grupo:</label>
         <select name="grupo" required>
            <?php echo $st_grupos?>
         </select>
         <br><br>

		<center>
        <?php if(count($respuesta_maestros) == 0 || count($respuesta_grupos) == 0){ ?>
            <input type="submit" value="Actualizar materia" disabled></center>
        <?php }else{ ?>
            <input type="submit" value="Actualizar materia"></center>
        <?php } ?>
	</form>