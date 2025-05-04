<?php
// Borra todas las tareas
file_put_contents('tareas.txt', '');
header('Location: index.php');
exit();

