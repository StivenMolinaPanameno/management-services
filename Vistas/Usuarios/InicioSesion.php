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
</head>
<body>
    <div class="container-page d-flex">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <div class="sidebar-content">
                <img src="../Iconos/ConsultaPagos.svg" alt="Icono de Sesion">
                <p>Inicio de Sesión</p>
            </div>
        </aside>

        <!-- Sección de login -->
        <main class="login-section d-flex flex-column align-items-center justify-content-center">
            <div class="login-container">
                <h1 class="text-center">BIENVENIDO.</h1>
                <p class="text-center">Ingresa tu usuario y contraseña:</p>
                
                <form action="../../Controladores/Usuarios/IniciarSesionController.php?Tipo=autenticar" method="POST">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username" required>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>

                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>