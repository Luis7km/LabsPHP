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
        ?>
        <header>
            <h1 id="headerTitle">MindBook</h1>
        </header>
        <section name="content-father" id="content-father" class="content-father">
            <div name="left-content" id="left-content" class="left-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="hub.php"><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="publicar.php"><img src="../img/publicar.png" style="width: 16pt;">  Publica algo</a>
                </div>
                <br><hr><br>
                <div name="third-left-option" id="third-left-option" class="third-left-option">
                    <a href=""><img src="../img/buscar.png" style="width: 16pt;">  Explorar</a>
                </div>
            </div>
            <div name="midle-content" id="midle-content" class="midle-content">
                <div name="perfil-info" id="perfil-info" class="perfil-info">
                    <h2 style="font-size: 24pt;">Informacion de usuario</h2>
                    <hr>
                    <form action="" id="perfil-form">
                        <!-- Aqui van los datos del perfil   -->
                    </form>
                </div>
                
            </div>
            <div name="right-content" id="right-content" class="right-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="perfil.php"><img src="../img/perfil.png" style="width: 16pt;">  Perfil</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="../backend/back_logout.php"><img src="../img/salir.png" style="width: 16pt;">  Salir</a>
                </div>
            </div>
        </section>
        <footer>
            <h1 id="headerTitle">MindBook</h1>
        </footer>
    </body>>
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
