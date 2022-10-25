<?php
    class cliente {
        var $nombre;
        var $numero;
        var $peliculas_adquiridas;

        function __construct($nombre, $numero) {
            $this->nombre=$nombre;
            $this->numero=$numero;
            $this->peliculas_adquiridas=array();
        }

        function __destruct() {
            echo "<br>destruido: " . $this->nombre;
        }

        function dame_numero() {
            return $this->numero;
        }
    }
    //instanciamos un par de objetos cliente
    $cliente1 = new cliente("Pepe", 1);
    $cliente2 = new Cliente("Roberto", 564);

    //mostramos el numero de cada cliente creado
    echo "<br> El identificador del cliente 1 es: " . $cliente1->dame_numero();
    echo "<br> El identificador del cliente 2 es: " . $cliente2->dame_numero();
?>