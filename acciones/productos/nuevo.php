<?php

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';

header('Content-Type: application/json');

$resp = new NuevoResponse();
$resp->IsOk = true;

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$pr = new producto();
$pr->Marca = $req->Marca;
$pr->Descripcion = $req->Descripcion;
$pr->Codigo = $req->Codigo;
$pr->Agregar();


echo json_encode($resp);
