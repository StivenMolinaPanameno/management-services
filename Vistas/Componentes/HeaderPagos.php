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
}

if ($basename == 'PlanesPagos.php'){
    $img_planes_pagos = '../Iconos/PlanesPagosActivado.svg';
    $activado_planes_pagos = 'activado-planes-pagos';
}


if ($basename == 'RegistrarPagos.php') {
    $img_registrar_pagos= '../Iconos/RegistrarPagosActivado.svg';
    $activado_registar_pagos = 'activado-registrar-pagos';
}

echo "
        <header class='d-flex justify-content-between align-items-center header-pagos'>
               <div class='registrar__pagos $activado_registar_pagos d-flex justify-content-center align-items-center'>
              
                    <img  src='$img_registrar_pagos' alt=''>
                    <p>Registrar Pagos</p>
                </div>
                 <div class='planes__pagos $activado_planes_pagos d-flex justify-content-center align-items-center'>
              
                    <img  src='$img_planes_pagos' alt=''>
                    <p>Planes de Pago</p>
                </div>
                 <div class='historico__pagos $activado_historico_pagos d-flex justify-content-center align-items-center'>
              
                    <img  src='$img_historico_pagos' alt=''>
                    <p>Historico de Pagos</p>
                </div>
                   
        </header>
    
    "
?>