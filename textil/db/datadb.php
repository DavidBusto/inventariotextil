<?php
function datadb(){
    $servername = "fdb1034.awardspace.net";
    $username = "4429559_inventariotextil";
    $password = "tfganasdavid123";
    $dbname = "4429559_inventariotextil";

    return array(
        'servername' => $servername,
        'username' => $username,
        'password' => $password,
        'dbname' => $dbname
    );
}

function conectar() {
    $database_info = datadb();

    $servername = $database_info['servername'];
    $username = $database_info['username'];
    $password = $database_info['password'];
    $dbname = $database_info['dbname'];

    try {
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        return null;
    }
}


?>