<?php

$host = "localhost";
$db = "bisuteria_movil";
$user = "root";
$password = "";

try {

    $conexion = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $password
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e) {

    echo json_encode([
        "error" => true,
        "mensaje" => $e->getMessage()
    ]);

}

?>