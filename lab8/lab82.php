<?php
    include ('class_lib.php');

    $factorial = $_REQUEST['factorial'];

    $obj = new factorial($factorial);

    $validacion = $obj->calcular();
?>