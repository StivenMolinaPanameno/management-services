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

        public function cargar_cliente_modificar($id) {
            $resultado = $this->cliente->cargar_cliente_modificar($id);
            return $resultado;
        }

        public function actualizar_cliente($id, $tipo_cliente) {
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $departamento = $_POST['departamento'];
            $municipio = $_POST['municipio'];

            $resultado = $this->cliente->actualizar_cliente($id, $nombres, $apellidos, $direccion, $departamento, $municipio, $telefono, $correo, $tipo_cliente);
            return $resultado;

        }

        public function eliminar_cliente($id) {
            $resultado = $this->cliente->eliminar_cliente($id);
            return $resultado;
        }
        public function cargar_cliente_id($id) {
            $resultado = $this->cliente->cargar_clientes_id($id);
            return $resultado;
        }

        public function cargar_clientes_morosos () {
            $resultado = $this->cliente->clientes_morosos();
            return $resultado;
        }
        public function clientes_contado(){
            $resultado = $this->cliente->clientes_contado();
            return $resultado;
        }

        public function clientes_credito(){
            $resultado = $this->cliente->clientes_credito();
            return $resultado;
        }

    }

?>