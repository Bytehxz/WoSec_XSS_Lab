<?php
session_start();

$usuarios = [
	'guest' => ['password' => 'guest', 'role' => 'user'],
	'admin' => ['password' => 'L#3GUnUUfx', 'role' => 'admin']
];

if (!isset($_SESSION['user_role'])) {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';
		if (isset($usuarios[$username]) && $usuarios[$username]['password'] === $password) {
			$_SESSION['user_role'] = $usuarios[$username]['role'];
			$_SESSION['username'] = $username;
			header('Location: index.php');
			exit();
		} else {
			$error = "Usuario o contraseña incorrectos.";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<style>
			body {
				margin: 0;
				padding: 0;
				height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
				background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
				font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			}

			.login-container {
				background: white;
				padding: 30px;
				border-radius: 15px;
				box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
				text-align: center;
				width: 300px;
			}

			input,
			button {
				width: 100%;
				padding: 10px;
				margin: 10px 0;
				border: none;
				border-radius: 8px;
				font-size: 16px;
			}

			button {
				background-color: #2575fc;
				color: white;
				font-weight: bold;
				cursor: pointer;
			}

			button:hover {
				background-color: #6a11cb;
			}

			.error {
				color: red;
				margin-bottom: 10px;
			}
		</style>
	</head>

	<body>
		<div class="login-container">
			<h2>Login</h2>
			<?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
			<form method="POST">
				<input type="text" name="username" placeholder="Usuario" required>
				<input type="password" name="password" placeholder="Contraseña" required>
				<button type="submit">Entrar</button>
			</form>
		</div>
	</body>

	</html>
<?php
	exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Mensajes Públicos</title>
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

		textarea,
		button {
			width: 100%;
			margin-top: 10px;
			padding: 10px;
			font-size: 16px;
			border-radius: 8px;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		button {
			background-color: #2575fc;
			color: white;
			font-weight: bold;
			cursor: pointer;
			border: none;
		}

		button:hover {
			background-color: #6a11cb;
		}

		.mensaje {
			background: rgba(255, 255, 255, 0.9);
			margin-top: 15px;
			padding: 15px;
			border-radius: 10px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
		}

		.menu {
			margin-bottom: 20px;
			text-align: center;
		}

		.menu a {
			color: #2575fc;
			font-weight: bold;
			margin: 0 10px;
			text-decoration: none;
		}

		.menu a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?> (<?php echo $_SESSION['user_role']; ?>)</h1>
		<div class="menu">
			<a href="flag.php">Panel de Admin</a> |
			<a href="logout.php">Cerrar sesión</a>
		</div>

		<h2>Enviar nuevo mensaje</h2>
		<form method="POST" action="post.php">
			<textarea name="mensaje" rows="4" placeholder="Escribe un mensaje"></textarea>
			<button type="submit">Publicar</button>
		</form>

		<h2>Mensajes Publicados</h2>
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

</html>
