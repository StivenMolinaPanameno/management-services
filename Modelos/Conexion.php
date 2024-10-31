<?php
    class Conexion {
        private $host ;
        private $usuario ;
        private $bd_nombre ;
        private $clave ;
        private $conexion ;

        public function __construct()
        {
            $this->host = "localhost";
            $this->usuario = "root";
            $this->clave = "";
            $this->bd_nombre = "management-services-final";
            $this->conexion = null;

            try {
                $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->bd_nombre", $this->usuario, $this->clave);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

        public function get_conexion() {
            return $this->conexion;
        }
    }
?>