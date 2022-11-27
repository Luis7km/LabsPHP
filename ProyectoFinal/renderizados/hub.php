<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MindBook</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../css/clean.css">
        <link rel="stylesheet" href="../css/hub.css">
    </head>
    <body>
        <header>
            <h1 id="headerTitle">MindBook</h1>
            <?php
                if (!isset($_SESSION['usuario_valido']) && !isset($_SESSION['id_valido'])) {
                    echo '<a href="login.php"><h1 id="acceso">Registrar | Ingresar</h1></a>';
                }
            ?>
        </header>
        <section name="content-father" id="content-father" class="content-father">
            <div name="left-content" id="left-content" class="left-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="" style="font-size: 14pt;"><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="publicar.php"  style="font-size: 14pt;"><img src="../img/publicar.png" style="width: 16pt;">  Publica algo</a>
                </div>
                <br><hr><br>
            </div>
            <div name="midle-content" id="midle-content" class="midle-content">
                <!-- Aqui van las publicaciones   -->
            </div>
            <div name="right-content" id="right-content" class="right-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="perfil.php"  style="font-size: 14pt;"><img src="../img/perfil.png" style="width: 16pt;">  Perfil</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="../backend/back_logout.php"  style="font-size: 14pt;"><img src="../img/salir.png" style="width: 16pt;">  Salir</a>
                </div>
            </div>
        </section>
        <footer>
            <h1 id="headerTitle">MindBook</h1>
        </footer>
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/helper.js"></script>
        <?php
            if (isset($_SESSION['usuario_valido']) && isset($_SESSION['id_valido'])) {
                $data = json_decode(file_get_contents('http://localhost/proyectofinal/api/consultar_publicaciones.php'), true);
                foreach($data['records'] as $records) {
                    echo '<script>
                    cargar_publicaciones("'.$records['usuario'].'", "'.$records['contenido'].'", "'.$records['imagen'].'");
                    </script>';
                }
            } else {
                $data = json_decode(file_get_contents('http://localhost/proyectofinal/api/consultar_publicaciones_publicas.php'), true);
                foreach($data['records'] as $records) {
                    echo '<script>
                    cargar_publicaciones("'.$records['usuario'].'", "'.$records['contenido'].'", "'.$records['imagen'].'");
                    </script>';
                }
            }
        ?>
    </body>>
</html>
