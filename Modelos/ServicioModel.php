<?php

require 'Conexion.php';

    class ServicioModel {
        private $conexion;

        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->get_conexion();
        }

        public function cargar_servicios() {
            $stmt = $this->conexion->prepare("
        SELECT 
            a.nombre_servicio, 
            b.nombre_tipo_servicio, 
            CONCAT(d.nombres, ' ', d.apellidos) AS cliente, 
            a.description AS descripcion, 
            a.precio, 
            a.estatus_servicio
        FROM 
            servicios AS a
        INNER JOIN 
            tipo_servicio AS b ON a.servicio_id = b.tipo_servicio_id
        INNER JOIN 
            detalles_servicio AS c ON a.servicio_id = c.detalle_servicio_id
        INNER JOIN 
            clientes AS d ON c.cliente = d.cliente_id
    ");

            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

        public function cargar_tipo_servicio() {
            $stmt = $this->conexion->prepare("SELECT * FROM tipo_servicio");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

        public function buscar_servicio_tipo($tipo) {
            $stmt = $this->conexion->prepare("
                    SELECT 
                        a.nombre_servicio, 
                        b.nombre_tipo_servicio, 
                        CONCAT(d.nombres, ' ', d.apellidos) AS cliente, 
                        a.description AS descripcion, 
                        a.precio, 
                        a.estatus_servicio
                    FROM 
                        servicios AS a
                    INNER JOIN 
                        tipo_servicio AS b ON a.servicio_id = b.tipo_servicio_id
                    INNER JOIN 
                        detalles_servicio AS c ON a.servicio_id = c.detalle_servicio_id
                    INNER JOIN 
                        clientes AS d ON c.cliente = d.cliente_id
                    WHERE a.tipo_servicio = :tipo
                ");
            $stmt->bindValue(':tipo', $tipo);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

    }
?>