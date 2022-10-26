<html lang="es">
    <head>
        <title>Laboratorio 16.1</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <h1>Consulta de servicio web de Conversion de Tempreratura</h1>
        <form action="lab161.php" method="POST" name="FormConv">
            <br/>
            Convertir desde <select name="temp">
                <option value="CtoF" SELECTED>Celsius a Fahrenheit
                <option value="FtoC">Fahrenheit a Celsius
            </select> el valor
            <input type="number" name="valor" step="Any" required>
            <input type="submit" name="Convertir" value="Convertir">
        </form>
        <?php
            $servicio="https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
            $parametros=array();
            if(array_key_exists('Convertir', $_POST)){
                $valor=$_POST['valor'];
                $temp=$_POST['temp'];

                if($temp=="CtoF"){
                    $parametros['Celsius']=$valor;
                    $cliente= new SoapClient($servicio, $parametros);
                    $resultObj = $cliente->CelsiusToFahrenheit($parametros);
                    $resultado = $resultObj->CelsiusToFahrenheitResult;
                } else {
                    $parametros['Fahrenheit']=$valor;
                    $cliente= new SoapClient($servicio, $parametros);
                    $resultObj = $cliente->FahrenheitToCelsius($parametros);
                    $resultado = $resultObj->FahrenheitToCelsiusResult;
                }

                print ("<br>La temperatura $valor ".substr($temp,0,1)." es igual a: $resultado ".substr($temp,3,1));
            }
        ?>
    </body>
</html>