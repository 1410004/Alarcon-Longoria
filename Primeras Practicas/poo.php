<?php
#Clase:
//Una clase es un modelo que se utiliza para crear objetos qe comprate un mismos comportamiento estado o identidad

class Automovil{
    //Propiedaades: son las caracteristisas que pueden tener su objeto

    public$marca;
    public$modelo;

    //Metodo: Es el algoritmo asociado a un objeto que oncdica la capacidad de lo que este puede hacer. la unica diferencia  entre el metodo 
    //y funcion es que llamamos al metodo a 
    //a Funciones de una clase(Poo), mientras que llamamos funciones a los algoritmos de la programacion estructurada

    public function mostrar(){
        echo"<p> Hola, soy un $this->marca, modelo$this->modelo</p>";

    }

}

/* Objetos
        Es una entidad povista de metodos o mensajes a los cuales responde  propiedades con valores concretos

 */
$a= new Automovil();
$a->marcar = "Chevrolet";
$a-> marca = "Chevy";
$a -> mostrar();


$b= new Automovil();
$b->marcar = "Ford";
$b-> marca = "Lobo";
$b -> mostrar();


$c= new Automovil();
$c->marcar = "Honda";
$c-> marca = "CRV";
$c -> mostrar();

//Principios de l POO que se cumplen en este ejemplo

//1. ABSTRACCION : nUEVOS TIPOS DE DATOS (EL QUE QUIERAS LO CREEAS)
//2. ENCAPSULACION: ORGANIZA EL CODIGO EN GRUPOS LOGICOS 
//3. OCULTAMIENTO: OCUALTA DETALLES DE IMPLEMENTACION Y EXPONE SOLO LOS DETALLES QUE SEAN NECESARIOS PARA EL RESTO DEL SISTEMA


?>