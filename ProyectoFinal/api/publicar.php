<?php
    //encabezados obligatorios 
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json;charset=UTF-8");
    header("Access-Control-Allow-Methods:POST");
    header("Access-Control-Max-Age:3600");
    header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");
    //obtener conexion de base de datos 
    include_once '../db_conex/conexion.php';
    //instanciar el objeto actividades 
    include_once '../objeto/mindbook.php';
    $conex=new Conexion();
    $db=$conex->obtenerConexion();
    $mindbook=new Mindbook($db);
    //obtener los datos 
    $data=json_decode(file_get_contents("php://input"));
    //asegurar que los datos no esten vacios 
    if(
        (!empty($data->id_user)&&!empty($data->contenido)&&!empty($data->imagen)&&!empty($data->tipo)) or
        (!empty($data->id_user)&&empty($data->contenido)&&!empty($data->imagen)&&!empty($data->tipo)) or
        (!empty($data->id_user)&&!empty($data->contenido)&&empty($data->imagen)&&!empty($data->tipo))
        ){
            //crear actividad
            if($mindbook->crear_publicaciones(
                $data->id_user,
                $data->contenido,
                $data->imagen,
                $data->tipo,
            )){
                //asignar codigo de respuesta - 201 creado 
                http_response_code(201);
                //informar al usuario 
                echo json_encode(array("message"=>"Publicacion realizada correctamente."));
            }
            //si no puede crear la cuenta, informar al usuario 
            else{
                //asignar codigo de respuesta - 503 servicio no disponible
                http_response_code(503);
                //informar al usuario 
                echo json_encode(array("message"=>"No se puede proceder con la publicacion."));
                }
        }
        //informar al usuario que los datos estan incompletos 
        else{
            //asignar codigo de respuesta - 400 solicitud incorrecta 
            http_response_code(400);
            //informar al usuario 
            echo json_encode(array("message"=>"Datos incorrectos."));
            }
            ?>