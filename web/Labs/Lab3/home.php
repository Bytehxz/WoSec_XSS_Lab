<?php
require_once 'functions.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    saveMessage($_POST['message']);
}

$messages = getMessages();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoSec Cybersecurity - Foro</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="forum-container">
        <header>
            <h1>WoSec Cybersecurity Foro</h1>
            <div class="user-info">
                Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?> 
                (<a href="logout.php">Cerrar sesión</a>)
                <?php if (isAdmin()): ?>
                    | <a href="admin.php">Panel de Administrador</a>
                <?php endif; ?>
            </div>
        </header>
        
        <div class="message-form">
            <h2>Publica un mensaje</h2>
            <form method="POST">
                <textarea name="message" placeholder="Escribe tu mensaje aquí..." required></textarea>
                <button type="submit">Publicar</button>
            </form>
        </div>
        
        <div class="messages-list">
            <h2>Mensajes recientes</h2>
            <?php if (empty($messages)): ?>
                <p>No hay mensajes aún. ¡Sé el primero en publicar!</p>
            <?php else: ?>
                <?php foreach ($messages as $msg): ?>
                    <div class="message">
                        <div class="message-header">
                            <strong><?= htmlspecialchars($msg['username']) ?></strong>
                            <span class="timestamp"><?= htmlspecialchars($msg['timestamp']) ?></span>
                        </div>
                        <div class="message-content">
                            <?= $msg['message'] ?> <!-- Vulnerabilidad XSS Stored aquí -->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
