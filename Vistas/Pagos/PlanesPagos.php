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
                    <search class="py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                        <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                        <input type="text" name="input-clientes" class="pl-3" id="input-clientes"  >


                        <button  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>
                    </search>
                    <div class="resultado_header d-flex mx-5 pb-4 gap-5 w-100">
                        <div class="resultado_busqueda">
                            <p>Monto Total:</p>
                            <div class="response_search"></div>
                        </div>
                        <div class="resultado_busqueda ">
                            <p>N° Cuotas:</p>
                            <div class="response_search cuotas"></div>
                        </div>
                        <div class=" resultado_busqueda ">
                            <p>% Interés:</p>
                            <div class="response_search interes"></div>
                        </div>
                        <div class="resultado_busqueda">
                            <p>Tipo de pago:</p>
                            <div class="response_search"></div>
                        </div>
                    </div>
                </section>
                <div class="table-fixed">
                    <table class=" table-historico-pagos">

                        <tr class="d-flex justify-content-between mx-5 ">
                            <?php $headers = ['Cuota', 'Fecha', 'Valor', 'Saldo Anterior', 'Nuevo Saldo', 'Monto Total'];
                            foreach ($headers as $header){
                                echo '<th class="pt-4 text-start w-25">'. $header . '</th>';
                            } ?>
                        </tr>
                    </table>
                </div>


            </main>
        </section>

    </body>
</html>