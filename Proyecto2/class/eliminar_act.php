<?php
    //encabezados obligatorios 
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json;charset=UTF-8");
    header("Access-Control-Allow-Methods:POST");
    header("Access-Control-Max-Age:3600");
    header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");
    //obtener conexion de base de datos 
    include_once '../BDConn/conexion.php';
    //instanciar el objeto actividades 
    include_once '../objeto/actividades.php';

    $conex=new Conexion();
    $db=$conex->obtenerConexion();
    $actividades = new Actividades($db);
    //obtener los datos 
    $data=json_decode(file_get_contents("php://input"));
    //asegurar que los datos no esten vacios 
    if(!empty($data->id)){
        //eliminar actividad
                $actividades->eliminar_actividad($data->id);
                //asignar codigo de respuesta - 200 OK 
                http_response_code(200);
    }
    //informar al usuario que los datos estan incompletos 
    else{
        //asignar codigo de respuesta - 400 solicitud incorrecta 
        http_response_code(400);
        //informar al usuario 
        echo json_encode(array("message"=>"Ocurrio un error que ni nosotros sabemos como solucionar."));
    }
    
?>