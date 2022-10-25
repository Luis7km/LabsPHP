<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio 4.5</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <center>
        <?php
            if(array_key_exists('enviar', $_POST)) {
                $matriz = array(array());
                echo "<table border=1>";
                for($i=0;$i<$_REQUEST['Matriz'];$i++) {
                    echo "<tr>";
                    for ($j=0;$j<$_REQUEST['Matriz'];$j++) {
                        if($i == $j) {
                            echo "<td>1</td>";
                        } else {
                            echo "<td>0</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
        ?>
        </center> 
        <form action="lab45.php" method="POST">
            Introduzca el tamaño de la matriz: <input type="text" name="Matriz"><br>
            <input type="submit" name="enviar" value="Aceptar">
        </form>
        <?php
            }
        ?>
    </body>
</html>