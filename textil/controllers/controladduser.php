<?php
session_start();

function limpiar($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function comprobariniciosesion(){
    session_start();
    if(isset($_SESSION['user'])){
        return true;
    }else{
        return false;
    }
}

$compueba = comprobariniciosesion();
if($compueba == false){
    header("Location: ./logout.php");
}

if ($_SESSION['rol'] !== 'admin') {

    header("Location: inicio.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = limpiar($_POST['nombre_usuario']);
    $contrasena = limpiar($_POST['contrasena']);
    $correoElectronico = limpiar($_POST['correo_electronico']);
    $rol = limpiar($_POST['rol']);



    require_once('../models/usuarioModel.php');
    añadirUsuario($nombreUsuario, $contrasena, $correoElectronico, $rol);
}

require_once('../views/addUserView.php');
?>