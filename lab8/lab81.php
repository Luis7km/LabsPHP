<?php
    include ('class_lib.php');

    $ventas = $_REQUEST['Ventas'];

    $validar = new ventas($ventas);

    $validacion = $validar->calcular();
?>