<?php
$archivo = __DIR__ . '/registros.txt';
$registros = [];

if (file_exists($archivo)) {
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        $partes = explode(' | ', $linea);
        $registros[] = [
            'nombre' => $partes[0] ?? '',
            'apellido' => $partes[1] ?? '',
            'correo' => $partes[2] ?? '',
            'telefono' => $partes[3] ?? '',
            'ciudad' => $partes[4] ?? '',
            'producto' => $partes[5] ?? '',
            'mensaje' => $partes[6] ?? ''
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos registrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(180deg, #fff4f8 0%, #fbe7f0 100%);
            color: #5e2d40;
            font-family: Arial, sans-serif;
        }

        .container-box {
            max-width: 980px;
            margin: 50px auto;
            background: #fff;
            border: 1px solid #f4d1df;
            border-radius: 24px;
            box-shadow: 0 12px 28px rgba(200, 123, 159, 0.15);
            padding: 32px;
        }

        h1 {
            color: #7a2d4a;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .card-item {
            border: 1px solid #f0cad9;
            border-radius: 16px;
            background: #fff7fa;
            padding: 18px 20px;
            margin-bottom: 16px;
        }

        .label {
            font-weight: 700;
            color: #7a2d4a;
        }

        .btn-pink {
            background: linear-gradient(90deg, #f7b2cc, #ed7da7);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container-box">
        <h1 class="text-center">Datos registrados</h1>

        <?php if (empty($registros)): ?>
            <div class="alert alert-secondary">Todavía no hay registros guardados.</div>
        <?php else: ?>
            <?php foreach ($registros as $registro): ?>
                <div class="card-item">
                    <p><span class="label">Nombre:</span> <?= htmlspecialchars($registro['nombre']) ?></p>
                    <p><span class="label">Apellido:</span> <?= htmlspecialchars($registro['apellido']) ?></p>
                    <p><span class="label">Correo:</span> <?= htmlspecialchars($registro['correo']) ?></p>
                    <p><span class="label">Teléfono:</span> <?= htmlspecialchars($registro['telefono']) ?></p>
                    <p><span class="label">Ciudad:</span> <?= htmlspecialchars($registro['ciudad']) ?></p>
                    <p><span class="label">Producto:</span> <?= htmlspecialchars($registro['producto']) ?></p>
                    <p><span class="label">Mensaje:</span> <?= htmlspecialchars($registro['mensaje']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="text-center">
            <a href="PAGINA10.HTML" class="btn-pink">Nuevo registro</a>
        </div>
    </div>
</body>
</html>
