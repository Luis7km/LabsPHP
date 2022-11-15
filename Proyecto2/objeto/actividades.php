<?php
    class Actividades {
        //Conexion con base de datos y tabla
        private $conn;
        private $nombre_tabla="recordatorio";
        //Atributos de clase
        //public $id;
        public $titulo;
        public $fecha;
        public $hora;
        public $ubicacion;
        public $correo;
        public $repeticion;
        public $tipo;
        //Constructor que recibe bd y conexion
        public function __construct($db) {
            $this->conn=$db;
        }
        function consultar_actividades() {
            $instrucciones = "CALL sp_listar_actividades()";
            //preparar consuulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
            return $stmt;
        }

        function consultar_actividades_hoy() {
            $instrucciones = "CALL sp_listar_actividades_hoy()";
            //preparar consuulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
                return $stmt;
        }

        function consultar_actividad($id) {
            $instrucciones = "CALL sp_listar_actividad('".$id."')";
            //preparar consulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            //$stmt->bindParam(1,$this->id);
            $stmt->execute();
            return $stmt;
        }

        public function actualizar_actividad($id,$titulo,$fecha,$hora,$ubicacion,$correo,$repeticion,$tipo) {
            $instrucciones = "CALL sp_actualizar_actividades('".$id."','".$titulo."','".$fecha."','".$hora."','".$ubicacion."','".$correo."','".$repeticion."','".$tipo."')";
            //preparar consulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();

            if ($stmt) {
                return $stmt;
            }
        }

        public function insertar_actividad($titulo,$fecha,$hora,$ubicacion,$correo,$repeticion,$tipo) {
            $instrucciones = "CALL sp_insertar_actividad('".$titulo."','".$fecha."','".$hora."','".$ubicacion."','".$correo."','".$repeticion."','".$tipo."')";
            //preparar consulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();

            if($stmt) {
                return $stmt;
            }
        }

        public function eliminar_actividad($id) {
            $instrucciones = "CALL sp_eliminar_actividad('".$id."')";
            //preparar consulta
            $stmt=$this->conn->prepare($instrucciones);
            //ejecutar consulta
            $stmt->execute();
            if($stmt) {
                return $stmt;
            }
        }
    }
?>