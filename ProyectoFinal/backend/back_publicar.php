<?php
    session_start();    
?>
<html>
    <head>
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/helper.js"></script>
    </head>
    <body>
        <?php
            $nombreDirectorio = "../archivo/";
            $nombreArchivo = $_FILES['imagen']['name'];
            $nombreCompleto = $nombreDirectorio . $nombreArchivo;
            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreArchivo = $idUnico . "-" . $nombreArchivo;
            }
            $url = 'http://localhost/proyectofinal/api/publicar.php';
            $ch = curl_init($url);
            $publi_data = array('id_user'=>$_SESSION['id_valido'],
                                'contenido'=>$_REQUEST['contenido-pub'],
                                'imagen'=>$nombreArchivo,
                                'tipo'=>$_REQUEST['tipo']);
            $publi_data_json = json_encode($publi_data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $publi_data_json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $decoded = json_decode($result, true);
            curl_close($ch);
            move_uploaded_file ($_FILES['imagen']['tmp_name'],
            $nombreDirectorio . $nombreArchivo);
            echo '<script>open_hub();</script>';
        ?>
    </body>
</html>