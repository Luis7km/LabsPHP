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
    $mindbook = new Mindbook($db);
    //obtener los datos 
    $data=json_decode(file_get_contents("php://input"));
    //asegurar que los datos no esten vacios 
    if(
        !empty($data->usuario)&&
        !empty($data->contrasena)
    
    ){
        $salt=substr($data->usuario, 0, 2);
        $clave_crypt = crypt($data->contrasena, $salt);
        $data->contrasena = $clave_crypt;
        //consultar con el id
        $stmt = $mindbook->verificar_usuario($data->usuario,$data->contrasena);
        $num = $stmt->rowCount();
        if (!is_null($num)) {
            //arreglo de actividades 
            $perfil_arr=array();
            $perfil_arr["records"]=array();
            //obtiene todo el contenido de la tabla 
            //fetch()es mas rapido que fetchAll(), asi dicen 
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                //extraer fila 
                extract($row);
                
                $perfil_item=array(
    
                    "user_id"=>$user_id,
                    "nombre"=>$nombre,
                    "apellido"=>$apellido,
                    "usuario"=>$usuario,
                    "email"=>$email,
                    "contrasena"=>$contrasena);
    
                    array_push($perfil_arr["records"],$perfil_item);
                }
                //asignar codigo de respuesta - 200 OK 
                http_response_code(200);
                //mostrar activida en formato json 
                echo json_encode($perfil_arr);
        }
        else {
            //asignar codigo de respuesta - 404 No encontrado
            http_response_code(404);
            //informarle al usuario que no se encontro la actividad 
            echo json_encode(
                array("message"=>"No se encontro una actividad editable.")
            );
        }

    }
    //informar al usuario que los datos estan incompletos 
    else{
        //asignar codigo de respuesta - 400 solicitud incorrecta 
        http_response_code(400);
        //informar al usuario 
        echo json_encode(array("message"=>"Ocurrio un error que ni nosotros sabemos como solucionar."));
    }
    
?>