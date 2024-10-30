<?php

require 'Conexion.php';

    class ServicioModel {
        private $conexion;

        public function __construct(){
            $this->conexion=new Conexion();
            $this->conexion=$this->conexion->get_conexion();
        }

        public function cargar_servicios() {
            // Prepara la consulta SQL
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

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retornar los resultados
            return $resultados;
        }

    }
?>