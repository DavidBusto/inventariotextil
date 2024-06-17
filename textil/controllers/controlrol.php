<?php
session_start();

if (!isset($_SESSION['rol'])) {

    header("Location: login.php");
    exit;
}


if ($_SESSION['rol'] === 'admin') {

    header("Location: controladduser.php");
    exit;
} else {

    echo "<script>alert('No tienes permiso para agregar usuarios. Necesitas un rol de administrador.');</script>";

    echo "<script>window.history.back();</script>";
    exit;
}
?>