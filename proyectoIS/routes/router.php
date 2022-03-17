<?php
$rutas = [
    '/' => ['Página principal', '../index2.php'],
    'tienda' => ['Tienda', '../tienda.php'],
    'plantilla' => ['Plantilla', '../plantilla.php'],
];

$request = $_SERVER['REQUEST_URI'];
if($request[0] != '/') {
    $request = '/' . $request;
}
$partes = explode('?', $request);
$request = $partes[0];

// Verificar si hay página o no
if(isset($rutas[$request])) {
    // Incluir el PHP adecuado
    include __DIR__ . '/' . $rutas[$request][1];
} else {
    // La página no existe
    http_response_code(404);
    include __DIR__ . '/sp_error_404.php';
}
?>