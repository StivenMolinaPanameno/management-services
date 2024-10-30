<?php
    require '../../Modelos/UsuarioModel.php';
    class IniciarSesionController {
        private $usuario;

        public function __construct() {
            $this->usuario = new UsuarioModel();
        }

        public function auth_usuario () {


                $nombre_usuario = $_POST['username'];
                $contrasenia = $_POST['password'];

                $autenticado = $this->usuario->auth_usuario($nombre_usuario, $contrasenia);


                if($autenticado) {
                    $_SESSION['usuario'] = $nombre_usuario;
                    $_SESSION['fecha_autenticacion'] = time();
                    header('Location: ../../Vistas/Principal/Principal.php');
                }



        }

    }
$Tipo= $_REQUEST['Tipo'];
    $IniciarSesionController = new IniciarSesionController();
if ($Tipo == 'autenticar')
    $IniciarSesionController->auth_usuario();



?>