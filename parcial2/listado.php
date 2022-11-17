<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
<?php
        require_once('bd/BDp2.php');

        $obj_BDp2 = new BDParcial2();
        $result_bd = $obj_BDp2->consultar_resultados();

        $nfilas=count($result_bd);

            echo ("<a href='parcial2.html'>Realizar un nuevo calculo</a> <br><br>");

            if($nfilas > 0) {
                
                print ("<TABLE>\n");
                print ("<tr>\n");
                print ("<th>Id</th>\n");
                print ("<th>Numero</th>\n");
                print ("<th>Factorial</th>\n");
                print ("<th>Sumatoria</th>\n");
                print ("<th>Opcion</th>\n");
                print ("</tr>\n");

                foreach($result_bd as $resultado) {
                    print ("<TR>\n");
                    
                    ?>
                <form method="post" action="editar.php">
                <?php
                    print ("<TD> <input type='text' name='id' value='". $resultado['id'] ."'readonly></TD>\n");
                    print ("<TD>". $resultado['N'] ."</TD>\n");
                    print ("<TD>". $resultado['factorial'] ."</TD>\n");
                    print ("<TD>". $resultado['sumatoria'] ."</TD>\n");
                    print ("<TD> <input type='submit' name='editar' value='Editar'> </br></TD>\n");
                ?>
                </form>
                <?php
                    print ("</TR>\n");
                }
                print ("</TABLE>\n");   
            } else {
                print ("No hay calculos realizados");
            }
    ?>

    </body>
</html>