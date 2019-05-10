

<?php

///Definir la clase

class persona {
    //definir propiedades
    public $edad;
    public $altura;
    public $peso;

    //DEfinir metodo obtencion de datos 
    //Getters

    public function getEddad(){

        return $this->edad;


    }
    public function getPeso(){
        return$this ->peso;

    }
    public function getAltura(){
        return$this->altura;
    }

    //Definir metodos asignacion de datos
    //Setters

    public function setEdad($valor){
        $this->edad=$valor;

    }

    public function setAltura($valor){
        $this->altura=$valor;
    }

    public function setPeso($valor){
        $this->peso=$valor;
    }


    //Metodo de calcular el IMC accedieno a las prpiedades

    public function imc(){
        return$this->peso / ($this->altura * $this->altura);
    }


    //Calcular el IMC accediendo mediante los metodos get
    public function imc2(){
        return$this->getPeso() / ($this->getAltura()     * $this->getAltura());
    }






}

?>