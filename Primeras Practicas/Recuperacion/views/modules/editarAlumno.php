<?php
//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$controller = new MvcController();
//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$alumno = $controller -> obtenerDatosAlumno();

if($_POST){
        $controller->actualizarAlumno($_GET["id"]);
    }
?>

<!--Forumario donde se editaran los datos de un usuario previamente registrado-->
<center><h2>Editar Maestro</h2></center>
	
	
	<form method="POST">

		<label>Matricula : </label>
		<input type="text" name="matricula" value="<?php echo $alumno["matricula"]?>" placeholder="ingresar matricula"><br><br>

		<label>Nombre :</label>
		<input type="text" name="nombre" value="<?php echo $alumno["nombre"]?>" placeholder="ingresar nombre"><br><br>

		<label>Apellidos :</label>
		<input type="text" name="apellido" value="<?php echo $alumno["apellido"]?>" placeholder="ingresar apellido"><br><br>

		<label>Carrera :</label>
		<input type="text" name="carrera" value="<?php echo $alumno["carrera"]?>" placeholder="ingresar carrera"><br><br>

		<label>Email :</label>
		<input type="email" name="email" value="<?php echo $alumno["email"]?>" placeholder="ingresar email"><br><br>

		<center><input type="submit" value="Editar alumno"></center>
	</form>

