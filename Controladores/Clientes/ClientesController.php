<?php
    require_once "../../Modelos/ClientesModel.php";

    class ClientesController {
        private $cliente;

        public function __construct() {

            $this->cliente = new ClientesModel();
        }

        public function obtener_clientes() {
            $resultado = $this->cliente->obtener_clientes();
            return $resultado;
        }

        public function cargar_clientes_informes() {
            $resultado = $this->cliente->cargar_clientes();
            return $resultado;
        }

        public function cargar_departamentos() {
            $resultado = $this->cliente->cargar_departamentos();
            return $resultado;
        }

        public function cargar_municipios() {
            $resultado = $this->cliente->cargar_municipios();
            return $resultado;
        }

        public function insertar_cliente() {

            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $departamento = $_POST['departamento'];
            $municipio = $_POST['municipio'];

            $resultado = $this->cliente->registrar_cliente($nombres, $apellidos, $direccion, $departamento, $municipio, $telefono, $correo);
            return $resultado;
        }

    }

?>