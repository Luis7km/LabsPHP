<?php
    session_start();    
?>
<html>
    <head>
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/helper.js"></script>
    </head>
    <body>
        <?php
            if (isset($_SESSION['usuario_valido']) && isset($_SESSION['id_valido'])) {
                session_destroy();
            }            
            echo '<script>open_login();</script>';
        ?>
    </body>
</html>