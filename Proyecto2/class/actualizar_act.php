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
    $activities=new Actividades($db);
    //obtener los datos 
    $data=json_decode(file_get_contents("php://input"));
    //asegurar que los datos no esten vacios 
    if(
        !empty($data->id)&&
        !empty($data->titulo)&&
        !empty($data->fecha)&&
        !empty($data->hora)&&
        !empty($data->ubicacion)&&
        !empty($data->correo)&&
        !empty($data->repeticion)&&
        !empty($data->tipo)
        ){
            //actualizar actividad 
            if($activities->actualizar_actividad(
                $data->id,
                $data->titulo,
                $data->fecha,
                $data->hora,
                $data->ubicacion,
                $data->correo,
                $data->repeticion,
                $data->tipo,
            )){
                //asignar codigo de respuesta - 201 creado 
                http_response_code(201);
                //informar al usuario 
                echo json_encode(array("message"=>"La actividad se ha actualizado."));
            }
            //si no puede crear la actividad, informar al usuario 
            else{
                //asignar codigo de respuesta - 503 servicio no disponible
                http_response_code(503);
                //informar al usuario 
                echo json_encode(array("message"=>"No se puede actualizar la actividad."));
                }
        }
        //informar al usuario que los datos estan incompletos 
        else{
            //asignar codigo de respuesta - 400 solicitud incorrecta 
            http_response_code(400);
            //informar al usuario 
            echo json_encode(array("message"=>"Datos incompletos."));
            }
            ?>