<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: PAGINA10.HTML');
    exit;
}

$datos = [
    'nombre' => trim($_POST['nombre'] ?? ''),
    'apellido' => trim($_POST['apellido'] ?? ''),
    'correo' => trim($_POST['correo'] ?? ''),
    'telefono' => trim($_POST['telefono'] ?? ''),
    'ciudad' => trim($_POST['ciudad'] ?? ''),
    'producto' => trim($_POST['producto'] ?? ''),
    'mensaje' => trim($_POST['mensaje'] ?? '')
];

foreach ($datos as $valor) {
    if ($valor === '') {
        die('Faltan datos obligatorios. <a href="PAGINA10.HTML">Volver</a>');
    }
}

$archivo = __DIR__ . '/registros.txt';
$registro = implode(' | ', $datos) . PHP_EOL;
file_put_contents($archivo, $registro, FILE_APPEND | LOCK_EX);

header('Location: datos.php');
exit;
