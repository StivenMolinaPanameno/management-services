<?php
require '../../Controladores/Clientes/ClientesController.php';

$informeClientes = new ClientesController();
$informes = $informeClientes->cargar_clientes_informes();
if(isset($_POST['btn-seleccionar-informe'])) {
    if($_POST['cbx-clientes'] == '1') {
        $informes = $informeClientes->cargar_clientes_morosos();
    }
    if($_POST['cbx-clientes'] == '2') {
        $informes = $informeClientes->clientes_credito();

    }
    if($_POST['cbx-clientes'] == '3') {
        $informes = $informeClientes->clientes_contado();
    }
    if($_POST['cbx-clientes'] == '0') {
        $informes = $informeClientes->cargar_clientes_informes();
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
        <title>Informes</title>
    </head>
    <body  class="secundary">
        <section class="container-page position-relative w-100 h-100 ">
            <?php  include "../Componentes/HeaderLogo.php" ?>
            <?php  include "../Componentes/SideBar.php" ?>
            <main>
                <form method="POST" class="filtro mx-5 py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                    <label for="cbx-clientes" class="pl-3 fw-bold">Filtro:</label>
                    <select name="cbx-clientes" class="pl-3" id="cbx-clientes">
                        <option value="0" selected>Seleccione una opcion</option>
                        <option value="1">Clientes Morosos</option>
                        <option value="2">Clientes que pagan al credito</option>
                        <option value="3">Clientes que pagan al contado</option>
                    </select>
                    <button type="submit" name="btn-seleccionar-informe" class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white">Buscar</button>
                </form>
                <div class="informe-clientes-table">
                    <table class=" table-clients">

                        <tr class="d-flex justify-content-between mx-5">
                            <?php $headers = ['Cliente', 'Tipo de Cliente', 'Cuotas Pendientes', 'Ultima Fecha de Pago', 'Monto Pendiente'];
                            foreach ($headers as $header){
                                echo '<th class="text-start w-25 pt-4">'. $header . '</th>';
                            } ?>
                        </tr>
                        <?php if(!empty($informes)): ?>
                            <?php foreach ($informes as $informe): ?>
                                <tr class="d-flex justify-content-between mx-5 align-items-end">
                                    <td  class="text-start w-25"><?= htmlspecialchars($informe['nombres']); ?></td>
                                    <td  class="text-start w-25"><?= htmlspecialchars($informe['nombre_tipo_cliente']); ?></td>

                                    <td  class="text-start w-25"><?= htmlspecialchars($informe['cuotas_pendientes']); ?></td>
                                    <td  class="text-start w-25"><?= htmlspecialchars($informe['ultima_fecha_pago']); ?></td>
                                    <td  class="text-start w-25"><?= htmlspecialchars($informe['monto_pendiente']); ?></td>

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
                    <img src="../Img/Informes.svg" alt="Imagen de pantalla sobre informes">
                </figure>

            </main>
        </section>


    </body>
</html>