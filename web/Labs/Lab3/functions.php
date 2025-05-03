<?php
session_start();
date_default_timezone_set('America/Mexico_City');
// Simulación de base de datos de usuarios
$users = [
    'admin' => [
        'password' => 'admin123', // En un caso real, usaríamos hash
        'is_admin' => true
    ],
    'usuario1' => [
        'password' => 'usuario123',
        'is_admin' => false
    ],
    'usuario2' => [
        'password' => 'usuario123',
        'is_admin' => false
    ]
];

function checkLogin($username, $password) {
    global $users;
    
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = $users[$username]['is_admin'];
        return true;
    }
    return false;
}

function isAdmin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

function saveMessage($message) {
    if (!empty($message)) {
        $username = $_SESSION['username'];
        $timestamp = date('Y-m-d H:i:s');
        // Guardamos el mensaje sin sanitizar para demostrar XSS Stored
        $messageData = [
            'username' => $username,
            'message' => $message, // Vulnerabilidad aquí - no se sanitiza
            'timestamp' => $timestamp
        ];
        $messageLine = json_encode($messageData); // Usamos JSON para estructura
        file_put_contents('mensajes.txt', $messageLine . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

function getMessages() {
    $messages = [];
    if (file_exists('mensajes.txt')) {
        $lines = file('mensajes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $messageData = json_decode($line, true);
            if ($messageData) {
                $messages[] = $messageData;
            }
        }
    }
    return array_reverse($messages); // Mostrar los más recientes primero
}

function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }
}
?>
