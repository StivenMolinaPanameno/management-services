<!--
<!DOCTYPE html>
<html lang="es">
    <head>
        <Title>Login</Title>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Maneja y Gestiona tus servicios de la mejor manera con nuestro sistema para organizar de mejor manera tus pagos y responsabilidades con cualquier entidad">
        <link rel="stylesheet" href="../Estilos/InicioSesionEstilos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <main class="w-100 h-100">
           <section class=" d-flex justify-content-center align-items-center w-100 h-100">

               <form action="../../Controladores/Usuarios/IniciarSesionController.php?Tipo=autenticar" method="POST" class=" text-black d-flex flex-column justify-content-start ">
                   <p class="text-center inicio-sesion  pt-4 mt-5">Inicio de Sesión</p>
                   <label class="mx-5 pt-5 " for="username">Usuario</label>
                   <input class="mx-5 " name="username" id="username" type="text">
                   <label class="mx-5 pt-4" for="password">Contraseña</label>
                   <input class="mx-5" type="password" name="password" id="password">
                   <div class="btn-login">
                       <button class="mx-5 mt-5 text-white py-2  rounded-pill">Iniciar Sesión</button>
                   </div>
               </form>
           </section>
        </main>
    </body>
</html>
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Estilos/InicioSesion.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="principal">
    <div class="container-page d-flex">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <div class="sidebar-content">
                <img src="../Iconos/ConsultaPagos.svg" alt="Icono de Sesion">
                <p class="ingersa_tu_usuario">Inicio de Sesión</p>
            </div>
        </aside>

        <div class="w-100 d-flex flex-column">
            <?php include '../Componentes/HeaderLogo.php' ?>
            <!-- Sección de login -->
            <main class="login-section d-flex flex-column align-items-center justify-content-center w-100 h-100">
                <h1 class="text-center bienvenido">BIENVENIDO.</h1>
                <p class="text-center py-4">Ingresa tu usuario y contraseña:</p>

                <div class="login-container ">
                    <form action="../../Controladores/Usuarios/IniciarSesionController.php?Tipo=autenticar" method="POST">
                        <label for="username">Usuario</label>
                        <input type="text" name="username" id="username" required>

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>

                        <button class="rounded-pill" type="submit">LOGIN</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>