<?php
require_once '../models/modelProducto.php';

function mostrarFormularioAgregarProducto()
{
    $categorias = obtenerCategorias();
    require '../views/addProductos.php';
}

function obtenerSubcategoriasAjax($categoriaId)
{
    $subcategorias = obtenerSubcategorias($categoriaId);
    header('Content-Type: application/json');
    echo json_encode($subcategorias);
}

function agregarNuevoProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $observaciones, $tamaño, $color, $stockInicial)
{
    if (agregarProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $observaciones, $tamaño, $color, $stockInicial)) {
        header("Location: controlProductoAdd.php");
    } else {
        echo "Error al agregar el producto.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'], $_POST['descripcion'], $_POST['categoria'], $_POST['subcategoria'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoriaId = $_POST['categoria'];
        $subcategoriaId = $_POST['subcategoria'];
        $observaciones = $_POST['observaciones'] ?? '';
        $tamaño = $_POST['tamaño'] ?? '';
        $color = $_POST['color'] ?? '';
        $stockInicial = $_POST['stock_inicial'] ?? 0;
        agregarNuevoProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $observaciones, $tamaño, $color, $stockInicial);
    }
} elseif (isset($_GET['categoria'])) {
    $categoriaId = $_GET['categoria'];
    obtenerSubcategoriasAjax($categoriaId);
} else {
    mostrarFormularioAgregarProducto();
}
