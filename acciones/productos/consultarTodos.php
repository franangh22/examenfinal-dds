<?php

require_once 'responses/consultarTodosResponse.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';

header('Content-Type: application/json');

$resp = new  ConsultarTodosResponse();

$resp->ListProductos = Producto::BuscarTodas();

$cant_productos = 0;
foreach ($resp->ListProductos as $lp) {
    $cant_productos = $cant_productos + 1;
}

$resp->CantidadProductos = $cant_productos;

echo json_encode($resp);
