<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MindBook</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../css/clean.css">
        <link rel="stylesheet" href="../css/perfil.css">
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/helper.js"></script>
    </head>
    <body>
        <?php
            if (isset($_SESSION['usuario_valido']) && isset($_SESSION['id_valido'])) {
                if (array_key_exists('actualizar', $_POST)) {
                    $url = 'http://localhost/proyectofinal/api/modificar_usuario.php';
                    $ch = curl_init($url);
                    $user_data = array('id'=>$_REQUEST['info-id'],
                                        'nombre'=>$_REQUEST['info-nombre'],
                                        'apellido'=>$_REQUEST['info-apellido'],
                                        'email'=>$_REQUEST['info-email']);
                    $user_data_json = json_encode($user_data);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    echo '<script>alert("Cambio correcto");</script>';
                }
                if (array_key_exists('actualizar2', $_POST)) {
                    $url = 'http://localhost/proyectofinal/api/consultar_perfil.php';
                    $ch = curl_init($url);
                    $user_data = array('usuario'=>$_SESSION["usuario_valido"]);
                    $user_data_json = json_encode($user_data);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    $decoded = json_decode($result, true);
                    curl_close($ch);
            
                    $salt=substr($_REQUEST['info-user'], 0, 2);
                    $clave_crypt = crypt($_REQUEST['info-pass1'], $salt);
                    $pass = $clave_crypt;
            
                    if ($pass == $decoded['records'][0]['contrasena'] && !$_REQUEST['info-pass2']) {
                        $salt1=substr($_REQUEST['info-user'], 0, 2);
                        $clave_crypt1 = crypt($_REQUEST['info-pass2'], $salt1);
                        $pass1 = $clave_crypt1;
                        $url1 = 'http://localhost/proyectofinal/api/modificar_contrasena.php';
                        $ch1 = curl_init($url1);
                        $user_data1 = array('id'=>$_REQUEST['info-id'],
                                            'contrasena'=>$pass1);
                        $user_data_json1 = json_encode($user_data1);
                        curl_setopt($ch1, CURLOPT_POSTFIELDS, $user_data_json1);
                        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                        $result1 = curl_exec($ch1);
                        echo '<script>alert("Cambio de contrasena correcto");</script>';
                    } else {
                        echo '<script>alert("Algun campo esta vacio o incompleto");</script>';
                    }
                }
        ?>
        <header>
            <h1 id="headerTitle">MindBook</h1>
        </header>
        <section name="content-father" id="content-father" class="content-father">
            <div name="left-content" id="left-content" class="left-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="hub.php" style="font-size: 14pt;"><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="publicar.php" style="font-size: 14pt;"><img src="../img/publicar.png" style="width: 16pt;">  Publica algo</a>
                </div>
                <br><hr><br>
            </div>
            <div name="midle-content" id="midle-content" class="midle-content">
                <div name="perfil-info" id="perfil-info" class="perfil-info">
                    <h2 style="font-size: 24pt;">Informacion de usuario</h2>
                    <hr>
                    <!-- Aqui van los datos del perfil   -->
                </div>
            </div>
            <div name="right-content" id="right-content" class="right-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="perfil.php" style="font-size: 14pt;"><img src="../img/perfil.png" style="width: 16pt;">  Perfil</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="../backend/back_logout.php" style="font-size: 14pt;"><img src="../img/salir.png" style="width: 16pt;">  Salir</a>
                </div>
                <br><hr><br>
            </div>
        </section>
        <footer>
            <h1 id="headerTitle">MindBook</h1>
        </footer>
    </body>
    <?php
    
    $url = 'http://localhost/proyectofinal/api/consultar_perfil.php';
    $ch = curl_init($url);
    $user_data = array('usuario'=>$_SESSION["usuario_valido"]);
    $user_data_json = json_encode($user_data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $decoded = json_decode($result, true);
    curl_close($ch);
    echo '<script>cargar_perfil('.$decoded['records'][0]['user_id'].',
        "'.$decoded['records'][0]['nombre'].'",
        "'.$decoded['records'][0]['apellido'].'",
        "'.$decoded['records'][0]['usuario'].'",
        "'.$decoded['records'][0]['email'].'",
        "'.$decoded['records'][0]['contrasena'].'");</script>';
        
    } else {
        echo '<script>open_login();</script>';
    }
    ?>
</html>
