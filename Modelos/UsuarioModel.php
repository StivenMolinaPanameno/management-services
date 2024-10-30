<?php
    require_once ("Conexion.php");
    class UsuarioModel {
        private $usuario_id;
        private $contrasenia;
        private $nombre_usuario;
        private $email;
        private $nombre;
        private $rol;
        private $gender;
        private $conexion;


        public function __construct() {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->get_conexion();
        }

        function seguridad_datos($data) {
            $data = trim($data);
            $data = stripslashes($data);
            return htmlspecialchars($data);
        }

        function hash_contrasenia($contrasenia){
            return password_hash($contrasenia, PASSWORD_DEFAULT);
        }

        function check_usuario($usuario_nombre) {
            $usuario_nombre = $this->seguridad_datos($usuario_nombre);
            $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario LIMIT 1");
            $stmt->bindValue(":nombre_usuario", $usuario_nombre, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Asegúrate de obtener un array asociativo

            // Verificar si se encontró el usuario
            if (isset($result["nombre_usuario"])) { // Cambiado a "nombre_usuario"
                return true;
            }

            return false;
        }


        function obtener_contra_porusuario($usuario_nombre) {
            $usuario_nombre = $this->seguridad_datos($usuario_nombre);
            $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario_nombre LIMIT 1");
            $stmt->bindValue(":usuario_nombre", $usuario_nombre, PDO::PARAM_STR); // Cambiado a :usuario_nombre
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Asegúrate de usar PDO::FETCH_ASSOC para obtener un array asociativo

            return $result['contrasenia']; // Añadido un valor por defecto para evitar errores si no hay resultados
        }


        function auth_usuario($usuario_nombre, $contrasenia) {
            $usuario_nombre = $this->seguridad_datos($usuario_nombre);
            $contrasenia = $this->seguridad_datos($contrasenia);


            if($this->check_usuario($usuario_nombre)) {
                $pass_in_bd = $this->obtener_contra_porusuario($usuario_nombre);
                $resultado_auth = password_verify($contrasenia, $pass_in_bd);
                return $resultado_auth;
            }
            return false;
        }

        function crear_usuario($contrasenia, $nombre_usuario, $nombre, $email, $rol, $gender) {
            // Sanitizar datos
            $usuario_nombre = $this->seguridad_datos($nombre_usuario);
            $contrasenia = $this->hash_contrasenia($this->seguridad_datos($contrasenia)); // Hash de la contraseña
            $nombre = $this->seguridad_datos($nombre);
            $email = $this->seguridad_datos($email);
            $rol = $this->seguridad_datos($rol);
            $gender = $this->seguridad_datos($gender);

            // Preparar la consulta INSERT
            $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre_usuario, contrasenia, nombre, email, rol, gender) 
                                      VALUES (:nombre_usuario, :contrasenia, :nombre, :email, :rol, :gender)");

            // Enlazar los valores
            $stmt->bindValue(":nombre_usuario", $usuario_nombre, PDO::PARAM_STR);
            $stmt->bindValue(":contrasenia", $contrasenia, PDO::PARAM_STR);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":rol", $rol, PDO::PARAM_STR);
            $stmt->bindValue(":gender", $gender, PDO::PARAM_STR);

            // Ejecutar la consulta
            return $stmt->execute();
        }




    }

?>