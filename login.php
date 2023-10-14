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

    <div class="grid">
        <div class="container">
            <figure class="bg" >
                <svg id="sw-js-blob-svg" viewBox="0 0 100 100" >
                        <defs> 
                            <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
                                <stop id="stop1" stop-color="rgba(89.256, 22.644, 108.218, 1)" offset="0%"></stop>
                                <stop id="stop2" stop-color="rgba(41.328, 96.216, 149.201, 1)" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                    <path fill="url(#sw-gradient)" d="M20.6,-29.4C25.3,-25,26.6,-17.1,29.6,-9.3C32.6,-1.5,37.2,6,37,13.6C36.8,21.3,31.7,28.9,24.7,33.2C17.7,37.4,8.9,38.2,1.1,36.8C-6.7,35.3,-13.4,31.5,-20.4,27.3C-27.3,23,-34.4,18.3,-35.9,12.1C-37.3,5.9,-33.1,-1.8,-30.8,-10.4C-28.5,-18.9,-28.1,-28.5,-23.2,-32.8C-18.4,-37.1,-9.2,-36.1,-0.6,-35.2C8,-34.4,16,-33.7,20.6,-29.4Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path>
                </svg>
            </figure>
            <div class="img">
                <img src="img/undraw_secure_login_pdn4.svg" alt="">
            </div>
        </div>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <h2>Iniciar Sesion</h2>
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
            <input type="submit" value="Iniciar Sesion">
            <p>¿No tienes cuenta? ¡Registrate <a href="signUp.php">aquí !</a></p>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>
</html>