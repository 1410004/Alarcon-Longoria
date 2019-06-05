<?php
    //Array que almacena todos los datos traidos de la tabla
    $datoProducto = array();//Hacer array para los datos
    $datos = new MvcController();//Llamar al controlador

    if($_POST){
        $datos->altaGrupo($_GET["id"]);
    }

    //$respuesta_alumnos= $datos->obtenerAlumnosSinGrupo();
    $respuesta_alumnos = $datos->obtenerAlumnosGrupoDiferente($_GET["id"]);

    $st_alumnos="";
        for($i=0;$i<sizeof($respuesta_alumnos);$i++)
            $st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['id']."'>".$respuesta_alumnos[$i]['nombre']." ".$respuesta_alumnos[$i]['apellido']."</option>";

?>


<center><h2>Alta de estudiantes en el grupo seleccionado</h2></center>
	

	<form method="POST">
		<input type="hidden" id="hid" name="hid"></input>
           
        
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
        <button class="small success" id="guardar" onclick="sendData();" type="submit" disabled>Alta de alumnos en el grupo</button>

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