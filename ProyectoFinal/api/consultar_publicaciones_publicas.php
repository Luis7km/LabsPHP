<?php
    //Encabezados obligatorios
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json; charset=UTF-8");
    //Incluir archivos de conexion y objeto
    include_once '../db_conex/conexion.php';
    include_once '../objeto/mindbook.php';
    //Inicializar base de datos y objeto
    $conex=new Conexion();
    $db=$conex->obtenerConexion();
    $mindbook = new Mindbook($db);
    //Query leer actividades
    $stmt = $mindbook->consultar_publicaciones_publicas();
    $num = $stmt->rowCount();
    //Verificar registros traiddos de la consulta
    if ($num > 0) {
        //arreglo de actividades 
        $publicaciones_arr=array();
        $publicaciones_arr["records"]=array();
        //obtiene todo el contenido de la tabla 
        //fetch()es mas rapido que fetchAll() puede ser
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            //extraer fila 
            extract($row);
            
            $publicaciones_item=array(

                "pub_id"=>$pub_id,
                "contenido"=>$contenido,
                "imagen"=>$imagen,
                "usuario"=>$usuario);

                array_push($publicaciones_arr["records"],$publicaciones_item);
            }
            //asignar codigo de respuesta - 200 OK 
            http_response_code(200);
            //mostrar actividades en formato json 
            echo json_encode($publicaciones_arr);
    }
    else {
        //asignar codigo de respuesta - 404 No encontrado
        http_response_code(404);
        //informarle al usuario que no se encontraron actividades 
        echo json_encode(
            array("message"=>"No se encontraron actividades.")
        );
    }
?>