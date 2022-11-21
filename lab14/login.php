<?php
    session_start();

    if(isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {
        $usuario = $_REQUEST['usuario'];
        $clave = $_REQUEST['clave'];

        $salt = substr($usuarios, 0, 2);
        $clave_crypt = crypt($clave, $salt);

        require_once("class/usuarios.php");

        $obj_usuarios = new usuarios();
        $usuario_validado = $obj_usuarios->validar_usuario($usuario, $clave_crypt);

        foreach ($usuario_validado as $array_resp) {
            foreach ($array_resp as $value) {
                $nfilas=$value;
            }
        }
        if ($nfilas>0) {
            $usuario_validado = $usuario;
            $_SESSION["usuario_validado"] = $usuario_validado;
        }
    }
?>