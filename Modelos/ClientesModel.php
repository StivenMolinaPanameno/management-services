<?php
require_once ("Conexion.php");
    class ClientesModel {

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

        public function cargar_clientes() {
            $stmt = $this->conexion->prepare("
       
            SELECT 
                CONCAT(a.nombres, ' ', a.apellidos) AS nombres,
                b.nombre_tipo_cliente,
                MAX(d.fecha_pago) AS ultima_fecha_pago,
                (SELECT COUNT(*) FROM cuotas AS c WHERE c.estatus_cuota = 'pendiente' AND c.cliente = a.cliente_id) AS cuotas_pendientes,
                (SELECT SUM(f.monto_cuota) FROM cuotas as f WHERE f.estatus_cuota = 'pendiente' AND f.cliente = a.cliente_id) AS monto_pendiente
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

        public function cargar_cliente_modificar($id) {
            $stmt = $this->conexion->prepare("select * from clientes as a
inner join departamentos as b on a.departamento = b.departamento_id
inner join municipios as c on a.municipio = c.municipio_id where a.cliente_id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function actualizar_cliente($id, $nombres, $apellidos, $direccion, $departamento, $municipio, $telefono, $correo, $tipo_cliente) {
            $stmt = $this->conexion->prepare("update clientes set nombres = :nombres, apellidos = :apellidos, 
                    direccion = :direccion, departamento = :departamento, municipio = :municipio, telefono = :telefono, correo = :correo, tipo_cliente = :tipo_cliente where cliente_id = :id");
            $stmt->bindValue(":nombres", $nombres);
            $stmt->bindValue(":apellidos", $apellidos);
            $stmt->bindValue(":direccion", $direccion);
            $stmt->bindValue(":departamento", $departamento);
            $stmt->bindValue(":municipio", $municipio);
            $stmt->bindValue(":telefono", $telefono);
            $stmt->bindValue(":correo", $correo);
            $stmt->bindValue(":tipo_cliente", $tipo_cliente);
            $stmt->bindValue(":id", $id);
            try {
                $stmt->execute();
                return ['success' => true, 'message' => 'Cliente actualizado exitosamente.'];
            } catch (PDOException $e) {
                return ['success' => false, 'message' => 'Error al actualizar el cliente: ' . $e->getMessage()];
            }
        }

        public function eliminar_cliente($id) {
            $stmt = $this->conexion->prepare("delete from clientes where cliente_id = :id");
            $stmt->bindValue(":id", $id);
            try {
                $stmt->execute();
                return ['success' => true, 'message' => 'Cliente eliminado exitosamente.'];
            } catch (PDOException $e) {
                return ['success' => false, 'message' => 'Error al eliminar el cliente: ' . $e->getMessage()];
            }

        }

        public function cargar_clientes_id ($id) {
            $stmt = $this->conexion->prepare("select * from clientes where cliente_id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function clientes_morosos () {
            $stmt = $this->conexion->prepare("SELECT 
                CONCAT(a.nombres, ' ', a.apellidos) AS nombres,
                b.nombre_tipo_cliente,
                MAX(d.fecha_pago) AS ultima_fecha_pago,
                (SELECT COUNT(*) FROM cuotas AS c WHERE c.estatus_cuota = 'pendiente' AND c.cliente = a.cliente_id) AS cuotas_pendientes,
                (SELECT SUM(f.monto_cuota) FROM cuotas as f WHERE f.estatus_cuota = 'pendiente' AND f.cliente = a.cliente_id) AS monto_pendiente
            FROM 
                clientes AS a
            INNER JOIN 
                tipo_cliente AS b ON a.tipo_cliente = b.tipo_cliente_id
            INNER JOIN 
                pagos AS d ON a.cliente_id = d.cliente
            INNER JOIN cuotas AS e ON 
                a.cliente_id = e.cliente
			WHERE e.fecha_vencimiento < CURRENT_DATE
            AND e.estatus_cuota = 'pendiente'
            GROUP BY 
                nombres;
");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }

        public function clientes_contado () {
            $stmt = $this->conexion->prepare(" SELECT 
                CONCAT(a.nombres, ' ', a.apellidos) AS nombres,
                b.nombre_tipo_cliente,
                MAX(d.fecha_pago) AS ultima_fecha_pago,
                (SELECT COUNT(*) FROM cuotas AS c WHERE c.estatus_cuota = 'pendiente' AND c.cliente = a.cliente_id) AS cuotas_pendientes,
                coalesce((SELECT SUM(f.monto_cuota) FROM cuotas as f WHERE f.estatus_cuota = 'pendiente' AND f.cliente = a.cliente_id), 0) AS monto_pendiente
            FROM 
                clientes AS a
            INNER JOIN 
                tipo_cliente AS b ON a.tipo_cliente = b.tipo_cliente_id
            INNER JOIN 
                pagos AS d ON a.cliente_id = d.cliente
            INNER JOIN detalles_servicio AS e ON 
                a.cliente_id = e.cliente
                where d.tipo_pago = 1 
            GROUP BY 
                nombres");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }
        public function clientes_credito () {
            $stmt = $this->conexion->prepare(" SELECT 
                CONCAT(a.nombres, ' ', a.apellidos) AS nombres,
                b.nombre_tipo_cliente,
                MAX(d.fecha_pago) AS ultima_fecha_pago,
                (SELECT COUNT(*) FROM cuotas AS c WHERE c.estatus_cuota = 'pendiente' AND c.cliente = a.cliente_id) AS cuotas_pendientes,
                coalesce((SELECT SUM(f.monto_cuota) FROM cuotas as f WHERE f.estatus_cuota = 'pendiente' AND f.cliente = a.cliente_id), 0) AS monto_pendiente
            FROM 
                clientes AS a
            INNER JOIN 
                tipo_cliente AS b ON a.tipo_cliente = b.tipo_cliente_id
            INNER JOIN 
                pagos AS d ON a.cliente_id = d.cliente
            INNER JOIN detalles_servicio AS e ON 
                a.cliente_id = e.cliente
                where d.tipo_pago = 2
            GROUP BY 
                nombres");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        }



    }


?>