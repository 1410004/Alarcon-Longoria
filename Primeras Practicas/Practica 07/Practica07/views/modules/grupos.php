<?php
    //Array que almacena todos los datos traidos de la tabla
    $datoProducto = array();//Hacer array para los datos
    $datos = new MvcController();//Llamar al controlador
    $datoGrupo= $datos->obtenerGrupos();//Obtener los datos del usuario

    if($_POST){
        $datos->registrarGrupo();
    }

    $respuesta_alumnos= $datos->obtenerAlumnos();

    $st_alumnos="";
        for($i=0;$i<sizeof($respuesta_alumnos);$i++)
            $st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['id']."'>".$respuesta_alumnos[$i]['nombre']." ".$respuesta_alumnos[$i]['apellido']."</option>";

?>

<center><h1>Lista de Grupos</h1></center><br>
<center>
<!--Mostrar la tabla de los productos mediante una tabla dinamica-->

<table cellpadding="5" border="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Ver estudiantes</th>
            <th>Editar</th> 
            <th>Borrar</th> 
        </tr>
        
    </thead>
    
    <tbody>

        <!--Este ciclo es para recorrer la tabla de los datos e imprimirla -->
        <?php for($i=0; $i < count($datoGrupo); $i++ ) { ?>
        <tr>
            <td><?php echo $datoGrupo[$i]["id"]?></td>
            <td><?php echo $datoGrupo[$i]["nombre"]?></td>
            <td><a href="index.php?action=verGrupo&id=<?php echo $datoGrupo[$i]["id"]?>">Ver estudiantes</a></td>
            <td><a href="index.php?action=editarGrupo&id=<?php echo $datoGrupo[$i]["id"]?>">Editar</a></td>
            <td><a href="index.php?action=eliminarGrupo&id=<?php echo $datoGrupo[$i]["id"]?>">Borrar</a></td>
        </tr>
		<?php } ?>
    </tbody>
</table>
<br>
</center>
<hr>
<center><h2>Registrar Grupo</h2></center>
	
	
	<form method="POST">
		<input type="hidden" id="hid" name="hid"></input>
           
        <label for="nombre">Nombre del grupo:</label>
        <input type="text" name="nombre" required>
        

        <h4>Alumnos en el grupo</h4>
        <table>
            <tr>
                <td>
                 <label for="alumno">Nombre del Alumno:</label>
                 <select name="alumno" class="js-example-basic-multiple" id="alumno">
                    <?php echo $st_alumnos?>
                 </select>
                 <br><br>
            </td>
             <td>
                <button type="button" class="small success" onclick="addAlumno()">Agregar Alumno</button>
             </td>
        </tr>
        <table>
        <table id="alumnos"></table>
        <br>
        <button class="small success" id="guardar" onclick="sendData();" type="submit" disabled>Registrar Grupo</button>

        <script>
                var flag_alumnos = 0;

                var alumnos=[];
                var send_alumnos=[];
                var tab = document.getElementById("alumnos");

                function updateTable(){
                    tab.innerHTML="<tr><th>Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
                    for(var i=0;i<alumnos.length;i++){
                        tab.innerHTML=tab.innerHTML+"<tr><td>"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
                    }
                }

                function addAlumno(){
                    
                    var select = document.getElementById("alumno");
                    var flag=false;
                    for(var i=0;i<alumnos.length;i++){
                        if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
                            flag=true;
                            break;
                        }
                    }

                    if(!flag){
                        alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
                        send_alumnos.push([select.options[select.selectedIndex].value]);
                        updateTable();    
                        flag_alumnos++;                  
                        if(flag_alumnos>0){
                            document.getElementById("guardar").removeAttribute("disabled");
                        }
                    }else{
                        alert("Alumno ya Agregado");
                    }
                }

                function deleteAlumno(index){
                    alumnos.splice(index, 1);
                    send_alumnos.splice(index, 1);
                    updateTable();
                    flag_alumnos--;
                    if(flag_alumnos==0){
                        document.getElementById("guardar").disabled = "true";
                    }
                }

                function sendData(){
                    var hid = document.getElementById("hid");
                    hid.value=send_alumnos;
                }

            </script>

	</form>