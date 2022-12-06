<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MindBook</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../css/clean.css">
        <link rel="stylesheet" href="../css/publicar.css">
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/helper.js"></script>
    </head>
    <body>
        <?php
            if (isset($_SESSION['usuario_valido']) && isset($_SESSION['id_valido'])) {
        ?>
        <header>
            <h1 id="headerTitle">MindBook</h1>
            <a href="hub.php"><h1 id="acceso">Hub</h1></a>
        </header>
        <section name="content-father" id="content-father" class="content-father">
            <div name="left-content" id="left-content" class="left-content" style="padding: 20px;">
                <span style="font-weight: bold; font-size: 16pt;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="hub.php"  style="font-size: 14pt;"><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="publicar.php"  style="font-size: 14pt;"><img src="../img/publicar.png" style="width: 16pt;">  Publica algo</a>
                </div>
                <br><hr><br>
            </div>
            <div name="midle-content" id="midle-content" class="midle-content">
                <div name="publicacion-card" id="publicacion-card" class="publicacion-card">
                    <h2 style="font-size: 24pt;">Dale cuerpo a tu publicacion</h2><br><hr><br>
                    <form action="../backend/back_publicar.php" enctype="multipart/form-data" method="post">
                        <textarea name="contenido-pub" id="contenido-pub" class="contenido-pub" placeholder="Contenido... (Opcional)"></textarea><br><br>
                        <div id="drop_file_zone">
                            <input type="file" name="imagen" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"/><br/><br/>
                            <img id="output" src="" height="60%" alt="">
                        </div>
                        <input type="radio" name="tipo" class="tipo" id="tipo" value="publico" checked="checked"><span>Publico</span>
                        <input type="radio" name="tipo" class="tipo" id="tipo" value="privado"><span>Privado</span>
                        <br><br>
                        <input type="submit" name="subir" id="subir" class="subir" value="Subir">
                    </form>
                </div>
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
    </body>
    <?php
            } else {
                echo '<script>open_login();</script>';
            }
        ?>
</html>