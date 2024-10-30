<?php

        require_once "Conexion.php";


        class PagosModel {
           private $conexion;
            public function __construct(){

                $this->conexion = new Conexion();
                $this->conexion = $this->conexion->get_conexion();
            }

            public function cargar_historico_pagos() {
                // Prepara la consulta SQL
                $stmt = $this->conexion->prepare("
                    SELECT 
                        CONCAT(b.nombres, ' ', b.apellidos) AS cliente,
                        a.fecha_pago,
                        a.monto_pagado,
                        a.descripcion,
                        c.nombre_tipo_pago,
                        a.pago_id
                    FROM 
                        pagos AS a
                    INNER JOIN 
                        clientes AS b ON a.cliente = b.cliente_id
                    INNER JOIN 
                        tipo_pago AS c ON a.tipo_pago = c.tipo_pago_id
                ");
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $resultados;
            }

            public function registrar_pagos($monto, $cod_cliente, $fecha_pago, $servicio, $tipo_pago) {
                $cliente_busqueda = $this->buscar_cliente_registrar_pago($cod_cliente);
                $cod_cliente = intval($cod_cliente);

               $cuota = $this->buscar_cuota_pendiente($cod_cliente, $servicio)[0];

                $tipos_pagos = $this->buscar_tipo_pago($tipo_pago)[0];

                if($cliente_busqueda != null && $cuota != null && $tipos_pagos != null){
                   $cliente = $cliente_busqueda['cliente_id'];
                   $cliente = intval($cliente);
                   $descripcion = 'Pago realizado';
                   $cuota_id = $cuota['cuota_id'];
                   $tipo_pago = $tipos_pagos['tipo_pago_id'];
                   $tipo_pago = intval($tipo_pago);

                   $stmt = $this->conexion->prepare("INSERT INTO pagos (cuota_id, monto_pagado, fecha_pago, cliente, tipo_pago, descripcion)
                                 VALUES (:cuota_id, :monto, :fecha_pago, :cliente, :tipo_pago, :descripcion)");
                   $stmt->bindValue(':cuota_id', $cuota_id);
                   $stmt->bindValue(':monto', $monto);
                   $stmt->bindValue(':fecha_pago', $fecha_pago);
                   $stmt->bindValue(':cliente', $cliente);
                   $stmt->bindValue(':tipo_pago', $tipo_pago);
                   $stmt->bindValue(':descripcion', $descripcion);

                   try {
                       $stmt->execute();
                       return ['success' => true, 'message' => 'Pago registrado exitosamente.'];
                   } catch (PDOException $e) {
                       return ['success' => false, 'message' => 'Error al registrar el pago: ' . $e->getMessage()];
                   }

               }
               return ['success' => false, 'message' => 'Error al registrar el pago: Cliente no registrado.'];


            }

            public function buscar_cuota_pendiente($cod_cliente, $servicio) {
                $stmt = $this->conexion->prepare("SELECT * FROM cuotas as c
                    inner join servicios as s on s.servicio_id = c.servicio
                    where c.estatus_cuota = 'pendiente' and c.cliente = :cod_cliente and s.nombre_servicio = :servicio
                    order by c.fecha_vencimiento asc limit 1");
                $stmt->bindValue(':cod_cliente', $cod_cliente);
                $stmt->bindValue(':servicio', $servicio);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }

            public function buscar_tipo_pago($nombre_tipo_pago) {
                $stmt = $this->conexion->prepare("SELECT * FROM tipo_pago where nombre_tipo_pago = :nombre_tipo_pago limit 1");
                $stmt->bindValue(':nombre_tipo_pago', $nombre_tipo_pago);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }
            public function  buscar_cliente_registrar_pago($cod_cliente) {
                $stmt = $this->conexion->prepare("
                    select b.monto_cuota, a.cliente_id, e.nombre_tipo_pago, c.nombre_servicio, (select count(*) as cuotas_pendientes 
                    from cuotas where estatus_cuota = 'pendiente' and cliente = :cod_cliente) as cuotas_pendientes
                    from clientes as a
                    inner join cuotas as b on b.cliente = a.cliente_id
                    inner join servicios as c on c.servicio_id = b.servicio
                    inner join detalles_servicio as d on c.servicio_id = d.servicio
                    inner join tipo_pago as e on d.tipo_pago = e.tipo_pago_id
                    where a.cliente_id = :cod_cliente and b.estatus_cuota = 'pendiente' order by fecha_vencimiento asc limit 1;
                    
                ");
                $stmt->bindValue(':cod_cliente', $cod_cliente);
                $stmt->execute();
                $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultados;
            }

            public function historico_pagos_id ($cod_cliente) {
                $stmt = $this->conexion->prepare("
                    SELECT 
                        CONCAT(b.nombres, ' ', b.apellidos) AS cliente,
                        a.fecha_pago,
                        a.monto_pagado,
                        a.descripcion,
                        c.nombre_tipo_pago,
                        a.pago_id
                    FROM 
                        pagos AS a
                    INNER JOIN 
                        clientes AS b ON a.cliente = b.cliente_id
                    INNER JOIN 
                        tipo_pago AS c ON a.tipo_pago = c.tipo_pago_id
                    WHERE cliente_id = :cod_cliente
                ");
                $stmt->bindValue(':cod_cliente', $cod_cliente);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }

            public function obtener_detalles_pago($cod_cliente) {
                $stmt = $this->conexion->prepare("
                SELECT a.monto_total,
                coalesce((SELECT COUNT(*) FROM cuotas AS c WHERE c.cliente = 7), 0) AS numero_cuotas,
                a.tasa_interes * 100 as interes,
                c.nombre_tipo_pago
                FROM detalles_servicio as a 
                inner join pagos as b on a.cliente = b.cliente
                inner join tipo_pago as c on c.tipo_pago_id = a.tipo_pago
                where a.cliente = :cod_cliente
                group by a.cliente;");
                $stmt->bindValue(':cod_cliente', $cod_cliente);
                $stmt->execute();
                $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultados;
            }

            public function cargar_detalles_plan_pago($cod_cliente) {
                $stmt = $this->conexion->prepare("
                SELECT a.cuota_id, b.fecha_pago, b.monto_pagado, c.saldo_anterior, nuevo_saldo FROM cuotas as a
                inner join pagos as b on b.cuota_id = a.cuota_id
                inner join historico_pagos as c on c.pago_id = b.pago_id
                where a.cliente = :cod_cliente;
                ");
                $stmt->bindValue(':cod_cliente', $cod_cliente);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }

        }


?>