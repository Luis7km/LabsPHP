<?php
    $factorial = $_POST['factorial'];
    $num = 1;
    $factResult = 1;
    echo "Factorial de: $factorial <hr><br>";

    if (is_numeric($factorial)) {
        if($factorial == 0) {
            echo "$factorial! = 1";
        } else {
            echo "$factorial! = $num ";
            do {
                $num++;
                echo "* $num ";
                $factResult = $factResult * $num;
            } while ($num < $factorial);
        echo "= $factResult";
        }
    } else {
        echo "Por favor, introduzca un número entero.";
    }
?>