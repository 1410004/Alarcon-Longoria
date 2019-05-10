<!DOCTYPE html>
<html>
<head>
	<meta carset="utf-8">
	<meta http-equiv="X-UA-Compatible" contennt="IE=edge">
	<meta name="viewport" content="width=devce-width, initial-scale=1" >
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Agregar <b>Clientes</b></h2></div>
                      <div class="col-sm-4">
                           <a href="create.php" class="btn btn-success add-new"><i
                           class="fa fa-plus"></i>Agregar nuevo</a> 
                      </div>
                </div>
            </div>
            <?php
            include ("database.php");
            	$clientes =  new Database();
							$datos=$clientes->read();
							while($fila = $datos->fetch_assoc())
									$select_all_clientes[]=$fila;
        		?>
        				<div class="row">
	                            <table class="table table-bordered table-striped">
					                <thead>
						                <tr>
						                  <th>Nombre</th>
						                  <th>Apellidos</th>
						                  <th>Dirección</th>
						                  <th>Teléfono</th>
						                  <th>Correo electrónico</th>
						                  <th></th>
						                </tr>
					                </thead>
					                <tbody>
                                    <?php foreach($select_all_clientes as $fila){?>
					                		<tr>
					                			<td><?php echo $fila['nombres']; ?></td>
					                			<td><?php echo $fila['apellidos']; ?></td>
					                			<td><?php echo $fila['telefono']; ?></td>
					                			<td><?php echo $fila['direccion']; ?></td>
					                			<td><?php echo $fila['correo_electronico']; ?></td>
					                			<td>
					                				<a type="button" class="btn btn-warning" href="update.php?id=<?php echo $fila['id']; ?>" title="Editar" data-toggle="tooltip">
									                	<i class="fa fa-fw fa-edit"></i>
									              	</a>
					                				<a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $fila['id']; ?>" title="Eliminar" data-toggle="tooltip">
									                	<i class="fa fa-fw fa-trash"></i>
									              	</a>
									            </td>
					                		</tr>
                                    <?php } ?>
					                </tbody>
					              </table>
					            </div>
          </div>
        </div>
    </div>
</body>