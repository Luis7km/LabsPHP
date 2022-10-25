<?php
    require_once('modelo.php');

    class agenda extends modeloCredencialesDB {
        protected $titulo;
        protected $fecha;
        protected $hora;
        protected $ubicacion;
        protected $correo;
        protected $repeticion;
        protected $tipo;

        public function __construct() {
            parent::__construct();
        }

        public function consultar_actividades() {
            $instrucciones = "CALL sp_listar_actividades()";

            $consulta = $this->_db->query($instrucciones);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado) {
                echo "Fallo al consultar las actividades";
            } else {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_actividad($id) {
            $instrucciones = "CALL sp_listar_actividad('".$id."')";

            $consulta = $this->_db->query($instrucciones);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado) {
                echo "Fallo al consultar las actividades";
            } else {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_actividades_hoy() {
            $instrucciones = "CALL sp_listar_actividades_hoy()";

            $consulta = $this->_db->query($instrucciones);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado) {
                echo "Fallo al consultar las actividades";
            } else {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function actualizar_actividad($id,$titulo,$fecha,$hora,$ubicacion,$correo,$repeticion,$tipo) {
            $instruccion = "CALL sp_actualizar_actividades('".$id."','".$titulo."','".$fecha."','".$hora."','".$ubicacion."','".$correo."','".$repeticion."','".$tipo."')";
            $actualiza = $this->_db->query($instruccion);
    
            if($actualiza) {
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }

        public function insertar_actividad($titulo,$fecha,$hora,$ubicacion,$correo,$repeticion,$tipo) {
            $instruccion = "CALL sp_insertar_actividad('".$titulo."','".$fecha."','".$hora."','".$ubicacion."','".$correo."','".$repeticion."','".$tipo."')";
            $actualiza = $this->_db->query($instruccion);
    
            if($actualiza) {
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }

        public function eliminar_actividad($id) {
            $instruccion = "CALL sp_eliminar_actividad('".$id."')";
            $actualiza = $this->_db->query($instruccion);
    
            if($actualiza) {
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }
    }
?>