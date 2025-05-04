<?php
// Leer tareas del archivo si existe
$tareas = file_exists('tareas.txt') ? file('tareas.txt', FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>To-Do List XSS Lab</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      color: white;
      padding: 40px;
    }
    .container {
      background: white;
      color: #333;
      padding: 30px;
      border-radius: 15px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    input, button {
      padding: 10px;
      font-size: 16px;
      margin-right: 10px;
      border-radius: 8px;
      border: none;
    }
    button {
      background: #2575fc;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background: #6a11cb;
    }
    .tarea {
      background: #f1f1f1;
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Laboratorio XSS: To-Do List</h1>
    <form method="POST" action="agregar.php">
      <input type="text" name="tarea" placeholder="Escribe una tarea..." required>
      <button type="submit">Agregar</button>
      <a href="reset.php"><button type="button">Reiniciar</button></a>
    </form>

    <h2>Tareas:</h2>
    <?php foreach ($tareas as $t): ?>
      <div class="tarea"><?= $t ?></div> <!-- no se escapa: vulnerable a XSS -->
    <?php endforeach; ?>
  </div>
</body>
</html>

