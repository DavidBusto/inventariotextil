<?php
session_start();


if ($_SESSION['rol'] !== 'admin') {

    header("Location: inicio.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $correoElectronico = $_POST['correo_electronico'];
    $rol = $_POST['rol'];



    require_once('../models/usuarioModel.php');
    añadirUsuario($nombreUsuario, $contrasena, $correoElectronico, $rol);
}

require_once('../views/addUserView.php');
