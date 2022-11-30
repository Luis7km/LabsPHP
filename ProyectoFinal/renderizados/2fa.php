<?php

    session_start();
    use PHPMailer\PHPMailer\PHPmailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MindBook</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../css/clean.css">
        <link rel="stylesheet" href="../css/login.css">
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/helper.js"></script>
    </head>
    <body>
        <section name="header" id="header" class="header">
            <h1 id="headerTitle">MindBook</h1>
            <a href="hub.php"><h1 id="acceso">Hub</h1></a>
        </section>
        <?php
        
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
                        $numero = rand(100000, 999999);
                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465;
                        $mail->SMTPSecure = "ssl";
                        $mail->SMTPAuth=true;
                        $mail->Username = "mindbook96@gmail.com";
                        //xdcjigzeeemmjmaw
                        $mail->Password = "xdcjigzeeemmjmaw";
                        $mail->setFrom("mindbook96@gmail.com");
                        $mail->addAddress($decoded['records'][0]['email']);
                        $mail->isHTML(true);
                        $mail->Subject = "Mindbook: Codigo de verificacion";
                        $mail->Body ="Su codigo de verificacion es el siguiente: ".$numero."";
                        if (!$mail->send()) {
                            echo $mail->ErrorInfo;
                        }else{
                            echo '<div class="father-2fa"><div class="Card-2fa">
                            <h3>Ingrese el codigo que se le envio a su correo</h3><br>
                            <form action="2fa.php" method="post">
                            <input type="hidden" name="user-login" value="'.$_REQUEST['user-login'].'"></input>
                            <input type="hidden" name="pass-login" value="'.$_REQUEST['pass-login'].'"></input>
                            <input type="hidden" name="2fa-login1" value="'.$numero.'"></input>
                            <input type="number" name="2fa-login2"></input><br><br>
                            <input type="submit" name="autenticar" class="aceptar-registro" value="Autenticar"></input>
                            </form></div></div>';
                        }
                        //mail($correo, $subject, $mensaje);
                        
                    } else {
                        echo '<script>open_login();alert("Datos incorrectos");</script>';
                    }
            
            }

            if (array_key_exists('autenticar', $_POST)) {

                if ($_REQUEST['2fa-login1']==$_REQUEST['2fa-login2']) {
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

                    $usuario_valido = $decoded['records'][0]['usuario'];
                    $id_valido = $decoded['records'][0]['user_id'];
                    $_SESSION["usuario_valido"] = $usuario_valido;
                    $_SESSION["id_valido"] = $id_valido;
                    print ($_SESSION['usuario_valido']." ".$_SESSION['id_valido']);
                
                    echo '<script>open_hub();</script>';
                }
            }
        ?>
    </body>
</html>
        