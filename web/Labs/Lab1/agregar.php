<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarea = $_POST['tarea'] ?? '';

    // Guardar sin sanitizar (vulnerable a XSS)
    file_put_contents('tareas.txt', $tarea . "\n", FILE_APPEND);
}

header('Location: index.php');
exit();

