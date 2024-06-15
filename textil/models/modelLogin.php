<?php
include_once __DIR__ . '/../db/datadb.php';

function login($email, $pass)
{
    $conn = conectar();

    try {
        $stmt = $conn->prepare("SELECT correo_electronico, nombre_usuario, contrasena, rol FROM usuarios WHERE correo_electronico = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $info[0];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
