<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Editar Actividad</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/helper.js"></script>
    </head>
    <body>

        <?php
            if(array_key_exists('eliminar', $_POST)) {
                $id = $_REQUEST["id"];
                echo '<script>eliminar('.$id.')</script>';
                echo ("<h1>Actividad eliminada correctamente</h1> <br><br>");
                echo ("<a href='Act_resume.php'>Volver al resumen de actividades</a>");
            }

            if(array_key_exists('actualizar', $_POST)) {
                if($_REQUEST['titulo'] != "" && $_REQUEST['fecha'] != "" && $_REQUEST['hora'] != "" && $_REQUEST['ubicacion'] != "" && $_REQUEST['correo'] != "" && 
                $_REQUEST['repeticion'] != "" && $_REQUEST['tipo'] != "") {
                    $id = $_REQUEST["id"];
                    $titulo = $_REQUEST["titulo"];
                    $fecha = $_REQUEST["fecha"];
                    $hora = $_REQUEST["hora"];
                    $ubicacion = $_REQUEST["ubicacion"];
                    $correo = $_REQUEST["correo"];
                    $repeticion = $_REQUEST["repeticion"];
                    $tipo = $_REQUEST["tipo"];

                    echo '<script>actualizar(
                        "'.$id.'",
                        "'.$titulo.'",
                        "'.$fecha.'",
                        "'.$hora.'",
                        "'.$ubicacion.'",
                        "'.$correo.'",
                        "'.$repeticion.'",
                        "'.$tipo.'",)
                        </script>';
                    echo ("<h1>Actividad actualizada correctamente</h1> <br><br>");
                    echo ("<a href='Act_resume.php'>Volver al resumen de actividades</a>");
    
                } else {
                    echo "Favor llenar todos los campos <br><br>";
                    echo ("<a href='Act_resume.php'>Volver al formulario</a>");
                }
            }

            if (array_key_exists('detalle', $_POST)) {
                echo '<div id = "form_cont"></div>';
                echo '<script>obtener_id('.$_REQUEST['id'].')</script>';
        ?>
            <a href="Act_resume.php">Volver</a>
        <?php
            }
        ?>
    </body>
</html>