<?php
class Paginas{
    //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador
    public function enlacesPaginasModel($enlacesModel){
        //Validamos
        if( $enlacesModel == "alumnos"  || $enlacesModel == "editarGrupo" || $enlacesModel == "eliminar" || $enlacesModel == "maestros"  || $enlacesModel == "editarMaestro"  || $enlacesModel == "eliminarMaestro" || $enlacesModel == "editarAlumno"  || $enlacesModel == "eliminarAlumno" || $enlacesModel == "grupos" || $enlacesModel == "materias" || $enlacesModel == "eliminarGrupo" || $enlacesModel == "eliminarMateria" || $enlacesModel == "editarMateria" || $enlacesModel == "verGrupo" || $enlacesModel == "bajaAlumnoGrupo"){
            //Mostramos el URL concatenado con la variable $enlacesModel
            $module = "views/modules/".$enlacesModel.".php";
        }
        //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
        else if($enlacesModel == "index"){
            $module = "views/modules/registro.php";
        }
        else if($enlacesModel == "altaG"){
            echo "<script>alert('Alta de alumnos realizada');</script>";
            $module = "views/modules/grupos.php";
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
         else if($enlacesModel == "bienG"){
            echo "<script>alert('Grupo Registrado');</script>";
            $module = "views/modules/grupos.php";
        }
         else if($enlacesModel == "bienMateria"){
            echo "<script>alert('Materia Registrada');</script>";
            $module = "views/modules/materias.php";
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
        else if($enlacesModel == "cambioG"){
            echo "<script>alert('Grupo Actualizado');</script>";
            $module = "views/modules/grupos.php";
        }
        else if($enlacesModel == "eliminarG"){
            echo "<script>alert('Grupo Eliminado');</script>";
            $module = "views/modules/grupos.php";
        }
        else if($enlacesModel == "cambioMateria"){
            echo "<script>alert('Materia Actualizada');</script>";
            $module = "views/modules/materias.php";
        }
        else if($enlacesModel == "eliminarMateriaS"){
            echo "<script>alert('Materia Eliminada');</script>";
            $module = "views/modules/materias.php";
        }
        else if($enlacesModel == "cambioA"){
            echo "<script>alert('Alumno Actualizado');</script>";
            $module = "views/modules/alumnos.php";
        }
        else if($enlacesModel == "eliminarA"){
            echo "<script>alert('Alumno Eliminado');</script>";
            $module = "views/modules/alumnos.php";
        }
        else if($enlacesModel == "baja"){
            echo "<script>alert('Alumno dado de baja');</script>";
            $module = "views/modules/grupos.php";
        }
        //Validar una LISTA BLANCA 
        else{
            $module = "views/modules/maestros.php";
        }
        return $module;
    }
}
?>