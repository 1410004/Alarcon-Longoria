<?php
require_once("conexion.php");
class Datos extends Conexion{
        
    
    //Obtener los datos de la tabla
    public function obtenerDatos($tabla){
        //La consulta Select selecciona los datos de la tabla de los usuarios
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $respuesta = array();
        if($respuesta = $stmt->FetchAll()){
            return $respuesta;
        }else{
            return [];
        }

    }
    
  public function obtenerDatosAlumnosGrupoDiferente($id){
        $stmt = Conexion::conectar()->prepare("SELECT alumnos.id, alumnos.nombre, alumnos.apellido FROM alumnos WHERE NOT alumnos.id IN (SELECT alumnos.id FROM alumnos INNER JOIN grupos_alumnos on alumnos.id = grupos_alumnos.id_alumno WHERE grupos_alumnos.id = $id);");
        $stmt->execute();
        $respuesta = array();
        if($respuesta = $stmt->FetchAll()){
            return $respuesta;
        }else{
            return [];
        }
    }
  
    public function obtenerGrupoModel($id,$tabla){
        //La consulta Select selecciona los datos de la tabla de los usuarios
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_grupo = $id");
        $stmt->execute();
        $respuesta = array();
        if($respuesta = $stmt->FetchAll()){
            return $respuesta;
        }else{
            return [];
        }

    }

    public function obtenerDatosIDModel($id, $tabla){
    //Esta consulta sirve para obtener los datos del id que va ingresar para ver la tabla de los "usuarios"
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id , PDO::PARAM_STR);
        $stmt->execute();
        $respuesta = array();

        if($respuesta = $stmt->Fetch()){
            return $respuesta;
        }else{
            return [];
        }

    }
    //Registro de usuarios
    public function registrarMaestroModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(num_empleado, nombre, apellido, carrera, email) VALUES(:num_empleado, :nombre, :apellido, :carrera, :email) ");
        
        $stmt->bindParam(":num_empleado", $datosModel["num_empleado"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function registrarGrupoAlumnosModel($datosModel, $id_grupo, $tabla){
        $datosModel_array =  explode(",",$datosModel);
        
        for($i=0;$i<sizeof($datosModel_array);$i++){
            $stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (id_alumno, id_grupo) VALUES (:id_alumno,:id_grupo)");   
            $stmt1->bindParam(":id_alumno", $datosModel_array[$i], PDO::PARAM_STR);
            $stmt1->bindParam(":id_grupo", $id_grupo, PDO::PARAM_INT);

            if(!$stmt1->execute())
                return "error";

        }
        
        return "success";       

        $stmt1->close();
    }

    public function ObtenerLastGrupo($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT max(id) FROM $tabla");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

    public function registrarGrupoModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function registrarMateriaModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,hora_inicio,hora_fin,id_maestro,id_grupo) VALUES(:nombre,:hora_inicio,:hora_fin,:id_maestro,:id_grupo) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_inicio", $datosModel["hora_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_fin", $datosModel["hora_fin"], PDO::PARAM_STR);
        $stmt->bindParam(":id_maestro", $datosModel["maestro"], PDO::PARAM_STR);
        $stmt->bindParam(":id_grupo", $datosModel["grupo"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function registrarAlumnoModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(matricula, nombre, apellido, carrera, email) VALUES(:matricula, :nombre, :apellido, :carrera, :email) ");
        
        $stmt->bindParam(":matricula", $datosModel["matricula"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function actualizarMaestroModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET num_empleado=:num_empleado, nombre=:nombre, apellido=:apellido, carrera=:carrera, email=:email WHERE id=:id");
        
        $stmt->bindParam(":num_empleado", $datosModel["num_empleado"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function verificarMateriasMaestrosModel($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_maestro = :id");
        $stmt->bindParam(":id", $id , PDO::PARAM_STR);
        $stmt->execute();
        $respuesta = array();

        if($respuesta = $stmt->FetchAll()){
            return true;
        }else{
            return false;
        }
    }

    public function verificarGruposModel($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_grupo = :id");
        $stmt->bindParam(":id", $id , PDO::PARAM_STR);
        $stmt->execute();
        $respuesta = array();

        if($respuesta = $stmt->FetchAll()){
            return true;
        }else{
            return false;
        }
    }

    public function actualizarMateriaModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, hora_inicio=:hora_inicio, hora_fin=:hora_fin, id_maestro=:id_maestro, id_grupo=:id_grupo WHERE id=:id");
        
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_inicio", $datosModel["hora_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_fin", $datosModel["hora_fin"], PDO::PARAM_STR);
        $stmt->bindParam(":id_maestro", $datosModel["maestro"], PDO::PARAM_STR);
        $stmt->bindParam(":id_grupo", $datosModel["grupo"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function eliminarMaestroModel($id, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=?");
        
        if($stmt->execute(array($id))){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function eliminarGrupoModel($id, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=?");
        
        if($stmt->execute(array($id))){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function eliminarMateriaModel($id, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=?");
        
        if($stmt->execute(array($id))){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function actualizarAlumnoModel($datosModel, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula=:matricula, nombre=:nombre, apellido=:apellido, carrera=:carrera, email=:email WHERE id=:id");
        
        $stmt->bindParam(":matricula", $datosModel["matricula"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function eliminarAlumnoModel($id, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=?");
        
        if($stmt->execute(array($id))){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

     public function eliminarAlumnoGrupoModel($id_alumno, $id_grupo, $tabla){
        //Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla usuarios
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_grupo=$id_grupo and id_alumno=$id_alumno");
        
        if($stmt->execute(array($id))){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }
}
?>