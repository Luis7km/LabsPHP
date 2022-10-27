<?php
    if(array_key_exists('enviar', $_POST)) {
        $expire=time()+60*5;
        setcookie("user", $_REQUEST['visitante'], $expire);
        header("Refresh:0");
    }
?>
<html lang="es">
    <head>
        <title>Laboratorio 13</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Creacion de Cookies</h1>
        <h2>La Cookie "User" tendra solo 5 minutos de duracion</h2>
        <?php
            if(isset($_COOKIE["user"])){
                print("<br/>Hola <B>".$_COOKIE["user"]."</B> gracias por visitar nuestro sitio web<br/>");
            } else {
        ?>
        <form action="lab132.php" method="post" name="formcookie">
            <br/>Hola, primera vez que te vemos por nuestro sitio web. Como te llamas?
            <input type="text" name="visitante">
            <input type="submit" name="enviar" value="Gracias por identificarte"><br/>
        </form>
        <?php
            }
        ?>
        <br/><a href="lab133.php">Continuar...</a>
    </body>
</html>