<?php
require_once 'functions.php';

if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (checkLogin($username, $password)) {
        header('Location: home.php');
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoSec Cybersecurity - Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="login-container">
        <h1>WoSec Cybersecurity</h1>
        <div class="login-box">
            <form method="POST">
                <h2>Iniciar sesión</h2>
                <?php if (isset($error)): ?>
                    <div class="error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Ingresar</button>
            </form>
            <div class="google-login">
                <p>O inicia sesión con</p>
                <button class="google-btn">
                    <img src="images/Google-Logo.svg" alt="Google Logo">
                    Sign up with Google
                </button>
            </div>
        </div>
    </div>
</body>
</html>
