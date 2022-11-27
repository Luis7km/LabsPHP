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
    </head>
    <body>
        <header>
            <h1 id="headerTitle">MindBook</h1>
        </header>
        <section name="content-father" id="content-father" class="content-father">
            <div name="left-content" id="left-content" class="left-content" style="padding: 20px;">
                <span style="font-weight: bold;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="hub.php"><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href=""><img src="../img/publicar.png" style="width: 16pt;">  Publica algo</a>
                </div>
                <br><hr><br>
                <div name="third-left-option" id="third-left-option" class="third-left-option">
                    <a href=""><img src="../img/buscar.png" style="width: 16pt;">  Explorar</a>
                </div>
            </div>
            <div name="midle-content" id="midle-content" class="midle-content">
                <div name="publicacion-card" id="publicacion-card" class="publicacion-card">
                    <h2 style="font-size: 24pt;">Dale cuerpo a tu publicacion</h2><br><hr><br>
                    <form action="../backend/back_publicar.php" enctype="multipart/form-data" method="post">
                        <textarea name="contenido-pub" id="contenido-pub" class="contenido-pub" placeholder="Contenido... (Opcional)"></textarea><br><br>
                        <div id="drop_file_zone">
                            <input type="file" name="imagen" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"/><br/><br/>
                            <img id="output" src="" width="20%" alt="">
                        </div>
                        <input type="radio" name="tipo" class="tipo" id="tipo" value="publico" checked="checked"><span>Publico</span>
                        <input type="radio" name="tipo" class="tipo" id="tipo" value="privado"><span>Privado</span>
                        <br><br>
                        <input type="submit" name="subir" id="subir" class="subir" value="Subir">
                    </form>
                </div>
            </div>
            <div name="right-content" id="right-content" class="right-content" style="padding: 20px;">
                <span style="font-weight: bold;">Que quieres hacer?</span><br><br><hr><br>
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
    </body>
</html>