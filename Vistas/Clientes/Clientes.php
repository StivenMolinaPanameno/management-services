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
    <main>
        <section class="d-flex justify-content-between align-items-center bg-white mx-5">
            <search class="filtro  py-3 d-flex justify-content-start gap-4 align-items-center bg-white">
                <label for="input-clientes" class="pl-3 fw-bold">Cod. Cliente:</label>
                <input type="text" name="input-clientes" class="pl-3" id="input-clientes"  >


                <button  class="border-0 btn-search-clients rounded-pill px-4 py-2 text-white ">Buscar</button>
            </search>
            <button class="btn-nuevo-cliente">Nuevo Cliente</button>
        </section>
        <table class="mx-5 py-2 d-flex flex-column table-clients">
            <thead>
            <tr class="d-flex justify-content-between mx-5 ">
                <?php $headers = ['Cod. Cliente', 'Nombre', 'Direccion', 'Telefono', 'Estatus', 'Opciones'];
                foreach ($headers as $header){
                    echo '<th class="pt-3 ">'. $header . '</th>';
                } ?>
            </tr>
            </thead>
        </table>

        <section class="formulario-clientes">
            <form class="mx-5">
                <div class="form-clientes-atributos d-flex flex-column align-items-start gap-4 w-75 my-5">
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="nombre-cliente">Nombres:</label>
                            </div>
                            <input type="text" id="nombre-cliente" class="cliente-input-form"></div>
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="apellido-cliente">Apellidos:</label>
                            </div>
                            <input type="text" id="apellido-cliente" class="cliente-input-form"></div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes-direction">
                                <label for="direccion">Direccion:</label>
                            </div>
                            <input type="text" id="direccion" class="cliente-input-form-direction"></div>
                    </div>

                    <div class="row">
                        <div class="col  d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="departamento-cliente">Departamento:</label>
                            </div>
                            <input type="text" id="departamento-cliente" class="cliente-input-form"></div>
                        <div class="col  d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="municipio-cliente">Municipio:</label>
                            </div>
                            <input type="text" id="municipio-cliente" class="cliente-input-form"></div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="telefono-cliente">Telefono:</label>
                            </div>
                            <input type="text" id="telefono-cliente" class="cliente-input-form"></div>
                        <div class="col d-flex justify-content-start">
                            <div class="label-clientes">
                                <label for="correo-cliente">Correo:</label>
                            </div>
                            <input type="text" id="correo-cliente" class="cliente-input-form"></div>
                    </div>


                </div>
            </form>
        </section>


    </main>
</section>


</body>
</html>