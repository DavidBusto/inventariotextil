<?php
require_once '../db/datadb.php';


function obtenerCategorias()
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT id, nombre FROM categoriasprincipales");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerSubcategorias($categoriaId)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT id, nombre FROM subcategorias WHERE id_categoria = :categoria_id");
    $stmt->bindParam(':categoria_id', $categoriaId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerColoresPorSubcategoria($categoriaId, $subcategoriaId)
{
    $conn = conectar();
    $query = "SELECT DISTINCT color FROM productos WHERE id_categoria = :categoria_id";
    if ($subcategoriaId) {
        $query .= " AND id_subcategoria = :subcategoria_id";
    }
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':categoria_id', $categoriaId);
    if ($subcategoriaId) {
        $stmt->bindParam(':subcategoria_id', $subcategoriaId);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerProductosFiltrados($categoriaId, $subcategoriaId = null, $color = null)
{
    $conn = conectar();
    $query = "SELECT * FROM productos WHERE id_categoria = :categoria_id";
    $params = [':categoria_id' => $categoriaId];

    if ($subcategoriaId) {
        $query .= " AND id_subcategoria = :subcategoria_id";
        $params[':subcategoria_id'] = $subcategoriaId;
    }

    if ($color) {
        $query .= " AND color = :color";
        $params[':color'] = $color;
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
