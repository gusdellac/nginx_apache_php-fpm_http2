<?php
// index.php

// Configuración básica
$title = "PHP y HTML Integrados";
$mensaje = "¡Hola, mundo! Esto es PHP funcionando.";

// Puedes usar PHP para procesar lógica antes de mostrar el HTML
$hora = date("H:i:s");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            text-align: center;
            padding: 50px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            display: inline-block;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1><?php echo $mensaje; ?></h1>
        <p>La hora actual es: <strong><?php echo $hora; ?></strong></p>
    </div>
</body>
</html>
