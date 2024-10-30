<?php
    require '../../Controladores/Clientes/ClientesController.php';


    $clientes_controller = new ClientesController();


    $clientes = $clientes_controller->obtener_clientes();
    $departamentos = $clientes_controller->cargar_departamentos();
    $municipios = $clientes_controller->cargar_municipios();

    if (isset($_POST['btn-buscar-cliente'])) {
        $id = $_POST['codigo_cliente'];
        $clientes = $clientes_controller->cargar_cliente_id($id);
    }

    if (isset($_POST["btn-nuevo-cliente"])) {
        $resultado_registro = $clientes_controller->insertar_cliente();

        if ($resultado_registro['success'] == true) {
            header("Location: Clientes.php");
        }
    }

    if(!empty($_GET['id'])) {
        $eliminar_registro = $clientes_controller->eliminar_cliente($_GET['id']);

        if($eliminar_registro['success'] == true) {
            header("Location: Clientes.php");
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
    <title>Clientes</title>
</head>
<body  class="secundary">
<section class="container-page position-relative w-100 h-100 ">
    <?php  include "../Componentes/HeaderLogo.php" ?>
    <?php  include "../Componentes/SideBar.php" ?>
    <main class="overflow-hidden">
        <section class="d-flex justify-content-between align-items-center bg-white mx-5">
            <form method="POST" class="filtro py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                <input type="text" name="codigo_cliente" class="pl-3" id="input-clientes"  >


                <button name="btn-buscar-cliente" class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>
            </form>
            <button class="btn-nuevo-cliente" type="submit" name="btn-nuevo-cliente" form="formulario-clientes">Nuevo Cliente</button>
        </section>
       <div class="crud-clientes">
           <table class="table-clients ">


               <tr class="d-flex justify-content-between mx-5">
                   <?php
                   $headers = ['Cod. Cliente', 'Nombre', 'Direccion', 'Telefono', 'Correo', 'Opciones'];
                   foreach ($headers as $header) {
                       echo '<th class="text-start w-25 pt-4">'. $header . '</th>';
                   }
                   ?>
               </tr>



               <?php if (!empty($clientes)): ?>
                   <?php foreach ($clientes as $cliente): ?>
                       <tr class="d-flex justify-content-between mx-5 align-items-end">
                           <td class="text-start w-25"><?= htmlspecialchars($cliente['cliente_id']); ?></td>
                           <td class="text-start w-25"><?= htmlspecialchars($cliente['nombres']); ?></td>
                           <td class="text-start w-25"><?= htmlspecialchars($cliente['direccion']); ?></td>
                           <td class="text-start w-25 text-truncate"><?= htmlspecialchars($cliente['telefono']); ?></td>
                           <td class="text-start w-25 text-wrap"><?= htmlspecialchars($cliente['correo']); ?></td>
                           <td class="text-center w-25">
                               <a href="ModificarClientes.php?id=<?= $cliente['cliente_id'] ?>" class="btn btn-info">Editar</a>
                               <a href="?id=<?= $cliente['cliente_id'] ?>" class="btn btn-danger">Eliminar</a>
                           </td>
                       </tr>
                   <?php endforeach; ?>
               <?php else: ?>
                   <tr>
                       <td colspan="6" class="text-center">No hay resultados.</td>
                   </tr>
               <?php endif; ?>

           </table>
       </div>


        <section class="formulario-clientes">
            <form class="mx-5" id="formulario-clientes" method="POST">
                <div class="form-clientes-atributos d-flex flex-column align-items-start gap-4 w-75 my-5">
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label  for="nombre-cliente">Nombres:</label>
                            </div>
                            <input name="nombres" required type="text" id="nombre-cliente" class="cliente-input-form"></div>
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="apellido-cliente">Apellidos:</label>
                            </div>
                            <input name="apellidos" type="text" id="apellido-cliente" class="cliente-input-form"></div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes-direction">
                                <label for="direccion">Direccion:</label>
                            </div>
                            <input name="direccion" required type="text" id="direccion" class="cliente-input-form-direction"></div>
                    </div>

                    <div class="row">
                        <div class="col  d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="departamento-cliente">Departamento:</label>
                            </div>

                                <select  id="departamento-cliente" name="departamento" class="cliente-input-form">

                                    <?php if (!empty($departamentos)): ?>
                                        <?php foreach ($departamentos as $departamento): ?>
                                            <option value="<?= htmlspecialchars($departamento['departamento_id']); ?>" class="text-start w-25">
                                                <?= htmlspecialchars($departamento['nombre_departamento']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No hay resultados</option>
                                    <?php endif; ?>
                                </select>
                        </div>
                        <div class="col  d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="municipio-cliente">Municipio:</label>
                            </div>
                            <select name="municipio"  id="municipio-cliente" class="cliente-input-form">

                                <?php if (!empty($municipios)): ?>
                                    <?php foreach ($municipios as $municipio): ?>
                                        <option value="<?= htmlspecialchars($municipio['municipio_id']); ?>" class="text-start w-25">
                                            <?= htmlspecialchars($municipio['nombre_municipio']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">No hay resultados</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="telefono-cliente">Telefono:</label>
                            </div>
                            <input name="telefono" required type="number" id="telefono-cliente" class="cliente-input-form"></div>
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="correo-cliente">Correo:</label>
                            </div>
                            <input name="correo" required type="email" id="correo-cliente" class="cliente-input-form"></div>
                    </div>


                </div>
            </form>
        </section>


    </main>
</section>


</body>
</html>