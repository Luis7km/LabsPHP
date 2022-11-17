<?php
    require_once('modelo.php');

    class BDParcial2 extends modeloCredencialesDB {
        protected $titulo;
        protected $texto;
        protected $categoria;
        protected $fecha;
        protected $imagen;

        public function __construct() {
            parent::__construct();
        }

        public function consultar_resultados() {
            $instrucciones = "CALL sp_listar_parcial2()";

            $consulta = $this->_db->query($instrucciones);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado) {
                echo "Fallo al consultar las noticias";
            } else {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_calculo($id) {
            $instrucciones = "CALL sp_consultar_calculo('".$id."')";

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

        public function actualizar_calculo($id,$numero,$factorial,$sumatoria) {
            $instruccion = "CALL sp_actualizar_calculo('".$id."','".$numero."','".$factorial."','".$sumatoria."')";
            $actualiza = $this->_db->query($instruccion);
    
            if($actualiza) {
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }

        public function calcular($n, $f, $s) {
            $instruccion = "CALL sp_calcular(".$n.",".$f.",".$s.")";
            $actualiza = $this->_db->query($instruccion);

            if($actualiza) {
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }
    }
?>