<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesion</h2>
    <?php
        require_once 'dbConnection.php';
        // Verifica si se ha enviado un formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Obtiene el username y el password del formulario
            $inputUsername = mysqli_real_escape_string($conn, $_POST["username"]);
            $inputPassword = mysqli_real_escape_string($conn, $_POST["password"]);
			$hashedPass = password_hash($inputPassword, PASSWORD_DEFAULT);
			if (!empty($inputUsername) && !empty($inputPassword)) {
				$query = "INSERT INTO users (username, password) VALUES ('$inputUsername','$hashedPass')";
				$results = mysqli_query($conn, $query);
				$_SESSION['username']= $inputUsername;
				header("Location: home.php");
				exit;
			} else {
				echo "Formulario incompleto";
			}
            
        }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" placeholder="Nombre de usuario" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Registrarse">
    </form>

</body>
</html>