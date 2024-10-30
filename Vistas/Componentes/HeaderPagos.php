<?php

// Obtener la ruta completa del archivo, incluidas las variables GET
$requestUri = $_SERVER['REQUEST_URI'];

$basename = basename($requestUri);
//Iconos desactivados
$img_registrar_pagos = '../Iconos/RegistrarPagosDesactivado.svg';
$img_historico_pagos = '../Iconos/HistoricoPagosDesactivado.svg';
$img_planes_pagos= '../Iconos/PlanesPagosDesactivado.svg';

$activado_historico_pagos = '';
$activado_planes_pagos = '';
$activado_registar_pagos = '';

if ($basename == 'HistoricoPagos.php') {
    $img_historico_pagos = '../Iconos/HistoricoPagosActivado.svg';
    $activado_historico_pagos = 'activado-historico-pagos';
    $activado_planes_pagos = '';
    $activado_registar_pagos = '';
}

if ($basename == 'PlanesPagos.php'){
    $img_planes_pagos = '../Iconos/PlanesPagosActivado.svg';
    $activado_planes_pagos = 'activado-planes-pagos';
    $activado_registar_pagos = '';
    $activado_historico_pagos = '';
}


if ($basename == 'RegistrarPagos.php') {
    $img_registrar_pagos= '../Iconos/RegistrarPagosActivado.svg';
    $activado_registar_pagos = 'activado-registrar-pagos';
    $activado_historico_pagos = '';
    $activado_planes_pagos = '';
}

echo "
        <header class='d-flex justify-content-between align-items-center header-pagos'>
               <a href='../Pagos/RegistrarPagos.php' style='text-decoration: none' class='registrar__pagos $activado_registar_pagos d-flex justify-content-center align-items-center'>
              
                    <img  src='$img_registrar_pagos' alt=''>
                    <p>Registrar Pagos</p>
                </a>
                 <a href='../Pagos/PlanesPagos.php' style='text-decoration: none'' class='planes__pagos $activado_planes_pagos d-flex justify-content-center align-items-center'>
              
                    <img  src='$img_planes_pagos' alt=''>
                    <p>Planes de Pago</p>
                </a>
                 <a href='../Pagos/HistoricoPagos.php' style='text-decoration: none' class='historico__pagos $activado_historico_pagos d-flex justify-content-center align-items-center'>
              
                    <img  src='$img_historico_pagos' alt=''>
                    <p>Historico de Pagos</p>
                </a>
                   
        </header>
    
    "
?>