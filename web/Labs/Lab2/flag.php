<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    echo "Acceso denegado. No eres administrador.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Admin</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            color: #333;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        h1, h2 {
            margin-bottom: 20px;
        }
        a {
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
    <h1>Panel de Administración</h1>
    <h2>¡Felicidades!</h2>
    <p>Flag capturada:</p>
    <h2>flag{XSS_4cc0ut_t4k0v3r}</h2>
    <p><a href="logout.php">Cerrar sesión</a></p>
</div>

</body>
</html>
