<?php
include_once './models/modelLogin.php';
function loginUser($email, $pass)
{
    $info =  login($email, $pass);
    $contraseñadb = $info['contrasena'];
    if (password_verify($pass, $contraseñadb)) {
        session_start();
        $_SESSION['email'] = $info['correo_electronico'];
        $_SESSION['user'] = $info['nombre_usuario'];
        $_SESSION['rol'] = $info['rol'];
        header('Location: controllers/controlInicio.php');
    } else {
        echo "Informacion de Inicio de Sesion incorrecta";
    }
}
