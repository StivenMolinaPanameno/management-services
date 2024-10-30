<?php
require_once ("Conexion.php");
    class ClientesModel {
        private $id;
        private $nombre;
        private $direccion;
        private $departamento;
        private $telefono;
        private $correo;

        private $conexion;

        public function __construct() {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->get_conexion();
        }


        public function obtener_clientes() {
            $stmt = $this->conexion->prepare("SELECT * FROM clientes");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function obtener_clientes_filtro($opcion) {
            $stmt = $this->conexion->prepare("SELECT * FROM clientes WHERE nombre LIKE :nombre");
        }

        public function cargar_clientes() {
            $stmt = $this->conexion->prepare("
       
            SELECT 
                CONCAT(a.nombres, ' ', a.apellidos) AS nombres,
                b.nombre_tipo_cliente,
                MAX(d.fecha_pago) AS ultima_fecha_pago,
                (SELECT COUNT(*) FROM cuotas AS c WHERE c.estatus_cuota = 'pendiente' AND c.cliente = a.cliente_id) AS cuotas_pendientes,
                e.monto_pendiente 
            FROM 
                clientes AS a
            INNER JOIN 
                tipo_cliente AS b ON a.tipo_cliente = b.tipo_cliente_id
            INNER JOIN 
                pagos AS d ON a.cliente_id = d.cliente
            INNER JOIN detalles_servicio AS e ON 
                a.cliente_id = e.cliente
            GROUP BY 
                nombres;
         ");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

        public function cargar_departamentos () {
            $stmt = $this->conexion->prepare("SELECT * FROM departamentos");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

        public function cargar_municipios (){
            $stmt = $this->conexion->prepare("SELECT * FROM municipios");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

        public function registrar_cliente($nombres, $apellidos, $direccion, $departamento, $municipio, $telefono, $correo) {
            $stmt = $this->conexion->prepare("INSERT INTO clientes (nombres, apellidos, direccion, departamento, municipio, telefono, correo, tipo_cliente)
                    VALUES (:nombres, :apellidos, :direccion, :departamento, :municipio, :telefono, :correo, :tipo_cliente)");
            $stmt->bindValue(":nombres", $nombres);
            $stmt->bindValue(":apellidos", $apellidos);
            $stmt->bindValue(":direccion", $direccion);
            $stmt->bindValue(":departamento", $departamento);
            $stmt->bindValue(":municipio", $municipio);
            $stmt->bindValue(":telefono", $telefono);
            $stmt->bindValue(":correo", $correo);
            $stmt->bindValue(":tipo_cliente", 1);
            try {
                $stmt->execute();
                return ['success' => true, 'message' => 'Cliente registrado exitosamente.'];
            } catch (PDOException $e) {
                return ['success' => false, 'message' => 'Error al registrar el cliente: ' . $e->getMessage()];
            }

        }



    }


?>