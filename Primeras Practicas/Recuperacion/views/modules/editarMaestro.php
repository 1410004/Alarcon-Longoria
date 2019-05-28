<?php
//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$controller = new MvcController();
//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$maestro = $controller -> obtenerDatosMaestro();

if($_POST){
        $controller->actualizarMaestro($_GET["id"]);
    }
?>

<!--Forumario donde se editaran los datos de un usuario previamente registrado-->
<center><h2>Editar Maestro</h2></center>
	
	
	<form method="POST">

		<label>Numero de empleado : </label>
		<input type="text" name="num_empleado" value="<?php echo $maestro["num_empleado"]?>" placeholder="ingresar numero de empleado"><br><br>

		<label>Nombre :</label>
		<input type="text" name="nombre" value="<?php echo $maestro["nombre"]?>" placeholder="ingresar nombre"><br><br>

		<label>Apellidos :</label>
		<input type="text" name="apellido" value="<?php echo $maestro["apellido"]?>" placeholder="ingresar apellido"><br><br>

		<label>Carrera :</label>
		<input type="text" name="carrera" value="<?php echo $maestro["carrera"]?>" placeholder="ingresar carrera"><br><br>

		<label>Email :</label>
		<input type="email" name="email" value="<?php echo $maestro["email"]?>" placeholder="ingresar email"><br><br>

		<center><input type="submit" value="Editar maestro"></center>
	</form>

