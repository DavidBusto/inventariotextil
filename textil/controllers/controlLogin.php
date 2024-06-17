<?php
include_once './models/modelLogin.php';


function limpiar($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (isset($_POST['submit'])) {
        $usuario = limpiar($_POST['usuario']);
		$pass = limpiar($_POST['password']);
   loginUser($usuario, $pass);
}

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
?>