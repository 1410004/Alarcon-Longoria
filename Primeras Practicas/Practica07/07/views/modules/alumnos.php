<?php
    //Array que almacena todos los datos traidos de la tabla
    $datoProducto = array();//Hacer array para los datos
    $datos = new MvcController();//Llamar al controlador
    $datoAlumno = $datos->obtenerAlumnos();//Obtener los datos del usuario

    if($_POST){
        $datos->registrarAlumno();
    }

?>

<center><h1>Lista de Alumnos</h1></center><br>
<center>
<!--Mostrar la tabla de los productos mediante una tabla dinamica-->

<table cellpadding="5" border="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Matricula</th>
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
        <?php for($i=0; $i < count($datoAlumno); $i++ ) { ?>
        <tr>
            <td><?php echo $datoAlumno[$i]["id"]?></td>
            <td><?php echo $datoAlumno[$i]["matricula"]?></td>
            <td><?php echo $datoAlumno[$i]["nombre"]?></td>
            <td><?php echo $datoAlumno[$i]["apellido"]?></td>
            <td><?php echo $datoAlumno[$i]["email"]?></td>
            <td><?php echo $datoAlumno[$i]["carrera"]?></td>
            <td><a href="index.php?action=editarAlumno&id=<?php echo $datoAlumno[$i]["id"]?>">Editar</a></td>
            <td><a href="index.php?action=eliminarAlumno&id=<?php echo $datoAlumno[$i]["id"]?>">Borrar</a></td>
        </tr>
		<?php } ?>
    </tbody>
</table>
<br>
</center>
<hr>
<center><h2>Registrar Alumno</h2></center>
	
	
	<form method="POST">
		<label>Matricula : </label>
		<input type="text" name="matricula" placeholder="ingresar matricula"><br><br>

		<label>Nombre :</label>
		<input type="text" name="nombre" placeholder="ingresar nombre"><br><br>

		<label>Apellidos :</label>
		<input type="text" name="apellido" placeholder="ingresar apellido"><br><br>

		<label>Carrera :</label>
		<input type="text" name="carrera" placeholder="ingresar carrera"><br><br>

		<label>Email :</label>
		<input type="email" name="email" placeholder="ingresar email"><br><br>

		<center><input type="submit" value="Guardar alumno"></center>
	</form>