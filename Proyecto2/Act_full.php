<html lang="es">
    <head>
        <title>Resumen de actividades</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        
    <h1>Todas las actividades</h1>

    <?php
        $data = json_decode(file_get_contents('http://localhost/proyecto2/class/leer_todos.php'), true);
        
        $nfilas=count($data['records']);
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
            foreach($data['records'] as $records) {
                print ("<TR>\n");
    ?>
    <form method="post" action="editar.php">
        <?php
            print ("<TD> <input type='text' name='id' value='". $records['id'] ."'readonly></TD>\n");
            print ("<TD>". $records['titulo'] ."</TD>\n");
            print ("<TD>". date("j/n/Y",strtotime($records['fecha'])) ."</TD>\n");
            print ("<TD>". $records['hora'] ."</TD>\n");
            print ("<TD>". $records['ubicacion'] ."</TD>\n");
            print ("<TD>". $records['tipo'] ."</TD>\n");
            print ("<TD> <input type='submit' name='detalle' value='Detalle'> </br> <input type='submit' name='eliminar' value='Eliminar'> </TD>\n");
        ?>
    </form>
    <?php
        print ("</TR>\n");
        }
        print ("</TABLE><br><br>\n");
        ?>
        <a href="Act_resume.php">Mostrar las actividades de hoy</a>
        <?php
            } else {
                print ("No hay actividades agendadas para hoy");
            }
        ?>
    </body>
</html>