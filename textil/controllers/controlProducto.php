<?php
require_once '../models/modelProducto.php';


function mostrarProductos()
{
    $categorias = obtenerCategorias();
    $subcategorias = [];
    $colores = [];
    require '../views/productos.php';
}


function obtenerSubcategoriasAjax($categoriaId)
{
    $subcategorias = obtenerSubcategorias($categoriaId);
    header('Content-Type: application/json');
    echo json_encode($subcategorias);
    exit;
}


function obtenerColoresAjax($categoriaId, $subcategoriaId)
{
    $colores = obtenerColoresPorSubcategoria($categoriaId, $subcategoriaId);
    header('Content-Type: application/json');
    echo json_encode($colores);
    exit;
}


function mostrarProductosFiltrados($categoriaId, $subcategoriaId = null, $color = null)
{
    $productos = obtenerProductosFiltrados($categoriaId, $subcategoriaId, $color);


    require '../views/productos.php';
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit'])) {
    $categoriaId = $_GET['categoria'] ?? null;
    $subcategoriaId = $_GET['subcategoria'] ?? null;
    $color = $_GET['color'] ?? null;


    $productos = obtenerProductosFiltrados($categoriaId, $subcategoriaId, $color);


    require '../views/productos.php';
    exit;
}


$categoriaId = $_GET['categoria'] ?? null;
$subcategoriaId = $_GET['subcategoria'] ?? null;
$color = $_GET['color'] ?? null;

if ($categoriaId && $subcategoriaId) {
    obtenerColoresAjax($categoriaId, $subcategoriaId);
} elseif ($categoriaId) {
    obtenerSubcategoriasAjax($categoriaId);
} else {
    mostrarProductos();
}
