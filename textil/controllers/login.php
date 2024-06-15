<?php
require_once 'models/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        $conn = getConnection();
        $nombre_usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : null;
        $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;

        if ($nombre_usuario && $contrasena) {
            $user = findUserByUsername($conn, $nombre_usuario);

            if ($user && password_verify($contrasena, $user['contrasena'])) {
                session_start();
                $_SESSION['usuario_id'] = $user['id'];
                $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
                $_SESSION['rol'] = $user['rol'];
                var_dump($_SESSION);

                exit();
            } else {
                $error = "Nombre de usuario o contraseña incorrectos";
                include 'views/login.php';
            }
        } else {

            include 'views/login.php';
        }
    }
} else {

    include 'views/login.php';
}
