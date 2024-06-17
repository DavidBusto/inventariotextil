<?php
require_once '../db/datadb.php';

function obtenerhistorial()
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT u.nombre_usuario,p.NOMBRE,us.cantidad,us.fecha FROM uso_producto us JOIN usuarios u ON us.id_usuario = u.id
JOIN productos p ON us.id_producto = p.id;");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>