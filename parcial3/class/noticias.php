<?php
    require_once('modelo.php');

    class noticia extends modeloCredencialesDB {
        protected $titulo;
        protected $texto;
        protected $categoria;
        protected $fecha;
        protected $imagen;

        public function __construct() {
            parent::__construct();
        }

        public function crear_noticias($ti, $te, $ca, $fe, $im) {
            $instrucciones = "CALL sp_crear_noticia('".$ti."','".$te."','".$ca."','".$fe."','".$im."')";

            $consulta = $this->_db->query($instrucciones);

            if($consulta) {
                return $consulta;
                $consulta->close();
                $this->_db->close();
            }
        }
        
        public function consultar_noticias() {
            $instrucciones = "CALL sp_listar_noticias()";

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

        public function consultar_noticias_filtro($campo, $valor) {
            $instruccion = "CALL sp_listar_noticias_filtro('".$campo."', '".$valor."')";

            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
    }
?>