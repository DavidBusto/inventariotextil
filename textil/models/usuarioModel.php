<?php
require_once('../db/datadb.php');

function añadirUsuario($nombre_usuario, $contrasena, $correo_electronico, $rol)
{

    $conn = conectar();

    $contraHash = password_hash($contrasena, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contrasena, correo_electronico, rol, fecha_registro) VALUES (:nombre_usuario, :contrasena, :correo_electronico, :rol, NOW())");

    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->bindParam(':contrasena', $contraHash);
    $stmt->bindParam(':correo_electronico', $correo_electronico);
    $stmt->bindParam(':rol', $rol);

    $stmt->execute();
}
?>