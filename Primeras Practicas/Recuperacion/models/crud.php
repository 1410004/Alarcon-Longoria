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

    //Registro de usuarios
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
}
?>