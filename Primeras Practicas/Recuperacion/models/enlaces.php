<?php
class Paginas{
    //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador
    public function enlacesPaginasModel($enlacesModel){
        //Validamos
        if($enlacesModel == "salir" || $enlacesModel == "editar" || $enlacesModel == "ingresar" || $enlacesModel == "alumnos" || $enlacesModel == "eliminar" || $enlacesModel == "maestros"  || $enlacesModel == "editarMaestro"  || $enlacesModel == "eliminarMaestro" || $enlacesModel == "editarAlumno"  || $enlacesModel == "eliminarAlumno"){
            //Mostramos el URL concatenado con la variable $enlacesModel
            $module = "views/modules/".$enlacesModel.".php";
        }
        //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
        else if($enlacesModel == "index"){
            $module = "views/modules/registro.php";
        }
        else if($enlacesModel == "ok"){
            echo "<script>alert('Usuario registrado');</script>";
            $module = "views/modules/ingresar.php";
        }
        else if($enlacesModel == "bienM"){
            echo "<script>alert('Maestro Registrado');</script>";
            $module = "views/modules/maestros.php";
        }
         else if($enlacesModel == "bienA"){
            echo "<script>alert('Alumno Registrado');</script>";
            $module = "views/modules/alumnos.php";
        }
        else if($enlacesModel == "fallo"){
            $module = "views/modules/ingresar.php";
        }
        else if($enlacesModel == "cambio"){
            $module = "views/modules/usuarios.php";
        }
        else if($enlacesModel == "cambioM"){
            echo "<script>alert('Maestro Actualizado');</script>";
            $module = "views/modules/maestros.php";
        }
        else if($enlacesModel == "eliminarM"){
            echo "<script>alert('Maestro Eliminado');</script>";
            $module = "views/modules/maestros.php";
        }
        else if($enlacesModel == "cambioA"){
            echo "<script>alert('Alumno Actualizado');</script>";
            $module = "views/modules/alumnos.php";
        }
        else if($enlacesModel == "eliminarA"){
            echo "<script>alert('Alumno Eliminado');</script>";
            $module = "views/modules/alumnos.php";
        }
        //Validar una LISTA BLANCA 
        else{
            $module = "views/modules/maestros.php";
        }
        return $module;
    }
}
?>