<?php
require_once '../models/modelstock.php';

function mostrarFormularioReducirStock($categoriaId = null, $subcategoriaId = null)
{
    $categorias = obtenerCategorias();
    $productos = [];
    if ($categoriaId && $subcategoriaId) {
        $productos = obtenerProductosPorCategoriaSubcategoria($categoriaId, $subcategoriaId);
    }
    require '../views/reducirStock.php';
}

function reducirStock($productoId, $cantidad)
{
    if (reducirStockProducto($productoId, $cantidad)) {
        header("Location: controlStock.php");
    } else {
        echo "Error al reducir el stock del producto.";
    }
}

function obtenerSubcategoriasAjax($categoriaId)
{
    $subcategorias = obtenerSubcategorias($categoriaId);
    header('Content-Type: application/json');
    echo json_encode($subcategorias);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['categoria'])) {
        $categoriaId = $_GET['categoria'];
        if (isset($_GET['subcategoria'])) {
            $subcategoriaId = $_GET['subcategoria'];
            mostrarFormularioReducirStock($categoriaId, $subcategoriaId);
        } else {
            obtenerSubcategoriasAjax($categoriaId);
        }
    } else {
        mostrarFormularioReducirStock();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['producto'], $_POST['cantidad'])) {
        session_start();
        $productoId = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $nomusu = $_SESSION['user'];
        $fecha_actual = date('d-m-Y');
        añadiruso($productoId, $cantidad, $nomusu);

        reducirStock($productoId, $cantidad);
    }
}
