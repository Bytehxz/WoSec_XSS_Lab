<?php
session_start();

// Forzar sesión de admin para simular la lectura
$_SESSION['user_role'] = 'admin';
$_SESSION['username'] = 'admin';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Admin - Viendo Mensajes</title>
	<meta http-equiv="refresh" content="5"> <!-- Refresca cada 5 segundos -->
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
			max-width: 800px;
			margin: auto;
			background: white;
			color: #333;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
		}

		.mensaje {
			background: rgba(255, 255, 255, 0.9);
			margin-top: 15px;
			padding: 15px;
			border-radius: 10px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
		}
	</style>
</head>

<body>

	<div class="container">
		<h1>Admin leyendo mensajes...</h1>

		<?php
		if (file_exists('mensajes.txt')) {
			foreach (file('mensajes.txt') as $m) {
				echo "<div class='mensaje'>$m</div>";
			}
		}
		?>
	</div>

</body>

</html>
