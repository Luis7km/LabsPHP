<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio 4.3</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php
            $numeros = array();
            array_push($numeros, $_REQUEST['numero']);
            if(array_key_exists('enviar', $_POST) && count($numeros) != 20) {
                for($i = 0; $i<count($numeros); $i++) {
                    echo "$numeros[$i]";
                }
            } else {
        ?>
            <form action="lab43.php" method="POST">
                <br> <span>Introduzca un número para llenar el arreglo</span> <input type="text" name="numero"> <br/><br/>
                <input type="submit" name="enviar" value="Enviar">
            </form>
        <?php
            }
        ?>
    </body>
</html>