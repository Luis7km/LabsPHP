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
        $url = 'http://localhost/proyectofinal/api/login.php';
        $ch = curl_init($url);
        $user_data = array('usuario'=>$_REQUEST['user-login'],
                            'contrasena'=>$_REQUEST['pass-login']);
        $user_data_json = json_encode($user_data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $decoded = json_decode($result, true);
        curl_close($ch);

        if ($_REQUEST['user-login']==$decoded['records'][0]['usuario'] &&
        $_REQUEST['user-login']==$decoded['records'][0]['usuario']) {
            $usuario_valido = $decoded['records'][0]['usuario'];
            $id_valido = $decoded['records'][0]['user_id'];
            $_SESSION["usuario_valido"] = $usuario_valido;
            $_SESSION["id_valido"] = $id_valido;

            print ($_SESSION['usuario_valido']." ".$_SESSION['id_valido']);
            
            echo '<script>open_hub();</script>';
        }

        ?>
    </body>
</html>