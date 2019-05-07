<?php
    class form_alumno{
        public $no_empleado;
        public $nombre;
        public $carrera;
        public $telefono;
        public $correo;

        public $no_empleadoErr;
        public $nombreErr;
        public $carreraErr;
        public $telefonoErr;
        public $correoErr;

        private $obj_bd;

        public function inicia_bd(){
            $contrasena="";
            $usuario="root";
            $bd="alarcon_p2";
            $servidor="localhost";
            try{
                $this->obj_bd = new PDO("mysql:host={$servidor};dbname={$bd}",$usuario,$contrasena);
                $this->obj_bd-> exec("set names utf8");#Con esta linea se valida reconocer los caracteres especiales
            }catch(PDOException $e){
                echo "Error-PDO: ".$e->getMessage()."<br>";
                die();
            }
        }
        public function agregar_maestro(){
            $sql=$this->obj_bd->prepare('INSERT INTO maestros(nombre,no_empleado,carrera,telefono)
            VALUES(:nombre,:no_empleado,:carrera,:telefono)');
            $sql->bindParam(':nombre',$this->nombre,PDO::PARAM_STR);
            $sql->bindParam(':no_empleado',$this->no_empleado,PDO::PARAM_STR);
            $sql->bindParam(':carrera',$this->carrera,PDO::PARAM_STR);
            $sql->bindParam(':telefono',$this->telefono,PDO::PARAM_STR);
            $sql->execute();
            
        }
        public function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        public function validar(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $flag=0;
                if(empty($_POST['nombre'])){
                    $this->nombreErr="Ingresar nombre";$flag=1;
                }else{
                    $this->nombre = $this->test_input($_POST["nombre"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$this->nombre)) {
                        $this->nombreErr = "Only letters and white space allowed";$flag=1;
                    }
                }
                if(empty($_POST['no_empleado'])){
                    $this->no_empleadoErr="Ingresar matricula";$flag=1;
                }else{
                    $this->no_empleado = $this->test_input($_POST["no_empleado"]);
                }
                if(empty($_POST['carrera'])){
                    $this->carreraErr="Ingresar carrera";
                }else{
                    $this->carrera = $this->test_input($_POST["carrera"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$this->carrera)) {
                        $this->carreraErr = "Only letters and white space allowed";$flag=1;
                    }
                }
                if(empty($_POST['telefono'])){
                    $this->telefonoErr="Ingresar telefono";$flag=1;
                }else{
                    $this->telefono=$this->test_input($_POST['telefono']);
                }
                if($flag==0){
                    #echo $flag;
                    $this->agregar_maestro();
                }
            }
        }
        public function imprimir_form(){
?>
            <h2>PHP Form Validation Example</h2>
            <p><span class="error">* required field.</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Nombre: <input type="text" name="nombre" value="<?php echo $this->nombre;?>">
                    <span class="error">* <?php echo $this->nombreErr;?></span>
                    <br><br>
                    Número de empleado: <input type="text" name="no_empleado" value="<?php echo $this->no_empleado;?>">
                    <span class="error">* <?php echo $this->no_empleadoErr;?></span>
                    <br><br>
                    Carrera: <input type="text" name="carrera" value="<?php echo $this->carrera;?>">
                    <span class="error"><?php echo $this->carreraErr;?></span>
                    <br><br>
                    Telefono: <input type="text" name="telefono" value="<?php echo $this->telefono;?>">
                    <span class="error"><?php echo $this->telefonoErr;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Submit">
                </form>

<?php
        }
    }
?>

<?php
    #main
    $form = new form_alumno();
    $form->inicia_bd();
    $form->validar();
    $form->imprimir_form();

?>