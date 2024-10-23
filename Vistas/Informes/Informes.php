<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Maneja y Gestiona tus servicios de la mejor manera con nuestro sistema para organizar de mejor manera tus pagos y responsabilidades con cualquier entidad">
        <link rel="stylesheet" href="../Estilos/Estilos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <title>Informes</title>
    </head>
    <body  class="secundary">
        <section class="container-page position-relative w-100 h-100 ">
            <?php  include "../Componentes/HeaderLogo.php" ?>
            <?php  include "../Componentes/SideBar.php" ?>
            <main>
                <search class="filtro mx-5 py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                    <label for="cbx-clientes" class="pl-3 fw-bold">Filtro:</label>
                    <select name="cbx-clientes" class="pl-3" id="cbx-clientes">
                        <option value="" selected>Seleccione una opcion</option>
                        <option value="">Clientes Morosos</option>
                        <option value="">Clientes que pagan al credito</option>
                        <option value="">Clientes que pagan al contado</option>
                    </select>
                    <button  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white">Buscar</button>
                </search>
                <table class="mx-5 py-2 d-flex flex-column justify-content-end  table-clients">
                    <tr class="d-flex justify-content-between mx-5 ">
                        <?php $headers = ['Cliente', 'Tipo de Cliente', 'Estatus', 'Cuotas Pendientes', 'Ultima Fecha de Pago', 'Monto Pendiente'];
                        foreach ($headers as $header){
                            echo '<th class="pt-3 ">'. $header . '</th>';
                        } ?>
                    </tr>

                </table>

            </main>
        </section>


    </body>
</html>