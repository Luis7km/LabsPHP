<?php
    include ('class_lib.php');

    $tama = $_REQUEST['Matriz'];

    $obj = new matriz_identidad($tama);

    $validacion = $obj->dibujar();
?>