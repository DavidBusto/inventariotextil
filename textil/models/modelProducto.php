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
    $stmt = $conn->prepare("SELECT id, nombre FROM subsubcategorias WHERE id_categoria_principal = :categoria_id AND id_subcategoria = :subcategoria_id");
    $stmt->bindParam(':categoria_id', $categoriaId);
    $stmt->bindParam(':subcategoria_id', $subcategoriaId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerColoresPorsubcategoria($categoriaId, $subcategoriaId)
{
    $conn = conectar();
    $query = "SELECT DISTINCT color FROM productos WHERE id_categoria = :categoria_id";

    $params = [':categoria_id' => $categoriaId];
    
    if ($subcategoriaId) {
        $query .= " AND id_subcategoria = :subcategoria_id";
        $params[':subcategoria_id'] = $subcategoriaId;
    }
  
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerColoresPorSubsubcategoria($categoriaId, $subcategoriaId, $subsubcategoriaId)
{
    $conn = conectar();
    $query = "SELECT DISTINCT color FROM productos WHERE id_categoria = :categoria_id";

    $params = [':categoria_id' => $categoriaId];
    
    if ($subcategoriaId) {
        $query .= " AND id_subcategoria = :subcategoria_id";
        $params[':subcategoria_id'] = $subcategoriaId;
    }
    if ($subsubcategoriaId !== null) {
        $query .= " AND id_subsubcategoria = :subsubcategoria_id";
        $params[':subsubcategoria_id'] = $subsubcategoriaId;
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerProductosFiltrados($categoriaId, $subcategoriaId = null, $subsubcategoriaId = null, $color = null)
{
    $conn = conectar();
    $query = "SELECT * FROM productos WHERE id_categoria = :categoria_id";
    
    if ($subcategoriaId) {
        $query .= " AND id_subcategoria = :subcategoria_id";
    }
    if ($subsubcategoriaId) {
        $query .= " AND id_subsubcategoria = :subsubcategoria_id";
    }
    if ($color) {
        $query .= " AND color = :color";
    }

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':categoria_id', $categoriaId, PDO::PARAM_INT);

    if ($subcategoriaId) {
        $stmt->bindParam(':subcategoria_id', $subcategoriaId, PDO::PARAM_INT);
    }
    if ($subsubcategoriaId) {
        $stmt->bindParam(':subsubcategoria_id', $subsubcategoriaId, PDO::PARAM_INT);
    }
    if ($color) {
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function agregarProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $subsubcategoriaId, $observaciones, $tamano, $color, $stockInicial) {
    $conn = conectar();
    
    try {
        $sql = "INSERT INTO productos (nombre, descripcion, id_categoria, id_subcategoria, id_subsubcategoria, observaciones, tamano, color, stock_inicial, stock_actual) 
                VALUES (:nombre, :descripcion, :id_categoria, :id_subcategoria, :id_subsubcategoria, :observaciones, :tamano, :color, :stock_inicial, :stock_actual)";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id_categoria', $categoriaId, PDO::PARAM_INT);
        $stmt->bindParam(':id_subcategoria', $subcategoriaId, PDO::PARAM_INT);
        $stmt->bindParam(':id_subsubcategoria', $subsubcategoriaId, PDO::PARAM_INT);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':tamano', $tamano);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':stock_inicial', $stockInicial, PDO::PARAM_INT);
        $stmt->bindParam(':stock_actual', $stockInicial, PDO::PARAM_INT);  

        $stmt->execute();

        return $conn->lastInsertId();
        
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}
?>
