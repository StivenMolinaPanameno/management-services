<?php

require '../../Modelos/PagosModel.php';
    class PagosController {
        private $pagos;

        public function __construct() {
            $this->pagos = new PagosModel();
        }

        public function cargar_historico_pagos() {
            $resultado = $this->pagos->cargar_historico_pagos();
            return $resultado;
        }

        public function registrar_pagos()
        {
            $monto = trim($_POST['cuota_a_pagar']);
            $cod_cliente = trim($_POST['codigo_cliente']);
            $fecha_pago = trim($_POST['fecha_de_pago']);
            $tipo_pago = trim($_POST['forma_de_pago']);
            $servicio = trim($_POST['tipo_de_servicio']);

            $validar_pagos = $this->validar_pagos($monto, $cod_cliente, $fecha_pago, $servicio, $tipo_pago);
            if (!empty($validar_pagos)) {
                return $validar_pagos;
            }

            $resultado = $this->pagos->registrar_pagos($monto, $cod_cliente, $fecha_pago, $servicio, $tipo_pago);
            return $resultado;
            /*
            if ($resultado['success'] != true) {
                header('Location: ../../Vistas/Pagos/RegistrarPagos.php');
                return $resultado['message'];
            }
            header('Location: ../../Vistas/Pagos/RegistrarPagos.php');
            return '';*/
        }
        public function buscar_cliente_registrar_pagos($cod_cliente){

            $resultado = $this->pagos->buscar_cliente_registrar_pago($cod_cliente);
            return $resultado;
        }

        public function validar_pagos ($monto, $cod_cliente, $fecha_pago, $servicio, $tipo_pago) {

            $errores = [];
                if (empty($monto) || !is_numeric($monto) || $monto <= 0) {
                    $errores[] = "La cuota a pagar debe ser un número positivo.";
                }
                if (empty($cod_cliente)) {
                    $errores[] = "El código de cliente es obligatorio.";
                }
                if (empty($fecha_pago) || !preg_match('/\d{4}-\d{2}-\d{2}/', $fecha_pago)) {
                    $errores[] = "La fecha de pago debe tener el formato AAAA-MM-DD.";
                }
                if (empty($tipo_pago)) {
                    $errores[] = "La forma de pago es obligatoria.";
                }
                if (empty($servicio)) {
                    $errores[] = "El tipo de servicio es obligatorio.";
                }
            return $errores;
        }

    }


?>