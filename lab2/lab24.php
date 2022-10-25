<html>
    <head>
        <title>laboratorio 2.4</title>
    </head>
    <body>
        <?php
            // Creación del arreglo array("clave" => "valor")
            $personas = array("juan" => "Panama",
            "john" => "USA",
            "eica" => "Finlandia",
            "kusanagi" => "Japon");

            // Recorrer todo el arreglo
            foreach($personas as $persona => $pais) {
                print "$persona es de $pais<br>";
            }

            // Impresión específica
            echo "<br>".$personas["juan"];
            echo "<br>".$personas["eica"];
        ?>
    </body>
</html>