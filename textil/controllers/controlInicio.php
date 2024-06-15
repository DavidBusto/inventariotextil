<?php
session_start();


include_once '../models/modelLogin.php';


function verificarInicioSesion()
{
    if (!isset($_SESSION['email'])) {
        header('Location: ../index.php');
        exit;
    }
}


if (isset($_POST['salir'])) {
    cerrarSesion();
}

function cerrarSesion()
{
    $_SESSION = array();
    session_destroy();

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    if (isset($_COOKIE["carrito"])) {
        setcookie('carrito', '', time() - 3600, '/');
    }

    header("Location: ../index.php");
    exit();
}


function datosCliente()
{
    echo "<p>Bienvenido: " . $_SESSION['user'] . "</p>";
}


verificarInicioSesion();


include_once '../views/vinicio.php';
