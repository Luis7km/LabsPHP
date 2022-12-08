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
                    <a href="hub.php" style="font-size: 14pt;"><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
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
            //Se recibe el ID de la publicacion para acceder solo a ella
            if (isset($_POST['abrir-publicacion'])) {
                $_SESSION["pub_id"] = $_REQUEST['pub_id'];
            }
            //Se busca la publicacion por ID
            if (isset($_SESSION['usuario_valido']) && isset($_SESSION['id_valido'])) {
                $pub_id = $_SESSION["pub_id"];
                    $url = 'http://localhost/proyectofinal/api/consultar_publicacion.php';
                    $ch = curl_init($url);
                    $user_data = array('pub_id'=>$pub_id);
                    $user_data_json = json_encode($user_data);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    $decoded = json_decode($result, true);
                    curl_close($ch);
                //Se cargan los comentarios de la publicacion buscada
                foreach($decoded['records'] as $records) {
                    echo '<script>
                    cargar_publicacion("'.$records['usuario'].'", "'.$records['contenido'].'", "'.$records['imagen'].'", '.$records['pub_id'].');
                    </script>';
                    $url = 'http://localhost/proyectofinal/api/consultar_comentarios.php';
                    $ch = curl_init($url);
                    $user_data = array('pub_id'=>$records["pub_id"]);
                    $user_data_json = json_encode($user_data);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    $decoded = json_decode($result, true);
                    curl_close($ch);
                    echo '<script>console.log("'.$_SESSION['usuario_valido'].'")</script>';
                    echo '<script>console.log("'.$_SESSION['id_valido'].'")</script>';
                    if (!is_null($result)) {
                        foreach($decoded['records'] as $records2) {
                            echo '<script>
                        cargar_comentarios("'.$records2['usuario'].'", "'.$records2['comentario'].'", '.$records['pub_id'].');
                        </script>';
                        }
                    }  
                }
                //Codigo para hacer un comentario en una publicacion
                if (array_key_exists('comentar', $_POST)) {
                    $url = 'http://localhost/proyectofinal/api/comentar.php';
                    $ch = curl_init($url);
                    $user_data = array('id_user'=>$_SESSION['id_valido'],
                                        'id_publi'=>$_REQUEST["pub_id"],
                                        'contenido'=>$_REQUEST["coment"]);
                    $user_data_json = json_encode($user_data);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    echo '<script>
                        cargar_comentarios("'.$_SESSION['usuario_valido'].'","'.$_REQUEST["coment"].'", '.$_REQUEST["pub_id"].');
                        </script>';
                }
            } else {
                $data = json_decode(file_get_contents('http://localhost/proyectofinal/api/consultar_publicaciones_publicas.php'), true);
                foreach($data['records'] as $records) {
                    echo '<script>
                    cargar_publicacion("'.$records['usuario'].'", "'.$records['contenido'].'", "'.$records['imagen'].'", "'.$records['pub_id'].'");
                    </script>';
                    $url = 'http://localhost/proyectofinal/api/consultar_comentarios.php';
                    $ch = curl_init($url);
                    $user_data = array('pub_id'=>$records["pub_id"]);
                    $user_data_json = json_encode($user_data);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data_json);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    $decoded = json_decode($result, true);
                    curl_close($ch);
                    if (!is_null($result)) {
                        foreach($decoded['records'] as $records2) {
                            echo '<script>
                        cargar_comentarios("'.$records2['usuario'].'", "'.$records2['comentario'].'", "'.$records['pub_id'].'");
                        </script>';
                        }
                    }
                }
                if (array_key_exists('comentar', $_POST)) {
                    echo '<script>open_login();</script>';
                }
            }
        ?>
    </body>
    <script>
        function comentar() {
            var pub_id = document.getElementById("pub_id").Value;
            console.log(pub_id);
        }
    </script>
</html>
