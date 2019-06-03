<?php
    //Array que almacena todos los datos traidos de la tabla
    $datoProducto = array();//Hacer array para los datos
    $datos = new MvcController();//Llamar al controlador
    $datoMaestro = $datos->obtenerMaestros();//Obtener los datos del usuario

    if($_POST){
        $datos->registrarMaestro();
    }

?>

<center><h1>Lista de Maestros</h1></center><br>
<center>
<!--Mostrar la tabla de los productos mediante una tabla dinamica-->

<table cellpadding="5" border="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Num de Empleado</th>
            <th>Nombre</th>
            <th>Apellido</th> 
            <th>Email</th> 
            <th>Carrera</th> 
            <th>Editar</th> 
            <th>Borrar</th> 
        </tr>
        
    </thead>
    
    <tbody>

        <!--Este ciclo es para recorrer la tabla de los datos e imprimirla -->
        <?php for($i=0; $i < count($datoMaestro); $i++ ) { ?>
        <tr>
            <td><?php echo $datoMaestro[$i]["id"]?></td>
            <td><?php echo $datoMaestro[$i]["num_empleado"]?></td>
            <td><?php echo $datoMaestro[$i]["nombre"]?></td>
            <td><?php echo $datoMaestro[$i]["apellido"]?></td>
            <td><?php echo $datoMaestro[$i]["email"]?></td>
            <td><?php echo $datoMaestro[$i]["carrera"]?></td>
            <td><a href="index.php?action=editarMaestro&id=<?php echo $datoMaestro[$i]["id"]?>">Editar</a></td>
            <td><a href="index.php?action=eliminarMaestro&id=<?php echo $datoMaestro[$i]["id"]?>">Borrar</a></td>
        </tr>
		<?php } ?>
    </tbody>
</table>
<br>
</center>
<hr>
<center><h2>Registrar Maestro</h2></center>
	
	
	<form method="POST">
		<label>Numero de empleado : </label>
		<input type="text" name="num_empleado" placeholder="ingresar numero de empleado"><br><br>

		<label>Nombre :</label>
		<input type="text" name="nombre" placeholder="ingresar nombre"><br><br>

		<label>Apellidos :</label>
		<input type="text" name="apellido" placeholder="ingresar apellido"><br><br>

		<label>Carrera :</label>
		<input type="text" name="carrera" placeholder="ingresar carrera"><br><br>

		<label>Email :</label>
		<input type="email" name="email" placeholder="ingresar email"><br><br>

		<center><input type="submit" value="Guardar maestro"></center>
	</form>