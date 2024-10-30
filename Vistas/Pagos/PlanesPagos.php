<?php
    include '../../Controladores/Pagos/PagosController.php';
    $pagos_controller = new PagosController();

    if(isset($_POST['btn-consultar-plan'])) {
        $id = $_POST['id'];
        $detalles = $pagos_controller->obtener_detalles_pago($id);
        $pagos = $pagos_controller->cargar_detalles_plan_pago($id);
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

        <title>Planes de Pago</title>
    </head>
    <body class="secundary">
        <section  class="container-page position-relative w-100 h-100 ">
            <?php  include "../Componentes/HeaderLogo.php" ?>
            <?php  include "../Componentes/SideBar.php" ?>
            <main>
                <?php include '../Componentes/HeaderPagos.php'; ?>
                <section class="bg-white mx-5 mt-5 filtro">
                    <form method="POST" class="py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                        <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                        <input type="text" name="id" class="pl-3" id="input-clientes"  >


                        <button name="btn-consultar-plan"  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>
                    </form>
                    <div class="resultado_header d-flex mx-5 pb-4 gap-5 w-100">
                        <div class="resultado_busqueda">
                            <p>Monto Total:</p>
                            <div class="response_search text-center"><?= isset($detalles['monto_total']) ?  $detalles['monto_total'] : '' ?></div>

                        </div>
                        <div class="resultado_busqueda ">
                            <p>N° Cuotas:</p>
                            <div class="response_search cuotas text-center"><?= isset($detalles['numero_cuotas']) ? $detalles['numero_cuotas'] : '' ?></div>
                        </div>
                        <div class=" resultado_busqueda ">
                            <p>% Interés:</p>
                            <div class="response_search interes text-center"><?= isset($detalles['interes']) ? $detalles['interes'] : '' ?></div>
                        </div>
                        <div class="resultado_busqueda">
                            <p>Tipo de pago:</p>
                            <div class="response_search text-center"><?= isset($detalles['nombre_tipo_pago']) ? $detalles['nombre_tipo_pago'] : '' ?></div>
                        </div>
                    </div>
                </section>
                <div class="planes-clientes-table">
                    <table class="table-historico-pagos">

                        <tr class="d-flex justify-content-between mx-5 ">
                            <?php $headers = ['Cuota', 'Fecha', 'Valor', 'Saldo Anterior', 'Nuevo Saldo', 'Monto Total'];
                            foreach ($headers as $header){
                                echo '<th class="pt-4 text-start w-25">'. $header . '</th>';
                            } ?>
                        </tr>

                        <?php if (!empty($pagos)): ?>
                            <?php foreach ($pagos as $pago): ?>
                                <tr class="d-flex justify-content-between mx-5 align-items-end">
                                    <td class="text-start w-25"><?= htmlspecialchars($pago['cuota_id']); ?></td>
                                    <td class="text-start w-25"><?= htmlspecialchars($pago['fecha_pago']); ?></td>
                                    <td class="text-start w-25"><?= htmlspecialchars($pago['monto_pagado']); ?></td>
                                    <td class="text-start w-25"><?= htmlspecialchars($pago['saldo_anterior']); ?></td>
                                    <td class="text-start w-25"><?= htmlspecialchars($pago['nuevo_saldo']); ?></td>

                                    <td class="text-start w-25"><?= htmlspecialchars($detalles['monto_total']); ?></td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No hay resultados.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>


            </main>
        </section>

    </body>
</html>