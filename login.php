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

            // Obtiene los datos de la BD
            $query = "SELECT * FROM users WHERE username='$inputUsername'";
            $results = mysqli_query($conn, $query);
           
            if (mysqli_num_rows($results) == 1) {
                // Nombre de usuario válido, verificar contraseña
                $row = mysqli_fetch_assoc($results);
                if (password_verify($inputPassword, $row['password'])) {
                  // Inicio de sesión válido
                  $_SESSION['username'] = $username;
                header("Location: home.php");
                exit;
                } else {
                    echo "Credenciales incorrectas, intentelo de nuevo";
                }
            }
        }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" placeholder="Nombre de usuario" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Iniciar Sesion">
    </form>
    <p>¿No tienes cuenta? ¡Registrate <a href="signUp.php">aquí</a>!</p>
</body>
</html>