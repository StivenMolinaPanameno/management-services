<?php
require '../../Controladores/Pagos/PagosController.php';


$pagos_controller = new PagosController();

if (isset($_POST["btn-registrar-pagos"])) {
    $pago_registrado = $pagos_controller->registrar_pagos();
}

if (isset($_POST['btn-buscar-cliente'])) {
    $cod_cliente = $_POST['cod_cliente']; // Cambié a usar 'cod_cliente'
    $codigo_cliente = '';
    $cuota_a_pagar = '';
    $cuotas_pendientes = '';
    $tipo_pago = '';
    $servicio = '';
    // Verifica que cod_cliente no sea nulo
    if ($cod_cliente != null) {
        $cod_cliente = intval($cod_cliente);
        $pagos_cliente = $pagos_controller->buscar_cliente_registrar_pagos($cod_cliente);
        if ($pagos_cliente != null) {
            $codigo_cliente = isset($pagos_cliente['cliente_id']) ? $pagos_cliente['cliente_id'] : null;
            $cuota_a_pagar = isset($pagos_cliente['monto_cuota']) ? $pagos_cliente['monto_cuota'] : null;
            $cuotas_pendientes = isset($pagos_cliente['cuotas_pendientes']) ? $pagos_cliente['cuotas_pendientes'] : null;
            $tipo_pago = isset($pagos_cliente['nombre_tipo_pago']) ? $pagos_cliente['nombre_tipo_pago'] : null;
            $servicio = isset($pagos_cliente['nombre_servicio']) ? $pagos_cliente['nombre_servicio'] : '';
        }else {
            $usuario_result='<p class="text-center alert alert-danger alert-dismissible fade show">No se encontraron cuotas para este cliente</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Maneja y Gestiona tus servicios de la mejor manera con nuestro sistema para organizar de mejor manera tus pagos y responsabilidades con cualquier entidad">
        <link rel="stylesheet" href="../Estilos/Estilos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <title>Registro de Pagos</title>
    </head>
    <body class="secundary">
    <section class="relative position-relative container-page w-100 h-100">
        <?php include '../Componentes/HeaderLogo.php'; ?>
        <?php include '../Componentes/SideBar.php' ?>

        <main>
            <?php include '../Componentes/HeaderPagos.php'; ?>



            <section>
                <form method="POST"  class="filtro-registrar-pagos mt-5 py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                    <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                    <input type="number" name="cod_cliente" class="pl-3" id="input-clientes"  >


                    <button name="btn-buscar-cliente" type="submit"  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>
                </form>


                <form class="form-registrar-pagos" method="POST">
                    <div class="form-group-registrar-pagos pb-5">
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="cuota-a-pagar">Cuota a Pagar</label></div>
                            <input disabled type="text" id="cuota-a-pagar" name="cuota_a_pagar" value="<?= (isset($cuota_a_pagar)) ? $cuota_a_pagar : ''  ?>" required>
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="codigo-cliente">Cod. Cliente</label></div>
                            <input disabled type="number" id="codigo-cliente" name="codigo_cliente" value="<?= $codigo_cliente ?>" required>
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="fecha-de-pago">Fecha de Pago</label></div>
                            <input type="date" id="fecha-de-pago" name="fecha_de_pago" value="" required>
                        </div>
                        <div class="form__input">
                            <div class="label"> <label class="w-100" for="forma-de-pago">Forma de Pago</label></div>
                            <input disabled type="text" id="forma-de-pago" name="forma_de_pago" value="<?= isset($tipo_pago) ? $tipo_pago : '' ?>" required>
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="cuotas-pendientes">Cuotas Pendientes</label></div>
                            <input disabled type="number" id="cuotas-pendientes" name="cuotas_pendientes" value="<?= $cuotas_pendientes ?>" required>
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="tipo-de-servicio">Servicio</label></div>
                            <input disabled type="text" id="tipo-de-servicio" name="tipo_de_servicio" value="<?= isset($servicio) ? $servicio : '' ?>" required>
                        </div>
                    </div>
                    <div class="btn-registrar d-flex justify-content-center align-items-center">
                        <button type="submit"  name="btn-registrar-pagos" class="rounded btn-registrar-pagos">Registrar Pagos</button>
                    </div>
                </form>
            <?php
                if(isset($usuario_result)){
                    echo $usuario_result;
                }
            ?>

            </section>
           <figure class="imagen-pantalla-informes">
                <img src="../Img/RegistrarPagos.svg" alt="Imagen de pantalla sobre informes">
            </figure>
        </main>

    </section>
    </body>


</html>
