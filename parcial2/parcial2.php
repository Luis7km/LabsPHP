<html>
    <head>
        <title>Resultado</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
    <?php
    require_once('bd/BDp2.php');
    include('calculos.php');

    $obj_BDp2 = new BDParcial2();
    $obj_calculo = new Calculos();

    $result_calculo = $obj_calculo->calcular_sumatoria($_REQUEST['n']);
    $obj_BDp2->calcular($_REQUEST['n'],$obj_calculo->calcular_factorial($_REQUEST['n']),$result_calculo);
    echo '<h1>Calculo realizado exitosamente</h1><br>';
    echo 'El resultado de aplicar la formula al numero '.$_REQUEST['n'].' es: '.$result_calculo.'<br>';
    echo '<a href="listado.php">Ver el listado de calculos<a>';
    ?>
    </body>
</html>