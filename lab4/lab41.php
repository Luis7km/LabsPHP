<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio 4.1</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <center>
        <?php
            if(array_key_exists('enviar', $_POST)) {
                if($_REQUEST['Ventas'] > 79){
                    echo '<img src="./green.png">';
                }
                if($_REQUEST['Ventas'] < 80 and $_REQUEST['Ventas'] > 49) {
                    echo '<img src="yellow.png">';
                }
                if($_REQUEST['Ventas'] < 50) {
                    echo '<img src="red.png">';
                }   
            } else {
        ?>
        </center> 
        <form action="lab41.php" method="POST">
            Introduzca el porcentaje de aumento o decremento en las ventas: <input type="text" name="Ventas"><br>
            <input type="submit" name="enviar" value="Enviar datos">
        </form>
        <?php
            }
        ?>
    </body>
</html>