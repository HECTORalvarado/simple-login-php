<?php
    // inicia session si no lo ha hecho
    session_start();
    // Destruye la session actual
    session_destroy();
    //Redirige a la pagina de login
    header("Location: login.php");

    exit;
?>