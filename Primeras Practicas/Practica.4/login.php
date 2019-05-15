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
	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

	<!-- Dark Themes -->
	<link rel="stylesheet" href="assets/styles/style-black.min.css">
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
	                           <!--es en donde se ecunetra el formulario el Stle es el tamano de la ventana del formulario-->
								<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>nombre</th>
								<th>apellido</th>
								<th>telefono</th>
								<th>direccion</th>
								<th>correo_electronico</th>
		
								<th>Modificar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
					                <tbody>
                                    <?php foreach($select_all_clientes as $fila){?>
					                		<tr> <!--Donde se muetras las datos llenos en el formulario -->
					                			<td><?php echo $fila['nombres']; ?></td>
					                			<td><?php echo $fila['apellidos']; ?></td>
					                			<td><?php echo $fila['telefono']; ?></td>
					                			<td><?php echo $fila['direccion']; ?></td>
					                			<td><?php echo $fila['correo_electronico']; ?></td>
					                			<td>
																	<!--Son los bonotes en donde se cunetra la opcion de editar y eliminar que se encuntran  abajo-->
					                				<a type="button" class="btn btn-warning" href="update.php?id=<?php echo $fila['id']; ?>" title="Editar" data-toggle="tooltip">
									                	<i class="fa fa-fw fa-edit"></i>
									              	</a>
															</td>
															<td>
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
		
		<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>

</body>


