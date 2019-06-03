<?php 

    $datos = new MvcController();//Llamar al controlador
    $datoGrupo= $datos->obtenerAlumnosGrupo($_GET["id"]);//Obtener los datos del usuario

    $datoAlumno = $datos->obtenerAlumnos();//Obtener los datos del usuario

?>
<center><h1>Estudiantes en el grupo</h1></center><br>
<center>
<!--Mostrar la tabla de los productos mediante una tabla dinamica-->

<table cellpadding="5" border="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>¿Baja?</th> 
        </tr>
        
    </thead>
    
    <tbody>

        <!--Este ciclo es para recorrer la tabla de los datos e imprimirla -->
        <?php for($i=0; $i < count($datoGrupo); $i++ ) { ?>
        <tr>
            <td><?php foreach ($datoAlumno as $m) {
                if($m["id"] == $datoGrupo[$i]["id_alumno"]){
                    echo $m["nombre"];
                }
            }?></td>

             <td><?php foreach ($datoAlumno as $m) {
                if($m["id"] == $datoGrupo[$i]["id_alumno"]){
                    echo $m["apellido"];
                }
            }?></td>
            <td><a href="index.php?action=bajaAlumnoGrupo&id_alumno=<?php echo $datoGrupo[$i]["id_alumno"]?>&id_grupo=<?php echo $datoGrupo[$i]["id_grupo"]?>">¿Baja?</a></td>
        </tr>
		<?php } ?>
    </tbody>
</table>
<br>
</center>