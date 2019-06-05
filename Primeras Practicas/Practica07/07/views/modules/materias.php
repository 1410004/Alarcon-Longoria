<?php
    //Array que almacena todos los datos traidos de la tabla
    $datoProducto = array();//Hacer array para los datos
    $datos = new MvcController();//Llamar al controlador
    $datoMateria = $datos->obtenerMaterias();

    $respuesta_maestros= $datos->obtenerMaestros();

    $st_maestros="";
        for($i=0;$i<sizeof($respuesta_maestros);$i++)
            $st_maestros=$st_maestros."<option value='".$respuesta_maestros[$i]['id']."'>".$respuesta_maestros[$i]['nombre']." ".$respuesta_maestros[$i]['apellido']."</option>";


    $respuesta_grupos= $datos->obtenerGrupos();

    $st_grupos="";
        for($i=0;$i<sizeof($respuesta_grupos);$i++)
            $st_grupos=$st_grupos."<option value='".$respuesta_grupos[$i]['id']."'>".$respuesta_grupos[$i]['nombre']."</option>";

    if($_POST){
        $datos->registrarMateria();
    }

?>

<center><h1>Lista de Materias</h1></center><br>
<center>
<!--Mostrar la tabla de los productos mediante una tabla dinamica-->

<table cellpadding="5" border="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Hora Inicio</th> 
            <th>Hora Fin</th> 
            <th>Maestro</th>
            <th>Grupo</th> 
            <th>Editar</th> 
            <th>Borrar</th> 
        </tr>
        
    </thead>
    
    <tbody>

        <!--Este ciclo es para recorrer la tabla de los datos e imprimirla -->
        <?php for($i=0; $i < count($datoMateria); $i++ ) { ?>
        <tr>
            <td><?php echo $datoMateria[$i]["id"]?></td>
            <td><?php echo $datoMateria[$i]["nombre"]?></td>
            <td><?php echo $datoMateria[$i]["hora_inicio"]?></td>
            <td><?php echo $datoMateria[$i]["hora_fin"]?></td>
            <td><?php foreach ($respuesta_maestros as $m) {
                if($m["id"] == $datoMateria[$i]["id_maestro"]){
                    echo $m["nombre"]." ".$m["apellido"];
                }
            }?></td>

            <td><?php foreach ($respuesta_grupos as $g) {
                if($g["id"] == $datoMateria[$i]["id_grupo"]){
                    echo $g["nombre"];
                }
            }?></td>

            <td><a href="index.php?action=editarMateria&id=<?php echo $datoMateria[$i]["id"]?>">Editar</a></td>
            <td><a href="index.php?action=eliminarMateria&id=<?php echo $datoMateria[$i]["id"]?>">Borrar</a></td>
        </tr>
		<?php } ?>
    </tbody>
</table>
<br>
</center>
<hr>
<center><h2>Registrar Materia</h2></center>
	
	
	<form method="POST">
		<label>Nombre :</label>
		<input type="text" name="nombre" placeholder="ingresar nombre" required><br><br>

        <label>Hora inicio :</label>
        <input type="time" name="hora_inicio" placeholder="ingresar hora inicio" required><br><br>

        <label>Hora fin :</label>
        <input type="time" name="hora_fin" placeholder="ingresar hora fin" required><br><br>

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
            <input type="submit" value="Guardar materia" disabled></center>
        <?php }else{ ?>
            <input type="submit" value="Guardar materia"></center>
        <?php } ?>
	</form>