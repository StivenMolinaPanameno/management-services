<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Maneja y Gestiona tus servicios de la mejor manera con nuestro sistema para organizar de mejor manera tus pagos y responsabilidades con cualquier entidad">
    <link rel="stylesheet" href="../Estilos/Estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>Gestión y Manejo de Servicios</title>
</head>
<body class="principal">
   <section class="relative position-relative container-page w-100 h-100">
       <?php include '../Componentes/HeaderLogo.php'; ?>
       <?php include '../Componentes/SideBar.php' ?>

       <main>
          <section class="header">
              <h1 class="px-5 header__bienvenido">Bienvenido.</h1>
              <h2 class="px-5 py-4 header__pregunta">¿Qué deseas hacer hoy?</h2>
          </section>
           <section class="items d-flex justify-content-evenly text-center ">
               <article>
                   <img src="../Iconos/ConsultaPagos.svg" alt="Icono sobre consultar tu información y cuotas por pagar">
                   <p>Consultar tu información y cuotas por pagar</p>
               </article>
               <article>
                   <img src="../Iconos/RegistrarPagos.svg" alt="Icono de Registrar Pagos">
                   <p>Registrar Pagos</p>
               </article>
               <article>
                   <img src="../Iconos/ConfigurarNotificaciones.svg" alt="Icono sobre configurar Notificaciones">
                   <p>Configurar Notificaciones</p>
               </article>
           </section>
           <article class="text-center">
               <img src="../Img/Principal.svg" alt="Imagen de pantalla principal">
           </article>
       </main>

   </section>
</body>

</html>
