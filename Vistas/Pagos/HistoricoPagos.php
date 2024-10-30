<?php
    require '../../Controladores/Pagos/PagosController.php';

    $pagos_controller = new PagosController();
    $pagos = $pagos_controller->cargar_historico_pagos();
    if(isset($_POST['btn-buscar-historico'])) {
        $id = $_POST['id'];
        $pagos = $pagos_controller->cargar_historico_pagos_cliente($id);
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

            <section class="filtro bg-white mt-5">
                <form method="POST" class="  py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                    <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                    <input type="text" name="id" class="pl-3" id="input-clientes"  >


                    <button name="btn-buscar-historico" class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>
                </form>
            </section>
           <div class="historico-clientes-table">

               <table class=" table-historico-pagos">

                   <tr class="d-flex justify-content-between mx-5 ">
                       <?php $headers = ['Cliente', 'Fecha', 'Valor', 'Descripción', 'Tipo', 'No. Comprobante'];
                       foreach ($headers as $header){
                           echo '<th class="pt-4 text-start w-25">'. $header . '</th>';
                       } ?>
                   </tr>

                   <?php if (!empty($pagos)): ?>
                       <?php foreach ($pagos as $pago): ?>
                           <tr class="d-flex justify-content-between mx-5">
                               <td class="text-start  w-25"><?= htmlspecialchars($pago['cliente']); ?></td>
                               <td class="text-start  w-25"><?= htmlspecialchars($pago['fecha_pago']); ?></td>
                               <td class="text-start  w-25"><?= htmlspecialchars($pago['monto_pagado']); ?></td>
                               <td class="text-start  w-25"><?= htmlspecialchars($pago['descripcion']); ?></td>
                               <td class="text-start w-25"><?= htmlspecialchars($pago['nombre_tipo_pago']); ?></td>

                               <td class="text-start  w-25"><?= htmlspecialchars($pago['pago_id']); ?></td>

                           </tr>
                       <?php endforeach; ?>
                   <?php else: ?>
                       <tr>
                           <td colspan="6" class="text-center">No hay resultados.</td>
                       </tr>
                   <?php endif; ?>


               </table>
           </div>
        <figure class="imagen-pantalla-informes">
            <img src="../Img/RegistrarPagos.svg" alt="Imagen de pantalla sobre informes">
        </figure>
    </main>
</section>
</body>
</html>