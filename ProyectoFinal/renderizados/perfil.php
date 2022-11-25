<!DOCTYPE html>
<html>
    <head>
        <title>MindBook</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../css/clean.css">
        <link rel="stylesheet" href="../css/perfil.css">
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
                    <form action="">
                        <div name="info-card" id="info-card" class="info-card">
                            <div class="id-card">
                                <span>Id:</span>
                                <input type="text" name="info-id" id="info-id" class="info-id" readonly>
                            </div>
                            <div class="nombre-card">
                                <span>Nombre:</span>
                                <input type="text" name="info-nombre" id="info-nombre" class="info-nombre">
                            </div>
                            <div class="apellido-card">
                                <span>Primer Apellido:</span>
                                <input type="text" name="info-apellido" id="info-apellido" class="info-apellido2">
                            </div>
                            <div class="apellido2-card">
                                <span>Segundo Apellido:</span>
                                <input type="text" name="info-apellido2" id="info-apellido2" class="info-apellido2">
                            </div>
                            <div class="email-card">
                                <span>Email:</span>
                                <input type="email" name="info-email" id="info-email" class="info-email">
                            </div>
                            <div class="user-card">
                                <span>Usuario:</span>
                                <input type="text" name="info-user" id="info-user" class="info-user">
                            </div>
                            <div class="password-card">
                                <span>Contrasena:</span>
                                <input type="password" name="info-pass" id="info-pass" class="info-pass">
                            </div>
                        </div>
                        <input type="submit" id="actualizar" name="actualizar" class="actualizar">
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
                    <a href=""><img src="../img/salir.png" style="width: 16pt;">  Salir</a>
                </div>
            </div>
        </section>
        <footer>
            <h1 id="headerTitle">MindBook</h1>
        </footer>
    </body>>
</html>
