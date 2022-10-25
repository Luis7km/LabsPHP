<?php
    
    if($_FILES['nombre_archivo_cliente']['type'] == 'image/jpeg' || $_FILES['nombre_archivo_cliente']['type'] == 'image/png' 
    || $_FILES['nombre_archivo_cliente']['type'] == 'image/gif') {
        
        if($_FILES['nombre_archivo_cliente']['size'] < 1048576) {
            if (is_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'])) {
            
                $nombreDirectorio = "archivos/";
                $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
                $nombreCompleto = $nombreDirectorio . $nombrearchivo;
        
                if (is_file($nombreCompleto)) {
                    $idUnico = time();
                    $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                    echo "Archivo repetido, se cambiara el nombre a $nombrearchivo 
                    <br><br>";
                }
                move_uploaded_file ($_FILES['nombre_archivo_cliente']['tmp_name'],
                $nombreDirectorio . $nombrearchivo);
                echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio<br>";
            } else {
                echo "No se ha podido subir el archivo <br>";
            }
        } else {
            echo "El archivo debe ser inferior a 1 MB <br>";
        }
    } else {
        echo "El archivo solo puede ser de tipo: jpg, jpeg, png o gif <br>";
    }
?>