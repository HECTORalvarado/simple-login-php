<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
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
    <div class="grid">
        <div class="container">
            <figure class="bg" >
            <svg id="sw-js-blob-svg" viewBox="0 0 100 100">
                    <defs> 
                        <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
                            <stop id="stop1" stop-color="rgba(89.256, 22.644, 108.218, 1)" offset="0%"></stop>
                            <stop id="stop2" stop-color="rgba(41.328, 96.216, 149.201, 1)" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                <path fill="url(#sw-gradient)" d="M25.8,-34.5C33,-30.2,38.1,-22.1,38.9,-14C39.7,-5.8,36.2,2.4,32.7,9.9C29.3,17.4,25.9,24.1,20.4,28.8C15,33.6,7.5,36.2,-1,37.6C-9.5,39,-19,39.1,-24.3,34.4C-29.7,29.6,-30.8,20,-33,11.2C-35.2,2.4,-38.5,-5.6,-37.8,-13.7C-37.1,-21.8,-32.4,-30,-25.5,-34.4C-18.5,-38.8,-9.3,-39.3,0,-39.3C9.3,-39.3,18.5,-38.8,25.8,-34.5Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
              </svg>
            </figure>
            <div class="img">
                <img src="img/undraw_sign_up_n6im.svg" alt="">
            </div>
        </div>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <h2>Registrarse</h2>
            <div>
                <input type="text" class="formInput" id="username" name="username" autocomplete="off" required>
                <label for="username">
                    <span>
                        Usuario
                    </span>
                    <i class="icon">
                        <img src="/img/icons/user-profile-modified.svg" alt="">
                    </i>
                </label>
            </div>
            <div>
                <input type="password" class="formInput" name="password" id="password" autocomplete="off" required>
                <label for="password">
                    <span>
                        Contraseña
                    </span>
                    <i class="icon">
                        <img src="/img/icons/lock-modified.svg" alt="">
                    </i>
                </label>
            </div>
            <input type="submit" value="Registrarse">
            <p>¿Ya tienes cuenta? ¡Inicia sesion <a href="login.php">aquí !</a></p>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>
</html>