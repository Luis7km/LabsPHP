<html lang="es">
    <head>
        <title>Nueva actividad</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/helper.js"></script>
    </head>
    <body>
        
    <?php
        $titulo; $fecha; $hora; $ubicacion; $correo; $repeticion; $tipo;
        
        if(array_key_exists('insertar', $_POST)) {
            if($_REQUEST['titulo'] != "" && $_REQUEST['fecha'] != "" && $_REQUEST['hora'] != "" && $_REQUEST['ubicacion'] != "" && $_REQUEST['correo'] != "" && 
            $_REQUEST['repeticion'] != "" && $_REQUEST['tipo'] != "") {
                $titulo = $_REQUEST["titulo"];
                $fecha = $_REQUEST["fecha"];
                $hora = $_REQUEST["hora"];
                $ubicacion = $_REQUEST["ubicacion"];
                $correo = $_REQUEST["correo"];
                $repeticion = $_REQUEST["repeticion"];
                $tipo = $_REQUEST["tipo"];
                    
                echo '<script>crear("'
                    .$titulo.'","'
                    .$fecha.'","'
                    .$hora.'","'
                    .$ubicacion.'","'
                    .$correo.'","'
                    .$repeticion.'","'
                    .$tipo.'")</script>';

                echo ("<h1>Actividad registrada correctamente</h1> <br><br>");
                echo ("<a href='Act_resume.php'>Volver al resumen de actividades</a>");

            } else {
                echo "Favor llenar todos los campos <br><br>";
                echo ("<a href='insertar.php'>Volver al formulario</a>");
            }
        } else {
        ?>
        <h1>Añadir actividad</h1>
        <form method="POST" action="insertar.php">
            Titulo <input type="text" name="titulo"> <br> <br>
            Fecha <input type="date" name="fecha"> <br> <br>
            Hora <input type="time" name="hora"> <br> <br>
            Ubicacion <input type="text" name="ubicacion"> <br> <br>
            Correo <input type="text" name="correo"> <br> <br>
            Repeticion <select name="repeticion">
                <option value="5 min">5 min</option>
                <option value="15 min">15 min</option>
                <option value="30 min">30 min</option>
                <option value="1 hr">1 hr</option>
                <option value="Todo el dia">Todo el dia</option>
            </select> <br> <br>
            Tipo <select name="tipo">
            <option value="Deporte">Deporte</option>
            <option value="Estudio">Estudio</option>
            <option value="Trabajo">Trabajo</option>
            <option value="Fiesta">Fiesta</option>
            <option value="Reunion">Reunion</option>
            <option value="Viaje">Viaje</option>
            <option value="Super Mercado">Super Mercado</option>
            </select> <br> <br>
            <input type="submit" name="insertar" value="Aceptar">
        </form>
        <?php
            print ("<a href='Act_resume.php'>Volver...</a>");
            }
        ?>

    </body>
</html>