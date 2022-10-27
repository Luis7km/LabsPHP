<?php
    class ventas {
        protected $ventas;

        function __construct($v) {
            $this->ventas = $v;
        }
        
        function calcular() {
            if ($this->ventas > 79) {
                echo '<center><img src="./green.png"></center>';
            } else if ($this->ventas > 49 && $this->ventas < 80) {
                echo '<center><img src="yellow.png"></center>';
            } else {
                echo '<center><img src="red.png"></center><br><br>';
            }
            print ("<a href='lab81.html'>Volver</a>");
        } 
    }

    class factorial {
        protected $factorial;
        protected $num;
        protected $factResult;
        
        function __construct($fact) {
            $this->factorial = $fact;
            $this->num = 1;
            $this->factResult = 1;
        }

        function calcular() {
            echo "Factorial de: $this->factorial <hr><br>";

            if (is_numeric($this->factorial)) {
                if($this->factorial == 0) {
                    echo "$this->factorial! = 1";
                } else {
                    echo "$this->factorial! = $this->num ";
                    do {
                        $this->num++;
                        echo "* $this->num ";
                        $this->factResult = $this->factResult * $this->num;
                    } while ($this->num < $this->factorial);
                    echo "= $this->factResult";
                }
            } else {
                echo "Por favor, introduzca un número entero.";
            }
        }
    }

    class matriz_identidad {
        protected $tam;

        function __construct($t) {
            $this->tam = $t;
        }

        function dibujar() {
            echo "Matriz iidentidad: $this->tam x $this->tam <br><br>";
            echo "<table border=1>";
            for ($i=0; $i<$this->tam; $i++) {
                echo "<tr>";
                for ($j=0; $j<$this->tam; $j++) {
                    if($i == $j) {
                        echo "<td>1</td>";
                    } else {
                        echo "<td>0</td>";
                    } 
                }
            }
        }
    }
?>