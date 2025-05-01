<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = $_POST['mensaje'];

    // Guardamos el mensaje tal cual, sin sanitizar, para permitir XSS
    file_put_contents('mensajes.txt', $mensaje . "\n", FILE_APPEND);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicar Mensaje</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: white;
            color: #333;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #2575fc;
            font-weight: bold;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Redirigiendo...</h2>
    <p>Si no eres redirigido automáticamente, haz clic aquí:</p>
    <a href="index.php">Volver a inicio</a>
</div>

</body>
</html>
