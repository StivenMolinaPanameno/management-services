<?php
    require '../../Controladores/Clientes/ClientesController.php';
    $id = $_GET['id'];

    $clientes_controller = new ClientesController();
    $departamentos = $clientes_controller->cargar_departamentos();
    $municipios = $clientes_controller->cargar_municipios();
    $cliente = $clientes_controller->cargar_cliente_modificar($id);

    if (isset($_POST["btn-modificar-cliente"])) {

        $resultado_actualizacion = $clientes_controller->actualizar_cliente($id, $cliente['tipo_cliente']);
        if($resultado_actualizacion['success'] == true){
            header("Location: ../../Vistas/Clientes/Clientes.php");
        }else{
            $usuario_result='<p class="text-center alert alert-danger alert-dismissible fade show"> Revise que el correo y/o número de telefono sean unicos y no esten registrados ya, y que los campos no esten vacios </p>';
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
        <title>Modificar Cliente</title>
    </head>
    <body class="secundary">
    <section class="container-page position-relative w-100 h-100 ">
        <?php  include "../Componentes/HeaderLogo.php" ?>
        <?php  include "../Componentes/SideBar.php" ?>
        <main>

                <form name="formulario-modificar" class="d-flex justify-content-center ml-5" id="formulario-modificar" method="POST">
                    <div class="form-clientes-atributos d-flex flex-column align-items-start gap-4 my-5">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <div class="label-clientes">
                                    <label  for="nombre-cliente">Nombres:</label>
                                </div>
                                <input value="<?= $cliente['nombres'] ?>" name="nombres" required type="text" id="nombre-cliente" class="cliente-input-form"></div>
                            <div class="col d-flex justify-content-start">
                                <div class="label-clientes">
                                    <label for="apellido-cliente">Apellidos:</label>
                                </div>
                                <input value="<?= $cliente['apellidos'] ?>" name="apellidos" type="text" id="apellido-cliente" class="cliente-input-form"></div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <div class="label-clientes-direction">
                                    <label for="direccion">Direccion:</label>
                                </div>
                                <input value="<?= $cliente['direccion'] ?>" name="direccion" required type="text" id="direccion" class="cliente-input-form-direction"></div>
                        </div>

                        <div class="row text-end">
                            <div class="col  d-flex justify-content-start">
                                <div class="label-clientes">
                                    <label  for="departamento-cliente">Departamento:</label>
                                </div>

                                <select  id="departamento-cliente" name="departamento" class="cliente-input-form">
                                    <option selected value="<?= $cliente['departamento_id'] ?>">
                                        <?= htmlspecialchars($cliente['nombre_departamento']); ?>
                                    </option>
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
                                    <option selected value="<?= $cliente['municipio'] ?>">
                                        <?= htmlspecialchars($cliente['nombre_municipio']); ?>
                                    </option>
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
                                <input value="<?= $cliente['telefono'] ?>" name="telefono" required type="number" id="telefono-cliente" class="cliente-input-form"></div>
                            <div class="col d-flex justify-content-start">
                                <div class="label-clientes">
                                    <label for="correo-cliente">Correo:</label>
                                </div>
                                <input value="<?= $cliente['correo'] ?>" name="correo" required type="email" id="correo-cliente" class="cliente-input-form"></div>
                        </div>
                    </div>
                </form>
            <?php
                if(isset($usuario_result)){
                    echo $usuario_result;
                }
            ?>

                <div class="btn-modificar mx-auto d-flex justify-content-center">
                    <button name="btn-modificar-cliente" type="submit" class="px-5 py-2 my-3 btn rounded btn-info text-white" form="formulario-modificar">Modificar</button>
                </div>
        </main>
    </section>

    </body>
</html>

