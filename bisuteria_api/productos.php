<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "conexion.php";

try {

    $sql = "SELECT 
                p.id,
                p.nombre,
                p.descripcion,
                p.precio,
                p.imagen,
                p.stock,
                c.nombre AS categoria
            FROM productos p
            LEFT JOIN categorias c
            ON p.categoria_id = c.id
            ORDER BY p.id DESC";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();

    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($productos);

} catch(PDOException $e) {

    echo json_encode([
        "error" => true,
        "mensaje" => $e->getMessage()
    ]);

}

?>