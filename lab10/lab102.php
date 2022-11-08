<html lang="es">
    <head>
        <title>Laboratorio 10.2</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        
    <h1>Encuesta. Resultados de la votacion</h1>

    <?php
        require_once("class/votos.php");

        $obj_votos = new votos();
        $result_votos = $obj_votos->listar_votos();

        foreach ($result_votos as $result_voto) {
            $votos1=$result_voto['votos1'];
            $votos2=$result_voto['votos2'];
        }

        $totalVotos=$votos1+$votos2;

        print ("<TABLE>\n");

        print ("<tr>\n");
        print ("<th>Respuesta</th>\n");
        print ("<th>Votos</th>\n");
        print ("<th>Porcentaje</th>\n");
        print ("<th>Representacion grafica</th>\n");
        print ("</tr>\n");

        $porcentaje=round(($votos1/$totalVotos)*100,2);
        print ("<tr>\n");
        print ("<td class='izquierda'>Si</td>\n");
        print ("<td class='derecha'>$votos1</td>\n");
        print ("<td class='derecha'>$porcentaje</td>\n");
        print ("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='". $porcentaje*4 ."'></td>\n");
        print ("</tr>\n");

        $porcentaje=round(($votos2/$totalVotos)*100,2);
        print ("<tr>\n");
        print ("<td class='izquierda'>No</td>\n");
        print ("<td class='derecha'>$votos2</td>\n");
        print ("<td class='derecha'>$porcentaje</td>\n");
        print ("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='". $porcentaje*4 ."'></td>\n");
        print ("</tr>\n");

        print ("</table>\n");
        print ("<p>Numero total de votos emitidos: $totalVotos</p>\n");
        print ("<p><a href='lab101.php'>Pagina de votacion</a></p>\n");
    ?>

    </body>
</html>