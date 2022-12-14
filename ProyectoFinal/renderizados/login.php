<!DOCTYPE html>
<html>
    <head>
        <title>MindBook</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../css/clean.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <section name="header" id="header" class="header">
            <h1 id="headerTitle">MindBook</h1>
            <a href="hub.php"><h1 id="acceso">Hub</h1></a>
        </section>
        <section name="content" id="content" class="content">
            <section name="Card-Credentials" id="Card-Credentials" class="Card-Credentials">
            <div name="Card-register" id="Card-register" class="Card-register">
                <form action="../backend/back_registro.php" method="post">
                    <h3>Por favor, ingrese sus datos para registrarse</h3>
                    <div name="registeredNames" id="registeredNames" class="registeredNames">
                        <input type="text" name="firstName" id="firstName" class="firstName" placeholder="Primer nombre">
                        <input type="text" name="secondName" id="secondName" class="secondName" placeholder="Apellido">
                    </div>
                    <hr>
                    <div name="registeredUser" id="registeredUser" class="registeredUser">
                        <input type="user" name="user" id="user" class="user" placeholder="Usuario">
                    </div>
                    <hr>
                    <div name="registeredPassword" id="registeredPassword" class="registeredPassword">
                        <input type="password" name="password" id="password" class="password" placeholder="Contrasena">
                        <input type="password" name="password2" id="password2" class="password2" placeholder="Repita Constrasena">
                    </div>
                    <hr>
                    <div name="registeredContactInfo" id="registeredContactInfo" class="registeredContactInfo">
                        <input type="email" name="registeredEmail" id="registeredEmail" class="registeredEmail" placeholder="Email">
                    </div>
                    <hr>
                    <input type="submit" name="aceptar-registro" id="aceptar-registro" class="aceptar-registro" value="Registrar">
                </form>
            </div>
            <div name="Card-login" id="Card-login" class="Card-login">
                <form action="2fa.php" method="post">
                    <h3>Ingrese sus credenciales</h3>
                    <div name="credenciales" id="credenciales" class="credenciales">
                        <input type="text" name="user-login" id="user-login" class="user-login" placeholder="Usuario">
                        <input type="password" name="pass-login" id="pass-login" class="pass-login" placeholder="Contrasena">
                    </div>
                    <hr>
                    <input type="submit" name="aceptar-login" id="aceptar-login" class="aceptar-login" value="Entrar">
                </form>
            </div>
        </section>
        </section>
    </body>
</html>