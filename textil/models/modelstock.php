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

function obtenerSubsubcategorias($categoriaId, $subcategoriaId)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT id, nombre FROM subsubcategorias WHERE id_categoria_principal = :categoria_id AND id_subcategoria = :subcategoria");
    $stmt->bindParam(':categoria_id', $categoriaId);
	$stmt->bindParam(':subcategoria', $subcategoriaId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerProductosPorCategoriaSubcategoria($categoriaId, $subcategoriaId)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT id, nombre, descripcion, stock_actual FROM productos WHERE id_categoria = :categoria_id AND id_subcategoria = :subcategoria_id");
    $stmt->bindParam(':categoria_id', $categoriaId);
    $stmt->bindParam(':subcategoria_id', $subcategoriaId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function reducirStockProducto($productoId, $cantidad)
{
    $conn = conectar();
    $stmt = $conn->prepare("UPDATE productos SET stock_actual = stock_actual - :cantidad WHERE id = :producto_id");
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':producto_id', $productoId);
    return $stmt->execute();
}
function obtenerProductoPorId($productoId)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT id, nombre, descripcion, stock_actual FROM productos WHERE id = :producto_id");
    $stmt->bindParam(':producto_id', $productoId);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function añadiruso($productoId, $cantidad, $nomusu)
{
    $fechaHoraActual = date('Y-m-d H:i:s');

    $conn = conectar();
    $stmt = $conn->prepare("INSERT INTO uso_producto (id_usuario, id_producto, cantidad, fecha) 
                            VALUES ((SELECT id FROM usuarios WHERE nombre_usuario = :nomusu), :productoId, :cantidad, :fecha)");
    $stmt->bindParam(':nomusu', $nomusu);
    $stmt->bindParam(':productoId', $productoId);
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':fecha', $fechaHoraActual);
    return $stmt->execute();
}
