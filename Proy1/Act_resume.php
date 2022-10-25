<html lang="es">
    <head>
        <title>Resumen de actividades</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        
    <h1>Actividades para hoy</h1>

    <?php
        require_once("class/agenda.php");

        $obj_agenda = new agenda();
        $result_agenda = $obj_agenda->consultar_actividades_hoy();

        $nfilas=count($result_agenda);

            echo ("<a href='insertar.php'>Añadir nueva actividad</a> <br><br>");

            if($nfilas > 0) {
                
                print ("<TABLE>\n");
                print ("<tr>\n");
                print ("<th>Id</th>\n");
                print ("<th>Titulo</th>\n");
                print ("<th>Fecha</th>\n");
                print ("<th>Hora</th>\n");
                print ("<th>Ubicacion</th>\n");
                print ("<th>Tipo</th>\n");
                print ("<th>Opcion</th>\n");
                print ("</tr>\n");

                foreach($result_agenda as $resultado) {
                    print ("<TR>\n");
                    
                    ?>
                <form method="post" action="editar.php">
                <?php
                    print ("<TD> <input type='text' name='id' value='". $resultado['id'] ."'readonly></TD>\n");
                    print ("<TD>". $resultado['titulo'] ."</TD>\n");
                    print ("<TD>". date("j/n/Y",strtotime($resultado['fecha'])) ."</TD>\n");
                    print ("<TD>". $resultado['hora'] ."</TD>\n");
                    print ("<TD>". $resultado['ubicacion'] ."</TD>\n");
                    print ("<TD>". $resultado['tipo'] ."</TD>\n");
                    print ("<TD> <input type='submit' name='detalle' value='Detalle'> </br> <input type='submit' name='eliminar' value='Eliminar'> </TD>\n");
                    ?>
                    </form>
                    <?php
                    print ("</TR>\n");
                }
                print ("</TABLE>\n");
                ?>

                <a href="Act_full.php">Mostrar todas las actividades</a>
                <?php
            } else {
                print ("No hay actividades agendadas para hoy");
            }
    ?>

    </body>
</html>