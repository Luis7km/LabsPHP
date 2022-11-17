<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Editar Actividad</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>

        <?php
        require_once('bd/BDp2.php');
        include('calculos.php');
        $obj_calculo = new Calculos();

            if(array_key_exists('actualizar', $_POST)) {
                if($_REQUEST['id'] != "" && $_REQUEST['N'] != "" && $_REQUEST['factorial'] != "" && $_REQUEST['sumatoria'] != "" ) {
                    $id = $_REQUEST["id"];
                    $numero = $_REQUEST["N"];
                    $factorial = $_REQUEST["factorial"];
                    $sumatoria = $_REQUEST["sumatoria"];
    
                    $obj_BDp2 = new BDParcial2();
                    $obj_BDp2->actualizar_calculo($id, $numero,$obj_calculo->calcular_factorial($numero),$obj_calculo->calcular_sumatoria($numero));
    
                    echo ("<h1>Calculo actualizado correctamente</h1> <br><br>");
                    echo ("<a href='listado.php'>Volver al resumen de calculos</a>");
    
                } else {
                    echo "Favor llenar todos los campos <br><br>";
                    echo ("<a href='listado.php'>Volver al listado</a>");
                }
            }

            if (array_key_exists('editar', $_POST)) {
                echo $_REQUEST['id'].'<br><br>';
                $obj_BDp2 = new BDParcial2();
                $result_bd = $obj_BDp2->consultar_calculo($_REQUEST['id']);
        ?>
            <h1>Detalle de Actividad</h1>
            <form method="POST" action="editar.php">
                Id <input type="text" name="id" value="<?php echo($result_bd[0]['id']); ?>"readonly> <br> <br>
                Numero <input type="text" name="N" value="<?php echo($result_bd[0]['N']); ?>"> <br> <br>
                Factorial <input type="text" name="factorial" value="<?php echo($result_bd[0]['factorial']); ?>"readonly> <br> <br>
                Sumatoria <input type="text" name="sumatoria" value="<?php echo($result_bd[0]['sumatoria']); ?>"readonly> <br> <br>
                </select> <br> <br>
                <input type="submit" name="actualizar" value="Actualizar">
            </form>
            <a href="listado.php">Volver</a>
        <?php
            }
        ?>
    </body>
</html>