<?php
    class Mindbook {
        //Conexion con base de datos y tabla
        private $conn;
        //Atributos de clase
        //Constructor que recibe bd y conexion
        public function __construct($db) {
            $this->conn=$db;
        }
        function consultar_publicaciones($tipo) {
            $instrucciones = "CALL sp_listar_publicaciones(".$tipo.")";
            //preparar consuulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
            return $stmt;
        }

        function consultar_publicaciones_ususario($usuario) {
            $instrucciones = "CALL sp_listar_publicaciones_usuario(".$usuario.")";
            //preparar consuulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
                return $stmt;
        }

        function consultar_comentarios($id_pub) {
            $instrucciones = "CALL sp_listar_comentarios(".$id_pub.")";
            //preparar consuulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
                return $stmt;
        }

        public function crear_usuario($nombre,$ape1,$ape2,$em,$nick,$pass) {
            $instrucciones = "CALL sp_crear_usuario('".$nombre."','".$ape1."','".$ape2."','".$em."','".$nick."','".$pass."')";
            //preparar consulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();

            if($stmt) {
                return $stmt;
            }
        }

        public function modificar_usuario($id,$nombre,$ape1,$ape2,$em,$nick,$pass) {
            $instrucciones = "CALL sp_modificar_usuario('".$id."','".$nombre."','".$ape1."','".$ape2."','".$em."','".$nick."','".$pass."')";
            //preparar consulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();

            if ($stmt) {
                return $stmt;
            }
        }

        function verificar_usuario($usuario, $pass) {
            $instrucciones = "CALL sp_verificar_usuario('".$usuario."','".$pass."')";
            //preparar consuulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
                return $stmt;
        }

    }
?>