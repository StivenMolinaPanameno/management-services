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

        public function cargar_tipo_servicio() {
            $resultado = $this->servicio_model->cargar_tipo_servicio();
            return $resultado;
        }

        public function buscar_servicio_tipo($tipo) {
            $resultado = $this->servicio_model->buscar_servicio_tipo($tipo);
            return $resultado;
        }

    }
?>