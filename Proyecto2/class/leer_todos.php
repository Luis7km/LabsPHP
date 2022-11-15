<?php
    //Encabezados obligatorios
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json; charset=UTF-8");
    //Incluir archivos de conexion y objeto
    include_once '../BDConn/conexion.php';
    include_once '../objeto/actividades.php';
    //Inicializar base de datos y objeto
    $conex=new Conexion();
    $db=$conex->obtenerConexion();
    $actividades = new Actividades($db);
    //Query leer actividades
    $stmt = $actividades->consultar_actividades();
    $num = $stmt->rowCount();
    //Verificar registros traiddos de la consulta
    if ($num > 0) {
        //arreglo de actividades 
        $activities_arr=array();
        $activities_arr["records"]=array();
        //obtiene todo el contenido de la tabla 
        //fetch()es mas rapido que fetchAll() puede ser
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            //extraer fila 
            extract($row);
            
            $activities_item=array(

                "id"=>$id,
                "titulo"=>$titulo,
                "fecha"=>$fecha,
                "hora"=>$hora,
                "ubicacion"=>$ubicacion,
                "correo"=>$correo,
                "repeticion"=>$repeticion,
                "tipo"=>$tipo);

                array_push($activities_arr["records"],$activities_item);
            }
            //asignar codigo de respuesta - 200 OK 
            http_response_code(200);
            //mostrar actividades en formato json 
            echo json_encode($activities_arr);
    }
    else {
        //asignar codigo de respuesta - 404 No encontrado
        http_response_code(404);
        //informarle al usuario que no se encontraron actividades 
        echo json_encode(
            array("message"=>"No se encontraron actividades.")
        );
    }