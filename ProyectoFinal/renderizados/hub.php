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
        </header>
        <section name="content-father" id="content-father" class="content-father">
            <div name="left-content" id="left-content" class="left-content" style="padding: 20px;">
                <span style="font-weight: bold;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href=""><img src="../img/inicio.png" style="width: 16pt;">  Inicio</a>
                </div>
                <br><hr><br>
                <div name="second-left-option" id="second-left-option" class="second-left-option">
                    <a href="publicar.html"><img src="../img/publicar.png" style="width: 16pt;">  Publica algo</a>
                </div>
                <br><hr><br>
                <div name="third-left-option" id="third-left-option" class="third-left-option">
                    <a href=""><img src="../img/buscar.png" style="width: 16pt;">  Explorar</a>
                </div>
            </div>
            <div name="midle-content" id="midle-content" class="midle-content">
                <div name="publicacion" id="publicacion" class="publicacion">
                    <div name="pub-name" id="pub-name" class="pub-name">
                        <a href=""><span>Luis Milla</span></a>
                        <br><br>
                    </div>
                    <div name="pub-content" id="pub-content" class="pub-content">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod sit recusandae laborum reiciendis, facere voluptatibus dolorem provident, illo obcaecati optio, enim quasi. Reiciendis obcaecati culpa aut accusamus, aliquam hic debitis!</p>
                        <br>
                        <div>
                            <a href=""><img src="../TestImg/gorillaz.jpg" alt="No se pudo cargar"></a>
                            <br>
                        </div>
                    </div>
                    <div name="pub-coments" id="pub-coments" class="pub-coments">
                        <div name="comented" id="comented" class="comented">
                            <div name="one-coment" id="one-coment" class="one-coment">
                                <a href="">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <br>
                        <div name="coment-area" id="coment-area" class="coment-area">
                            <form action="">
                                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                                <input type="submit" name="comentar" id="comentar" class="comentar" value="Comentar">
                            </form>
                        </div>
                    </div>
                </div>
                <div name="publicacion" id="publicacion" class="publicacion">
                    <div name="pub-name" id="pub-name" class="pub-name">
                        <a href=""><span>Luis Milla</span></a>
                        <br><br>
                    </div>
                    <div name="pub-content" id="pub-content" class="pub-content">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod sit recusandae laborum reiciendis, facere voluptatibus dolorem provident, illo obcaecati optio, enim quasi. Reiciendis obcaecati culpa aut accusamus, aliquam hic debitis!</p>
                        <br>
                        <div>
                            <a href=""><img src="../TestImg/gorillaz.jpg" alt="No se pudo cargar"></a>
                            <br>
                        </div>
                    </div>
                    <div name="pub-coments" id="pub-coments" class="pub-coments">
                        <div name="comented" id="comented" class="comented">
                            <div name="one-coment" id="one-coment" class="one-coment">
                                <a href="">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <br>
                        <div name="coment-area" id="coment-area" class="coment-area">
                            <form action="">
                                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                                <input type="submit" name="comentar" id="comentar" value="Comentar">
                            </form>
                        </div>
                    </div>
                </div>
                <div name="publicacion" id="publicacion" class="publicacion">
                    <div name="pub-name" id="pub-name" class="pub-name">
                        <a href=""><span>Luis Milla</span></a>
                        <br><br>
                    </div>
                    <div name="pub-content" id="pub-content" class="pub-content">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod sit recusandae laborum reiciendis, facere voluptatibus dolorem provident, illo obcaecati optio, enim quasi. Reiciendis obcaecati culpa aut accusamus, aliquam hic debitis!</p>
                        <br>
                        <div>
                            <a href=""><img src="../TestImg/gorillaz.jpg" alt="No se pudo cargar"></a>
                            <br>
                        </div>
                    </div>
                    <div name="pub-coments" id="pub-coments" class="pub-coments">
                        <div name="comented" id="comented" class="comented">
                            <div name="one-coment" id="one-coment" class="one-coment">
                                <a href="">Regis Rivera: </a><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <br>
                        <div name="coment-area" id="coment-area" class="coment-area">
                            <form action="">
                                <input type="text" name="coment" id="coment" class="coment" placeholder="Deja tu comentario"><br><br>
                                <input type="submit" name="comentar" id="comentar" value="Comentar">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div name="right-content" id="right-content" class="right-content" style="padding: 20px;">
                <span style="font-weight: bold;">Que quieres hacer?</span><br><br><hr><br>
                <div name="first-left-option" id="first-left-option" class="first-left-option">
                    <a href="perfil.html"><img src="../img/perfil.png" style="width: 16pt;">  Perfil</a>
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
            }
            echo $_SESSION['usuario_valido'];
        ?>
    </body>>
</html>