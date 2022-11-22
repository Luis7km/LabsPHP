<html>
    <head>
        <title>Parcial 3</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
    <?php
        $ti; $te; $ca; $fe; $im;
        
        if(array_key_exists('insertar', $_POST)) {
            if($_REQUEST['titulo'] != "" && $_REQUEST['texto'] != "" && $_REQUEST['categoria'] != "" && $_REQUEST['fecha'] != "" && $_REQUEST['imagen'] != "") {
                $ti = $_REQUEST["titulo"];
                $te = $_REQUEST["texto"];
                $ca = $_REQUEST["categoria"];
                $fe = $_REQUEST["fecha"];
                $im = $_REQUEST["imagen"];
                    
                require_once("class/noticias.php");

                $obj_noticia = new noticia();
                $result_noticia = $obj_noticia->crear_noticias($ti,$te,$ca,$fe,$im);

                echo ("<h1>Noticia registrada correctamente</h1> <br><br>");
                echo ("<a href='consultar.php'>Volver al listado</a>");

            } else {
                echo "Favor llenar todos los campos <br><br>";
                echo ("<a href='form.php'>Volver al formulario</a>");
            }
        } else {
        ?>
        <h1>Añadir actividad</h1>
        <form method="POST" action="form.php">
            Titulo <input type="text" name="titulo"> <br> <br>
            <textarea name="texto" cols="30" rows="10" placeholder="Descripcion..."></textarea> <br> <br>
            Categoria <select name="categoria">
            <option value="promociones">Promociones</option>
            <option value="costas">Costas</option>
            <option value="ofertas">Ofertas</option>
            </select> <br> <br>
            Fecha <input type="date" name="fecha"> <br> <br>
            Imagen <input type="text" name="imagen"> <br> <br>
            <input type="submit" name="insertar" value="Aceptar">
        </form>
        <?php
            print ("<a href='consultar.php'>Volver...</a>");
            }
        ?>
    </body>
</html>