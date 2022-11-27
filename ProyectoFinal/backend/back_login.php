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
        $bandera = 0;
        if (array_key_exists('aceptar-registro', $_POST)) {
            $data = json_decode(file_get_contents('http://localhost/proyectofinal/api/consultar_perfiles.php'), true);
            foreach($data['records'] as $records) {
                if ($records['usuario'] == $_REQUEST['user']) {
                    $bandera = 1;
                }
            }
            if ($bandera == 0) {
                $url = 'http://localhost/proyectofinal/api/registrar.php';
                $ch = curl_init($url);
                $salt=substr($_REQUEST['user'], 0, 2);
                $clave_crypt = crypt($_REQUEST['password2'], $salt);
                $pass = $clave_crypt;
                $user_data = array('nombre'=>$_REQUEST['firstName'],
                                'apellido'=>$_REQUEST['secondName'],
                                'email'=>$_REQUEST['registeredEmail'],
                                'usuario'=>$_REQUEST['user'],
                                'contrasena'=>$pass);
                $user_data_json = json_encode($user_data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $decoded = json_decode($result, true);
                curl_close($ch);
                echo '<script>open_login();alert("Registrado correctamente");</script>';
            } else {
                echo '<script>open_login();alert("Usuario en uso");</script>';
            }
        }

        if (array_key_exists('aceptar-login', $_POST)) {
            $salt=substr($_REQUEST['user-login'], 0, 2);
            $clave_crypt = crypt($_REQUEST['pass-login'], $salt);
            $pass = $clave_crypt;
            $url = 'http://localhost/proyectofinal/api/login.php';
            $ch = curl_init($url);
            $user_data = array('usuario'=>$_REQUEST['user-login'],
                            'contrasena'=>$pass);
            $user_data_json = json_encode($user_data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $decoded = json_decode($result, true);
            curl_close($ch);

            if ($_REQUEST['user-login']==$decoded['records'][0]['usuario'] &&
            $pass==$decoded['records'][0]['contrasena']) {
                $usuario_valido = $decoded['records'][0]['usuario'];
                $id_valido = $decoded['records'][0]['user_id'];
                $_SESSION["usuario_valido"] = $usuario_valido;
                $_SESSION["id_valido"] = $id_valido;

                print ($_SESSION['usuario_valido']." ".$_SESSION['id_valido']);
            
                echo '<script>open_hub();</script>';
            } else {
                echo '<script>open_login();alert("Datos incorrectos");</script>';
                echo $_REQUEST['user-login'] . " " . $decoded['records'][0]['usuario'];
                echo '<br>';
                echo $pass . " " . $decoded['records'][0]['contrasena'];
            }
        }
        ?>
    </body>
</html>