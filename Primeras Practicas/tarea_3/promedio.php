<?php
    class alumno{
        private $nombre;
        private $cal_unidad1;
        private $cal_unidad2;
        private $cal_unidad3;
        private $promedio;        

        public function getU1(){
            return $this->cal_unidad1;
        }
        public function getU2(){
            return $this->cal_unidad2;
        }
        public function getU3(){
            return $this->cal_unidad3;
        }
        public function promedio(){
            return $this->promedio;
        }
        public function setNombre($val){
            $this->nombre=$val;
        }
        public function setU1($val){
            $this->cal_unidad1=$val;
        }
        public function setU2($val){
            $this->cal_unidad2=$val;
        }
        public function setU3($val){
            $this->cal_unidad3=$val;
        }
        public function setPromedio(){
            if($this->cal_unidad1>=70&&$this->cal_unidad2>=70&&$this->cal_unidad3>=70){
                $this->promedio=$this->cal_unidad1+$this->cal_unidad2+$this->cal_unidad3;
                $this->promedio=$this->promedio/3;
            }else{
                $this->promedio=60;
            }
        }
        public function print(){
            echo "<br>DATOS:";
            echo "<br>Nombre: $this->nombre<br>";
            /* 
                Existen 3 caminos, cuando cada una de las unidades es la mayor de las 3, así que cada
                if de los siguientes representa cada camino
            */
            //Cuanndo la unidad 1 fue la mayor o igual de todas
            if($this->cal_unidad1>=$this->cal_unidad2&&$this->cal_unidad1>=$this->cal_unidad3){
                echo "<br>cal-unidad 1: $this->cal_unidad1<br>";
                if($this->cal_unidad2>=$this->cal_unidad3){
                    echo "<br>cal-unidad 2: $this->cal_unidad2<br>";
                    echo "<br>cal-unidad 3: $this->cal_unidad3<br>";
                }else{
                    echo "<br>cal-unidad 3: $this->cal_unidad3<br>";
                    echo "<br>cal-unidad 2: $this->cal_unidad2<br>";
                }
            }
            //Cuando la unidad 2 fue la mayor o igual de todas
            if($this->cal_unidad2>=$this->cal_unidad1&&$this->cal_unidad2>=$this->cal_unidad3){
                echo "<br>cal-unidad 2: $this->cal_unidad2<br>";
                if($this->cal_unidad1>=$this->cal_unidad3){
                    echo "<br>cal-unidad 1: $this->cal_unidad1<br>";
                    echo "<br>cal-unidad 3: $this->cal_unidad3<br>";
                }else{
                    echo "<br>cal-unidad 3: $this->cal_unidad3<br>";
                    echo "<br>cal-unidad 1: $this->cal_unidad1<br>";
                }
            }
            //Cuando la unidad 3 fue la mayor o igual de todas
            if($this->cal_unidad3>=$this->cal_unidad2&&$this->cal_unidad3>=$this->cal_unidad1){
                echo "<br>cal-unidad 3: $this->cal_unidad3<br>";
                if($this->cal_unidad2>=$this->cal_unidad1){
                    echo "<br>cal-unidad 2: $this->cal_unidad2<br>";
                    echo "<br>cal-unidad 1: $this->cal_unidad1<br>";
                }else{
                    echo "<br>cal-unidad 1: $this->cal_unidad1<br>";
                    echo "<br>cal-unidad 2: $this->cal_unidad2<br>";
                }
            }
            //Por último se imprime el promedio
            echo "<br>promedio: $this->promedio<br>";
        }
    }

?>