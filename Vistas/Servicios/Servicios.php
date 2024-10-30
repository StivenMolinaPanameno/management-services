<?php
    require_once "../../Controladores/Servicios/ServiciosController.php";
    $servicios_controller = new ServiciosController();
    $servicios = $servicios_controller->cargar_servicios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Maneja y Gestiona tus servicios de la mejor manera con nuestro sistema para organizar de mejor manera tus pagos y responsabilidades con cualquier entidad">
    <link rel="stylesheet" href="../Estilos/Estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>Servicios</title>
</head>
<body class="secundary">
<section class="relative position-relative container-page w-100 h-100">
    <?php include '../Componentes/HeaderLogo.php'; ?>
    <?php include '../Componentes/SideBar.php' ?>

    <main>
        <search class="filtro mx-5 py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
            <label for="cbx-servicios" class="pl-3 fw-bold">Filtro:</label>
            <select name="cbx-servicios" class="pl-3" id="cbx-servicios">
                <option value="" selected>Seleccione una opcion</option>
                <option value="">Opcion 1</option>
                <option value="">Opcion 2</option>
                <option value="">Opcion 3</option>
            </select>
            <button  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white">Buscar</button>
        </search>

            <table class=" table-servicios">

                <tr class="d-flex justify-content-between mx-5 ">
                    <?php $headers = ['Nombre Servicio', 'Tipo de Servicio', 'Cliente', 'Descripción', 'Precio', 'Estatus'];
                    foreach ($headers as $header){
                        echo '<th class="pt-3 text-start w-25">'. $header . '</th>';
                    } ?>
                </tr>


                <?php if (!empty($servicios)): ?>
                    <?php foreach ($servicios as $servicio): ?>
                        <tr class="d-flex justify-content-between mx-5 align-items-end">
                            <td class="text-start w-25"><?= htmlspecialchars($servicio['nombre_servicio']); ?></td>
                            <td class="text-start w-25"><?= htmlspecialchars($servicio['nombre_tipo_servicio']); ?></td>
                            <td class="text-start w-25"><?= htmlspecialchars($servicio['cliente']); ?></td>
                            <td class="text-start w-25"><?= htmlspecialchars($servicio['descripcion']); ?></td>
                            <td class="text-start w-25"><?= htmlspecialchars($servicio['precio']); ?></td>

                            <td class="text-start w-25"><?= htmlspecialchars($servicio['estatus_servicio']); ?></td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay resultados.</td>
                    </tr>
                <?php endif; ?>

            </table>


        <figure class="imagen-pantalla-informes">
            <img src="../Img/Servicios.svg" alt="Imagen de pantalla sobre informes">
        </figure>

    </main>

</section>
</body>

</html>