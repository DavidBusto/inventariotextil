<?php
function findUserByUsername($conn, $nombre_usuario)
{
    $query = "SELECT * FROM Usuarios WHERE nombre_usuario = ? LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $nombre_usuario);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function generatePasswordHash($contrasena)
{
    return password_hash($contrasena, PASSWORD_DEFAULT);
}
