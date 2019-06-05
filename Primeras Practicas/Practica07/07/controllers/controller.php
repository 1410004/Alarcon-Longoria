<?php
class MvcController{ 
    //Llamar a la plantilla
    public function pagina(){
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        include "views/template.php";
    }
    //Interacción con el usuario
    public function enlacesPaginasController(){
        //Trabajar con los enlaces de las páginas
        //Validamos si la variable "action" viene vacia, es decir cuando se abre la pagina por primera vez se debe cargar la vista index.php
        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlaces = $_GET['action'];
        }else{
            //Si viene vacio inicializo con index
            $enlaces = "maestros";
        }
        //Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, etc.
        //Para esto hay que mandar al modelo para que haga dicho proceso y muestre la informacions
        $respuesta = Paginas::enlacesPaginasModel($enlaces);
        include $respuesta;
    }
   
    public function obtenerMaestros(){
        $respuesta = Datos:: obtenerDatos("maestros");//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return $respuesta;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return [];
            }
    }

    public function obtenerGrupos(){
        $respuesta = Datos:: obtenerDatos("grupos");//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return $respuesta;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return [];
            }
    }

    public function obtenerAlumnosGrupo($id){
        $respuesta = Datos:: obtenerGrupoModel($id,"grupos_alumnos");//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return $respuesta;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return [];
            }
    }

    public function obtenerAlumnos(){
        $respuesta = Datos:: obtenerDatos("alumnos");//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return $respuesta;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return [];
            }
    }


    public function obtenerMaterias(){
        $respuesta = Datos:: obtenerDatos("materias");//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return $respuesta;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return [];
            }
    }

    //Esta función sirve para obtener los datos del id que va ingresar para ver la tabla de los "usuarios" mediante el metodo GET
    public function obtenerDatosMaestro(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];//Conseguir el id del usuario a ingresar

            $respuesta = Datos::obtenerDatosIDModel($id, "maestros");//Aqui manda los datos al crud para que haga la funcion de obtenerDatosUsuario

            return $respuesta;//Manda la respuesta
        }
    }

    public function obtenerDatosMateria(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];//Conseguir el id del usuario a ingresar

            $respuesta = Datos::obtenerDatosIDModel($id, "materias");//Aqui manda los datos al crud para que haga la funcion de obtenerDatosUsuario

            return $respuesta;//Manda la respuesta
        }
    }

    public function obtenerDatosAlumno(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];//Conseguir el id del usuario a ingresar

            $respuesta = Datos::obtenerDatosIDModel($id, "alumnos");//Aqui manda los datos al crud para que haga la funcion de obtenerDatosUsuario

            return $respuesta;//Manda la respuesta
        }
    }

    public function registrarMaestro(){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("num_empleado" => $_POST["num_empleado"],
                                     "nombre" => $_POST["nombre"],
                                     "apellido" => $_POST["apellido"],
                                     "carrera" => $_POST["carrera"],
                                     "email" => $_POST["email"],
                                     );
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registrarMaestroModel($datosController, "maestros");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=bienM");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function registrarMateria(){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("nombre" => $_POST["nombre"],
                                     "hora_inicio" => $_POST["hora_inicio"],
                                     "hora_fin" => $_POST["hora_fin"],
                                     "maestro" => $_POST["maestro"],
                                     "grupo" => $_POST["grupo"],
                                     );
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registrarMateriaModel($datosController, "materias");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=bienMateria");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function registrarGrupo(){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("nombre" => $_POST["nombre"]);
            $data = $_POST['hid'];
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"


            $respuesta = Datos::registrarGrupoModel($datosController, "grupos");
            $id_grupo = Datos::ObtenerLastGrupo("grupos");
            $respuesta = Datos::registrarGrupoAlumnosModel($data, $id_grupo[0], "grupos_alumnos");
        
        
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=bienG");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function registrarAlumno(){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("matricula" => $_POST["matricula"],
                                     "nombre" => $_POST["nombre"],
                                     "apellido" => $_POST["apellido"],
                                     "carrera" => $_POST["carrera"],
                                     "email" => $_POST["email"],
                                     );
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registrarAlumnoModel($datosController, "alumnos");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=bienA");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function actualizarMaestro($id){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("id"=>$id,
                                     "num_empleado" => $_POST["num_empleado"],
                                     "nombre" => $_POST["nombre"],
                                     "apellido" => $_POST["apellido"],
                                     "carrera" => $_POST["carrera"],
                                     "email" => $_POST["email"],
                                     );
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::actualizarMaestroModel($datosController, "maestros");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=cambioM");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function altaGrupo($id){
            $data = $_POST['hid'];
            
            $respuesta = Datos::registrarGrupoAlumnosModel($data, $id, "grupos_alumnos");
        
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=altaG");
            }
            else{
                header("loaction:index.php");
            }
    }
  
    public function obtenerAlumnosGrupoDiferente($id){
        $respuesta = Datos:: obtenerDatosAlumnosGrupoDiferente($id);//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return $respuesta;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return [];
            }
    }
  
    public function verificarMateriasMaestros($id){
        $respuesta = Datos::verificarMateriasMaestrosModel($id, "materias");
            //Se imprime la respuesta en la vista
        if($respuesta){
            return true;//Aqui regresa lo de la sentencia que le mandaron al crud
        }else{
            return false;
        }
    }


    public function actualizarMateria($id){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("id"=>$id,
                                     "nombre" => $_POST["nombre"],
                                     "hora_inicio" => $_POST["hora_inicio"],
                                     "hora_fin" => $_POST["hora_fin"],
                                     "maestro" => $_POST["maestro"],
                                     "grupo" => $_POST["grupo"],
                                     );
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::actualizarMateriaModel($datosController, "materias");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=cambioMateria");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function eliminarDatosMaestro($id){
        $respuesta = Datos::eliminarMaestroModel($id, "maestros");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=eliminarM");
            }
            else{
                header("loaction:index.php");
            }
    }

    public function verificarGrupos($id){
          $respuesta = Datos:: verificarGruposModel($id,"grupos_alumnos");//Mandar los datos al crud para que consiga la información de la tabla
            if($respuesta){
                return true;//Aqui regresa lo de la sentencia que le mandaron al crud
            }else{
                return false;
            }
    }

    public function eliminarDatosMateria($id){
        $respuesta = Datos::eliminarMateriaModel($id, "materias");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=eliminarMateriaS");
            }
            else{
                header("loaction:index.php");
            }
    }

    public function eliminarDatosGrupo($id){
        $respuesta = Datos::eliminarGrupoModel($id, "grupos");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=eliminarG");
            }
            else{
                header("loaction:index.php");
            }
    }

    public function actualizarAlumno($id){
        if(isset($_POST["nombre"])){
            //Recibe a traves del metodo POST el name (html) de usuario, password, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("id"=>$id,
                                     "matricula" => $_POST["matricula"],
                                     "nombre" => $_POST["nombre"],
                                     "apellido" => $_POST["apellido"],
                                     "carrera" => $_POST["carrera"],
                                     "email" => $_POST["email"],
                                     );
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=cambioA");
            }
            else{
                header("loaction:index.php");
            }
        }
    }

    public function eliminarDatosAlumno($id){
        $respuesta = Datos::eliminarAlumnoModel($id, "alumnos");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=eliminarA");
            }
            else{
                header("loaction:index.php");
            }
    }

    public function eliminarDatosAlumnoGrupo($id_alumno,$id_grupo){
        $respuesta = Datos::eliminarAlumnoGrupoModel($id_alumno,$id_grupo, "grupos_alumnos");
            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=baja");
            }
            else{
                header("loaction:index.php");
            }
    }
}
?>