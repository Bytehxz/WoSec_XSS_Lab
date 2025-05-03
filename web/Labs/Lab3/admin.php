<?php
require_once 'functions.php';
redirectIfNotLoggedIn();

if (!isAdmin()) {
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoSec Cybersecurity - Admin</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="admin-container">
        <header>
            <h1>Panel de Administrador</h1>
            <div class="user-info">
                Administrador: <?= htmlspecialchars($_SESSION['username']) ?> 
                (<a href="logout.php">Cerrar sesión</a> | 
                <a href="home.php">Volver al foro</a>)
            </div>
        </header>
        
        <div class="admin-content">
            <h2>Bienvenido al panel de administración</h2>
            <p>Aquí puedes gestionar toda la configuración del sitio.</p>
            
            <div class="flag-container">
                <h3>CTF Flag</h3>
                <div class="flag">FLAG{XSS_Stored_Admin_Panel_123}</div>
                <p>Esta es la bandera del desafío CTF. Solo los administradores pueden verla.</p>
            </div>
            
            <div class="stats">
                <h3>Estadísticas del sitio</h3>
                <p>Total de mensajes: <?= count(getMessages()) ?></p>
                <p>Usuarios registrados: 3</p>
            </div>
        </div>
    </div>
</body>
</html>
