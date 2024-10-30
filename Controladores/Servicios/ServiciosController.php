<?php
    require '../../Modelos/ServicioModel.php';
    class ServiciosController {

        private $servicio_model;

        public function __construct() {
            $this->servicio_model = new ServicioModel();
        }
        public function cargar_servicios() {

            $resultado = $this->servicio_model-> cargar_servicios();
            return $resultado;
        }



    }
?>