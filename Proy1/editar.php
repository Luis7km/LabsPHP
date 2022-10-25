<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Editar Actividad</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>

        <?php
            require_once("class/agenda.php");
            if(array_key_exists('eliminar', $_POST)) {
                $id = $_REQUEST["id"];
                require_once("class/agenda.php");
    
                $obj_agenda = new agenda();
                $result_agenda = $obj_agenda->eliminar_actividad($id);
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
    
                    $obj_agenda = new agenda();
                    $result_agenda = $obj_agenda->actualizar_actividad($id, $titulo,$fecha,$hora,$ubicacion,$correo,$repeticion,$tipo);
    
                    echo ("<h1>Actividad actualizada correctamente</h1> <br><br>");
                    echo ("<a href='Act_resume.php'>Volver al resumen de actividades</a>");
    
                } else {
                    echo "Favor llenar todos los campos <br><br>";
                    echo ("<a href='Act_resume.php'>Volver al formulario</a>");
                }
            }

            if (array_key_exists('detalle', $_POST)) {
                $obj_agenda = new agenda();
                $result_agenda = $obj_agenda->consultar_actividad($_REQUEST['id']);
        ?>
            <h1>Detalle de Actividad</h1>
            <form method="POST" action="editar.php">
                Id <input type="text" name="id" value="<?php echo($result_agenda[0]['id']); ?>"readonly> <br> <br>
                Titulo <input type="text" name="titulo" value="<?php echo($result_agenda[0]['titulo']); ?>"> <br> <br>
                Fecha <input type="text" name="fecha" value="<?php echo($result_agenda[0]['fecha']); ?>"> <br> <br>
                Hora <input type="text" name="hora" value="<?php echo($result_agenda[0]['hora']); ?>"> <br> <br>
                Ubicacion <input type="text" name="ubicacion" value="<?php echo($result_agenda[0]['ubicacion']); ?>"> <br> <br>
                Correo <input type="text" name="correo" value="<?php echo($result_agenda[0]['correo']); ?>"> <br> <br>
                Repeticion <input type="text" name="repeticion" value="<?php echo($result_agenda[0]['repeticion']); ?>"> <br> <br>
                Tipo <select name="tipo" value="<?php echo($result_agenda[0]['tipo']); ?>">
                <option value="Deporte">Deporte</option>
                <option value="Estudio">Estudio</option>
                <option value="Trabajo">Trabajo</option>
                <option value="Fiesta">Fiesta</option>
                <option value="Reunion">Reunion</option>
                <option value="Viaje">Viaje</option>
                <option value="Super_Mercado">Super Mercado</option>
                </select> <br> <br>
                <input type="submit" name="actualizar" value="Actualizar">
                <input type="submit" name="eliminar" value="Eliminar">
            </form>
            <a href="Act_resume.php">Volver</a>
        <?php
            }
        ?>
    </body>
</html>