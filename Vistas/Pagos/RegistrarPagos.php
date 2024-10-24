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
                <form class="form-registrar-pagos">
                    <div class="form-group-registrar-pagos py-5">
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="cuota-a-pagar">Cuota a Pagar</label></div>
                            <input type="text" id="cuota-a-pagar">
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="codigo-cliente">Cod. Cliente</label></div>
                            <input type="text" id="codigo-cliente">
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="fecha-de-pago">Fecha de Pago</label></div>
                            <input type="text" id="fecha-de-pago">
                        </div>
                        <div class="form__input">
                            <div class="label"> <label class="w-100" for="forma-de-pago">Forma de Pago</label></div>
                            <input type="text" id="forma-de-pago">
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="cuotas-pendientes">Cuotas Pendientes</label></div>
                            <input type="text" id="cuotas-pendientes">
                        </div>
                        <div class="form__input">
                            <div class="label"><label class="w-100" for="tipo-de-servicio">Tipo de Servicio</label></div>
                            <input type="text" id="tipo-de-servicio">
                        </div>
                    </div>
                    <div class="btn-registrar d-flex justify-content-center align-items-center"><button class=" rounded btn-registrar-pagos">Registrar Pagos</button></div>
                </form>
            </section>
            <figure class="imagen-pantalla-informes">
                <img src="../Img/RegistrarPagos.svg" alt="Imagen de pantalla sobre informes">
            </figure>
        </main>

    </section>
    </body>
</html>
