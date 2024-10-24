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

            <section class=" bg-white mx-5 mt-5">
                <search class="filtro  py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                    <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                    <input type="text" name="input-clientes" class="pl-3" id="input-clientes"  >


                    <button  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>

            </section>
            <table class="mx-5 py-2 d-flex flex-column table-historico-pagos">
                <thead>
                <tr class="d-flex justify-content-between mx-5 ">
                    <?php $headers = ['Pago', 'Fecha', 'Valor', 'Descripción', 'Tipo', 'No. Comprobante'];
                    foreach ($headers as $header){
                        echo '<th class="pt-3 ">'. $header . '</th>';
                    } ?>
                </tr>
                </thead>
            </table>
        <figure class="imagen-pantalla-informes">
            <img src="../Img/RegistrarPagos.svg" alt="Imagen de pantalla sobre informes">
        </figure>
    </main>
</section>
</body>
</html>