<?php
require_once '../models/modelProducto.php';



function limpiar($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function comprobariniciosesion(){
    session_start();
    if(isset($_SESSION['user'])){
        return true;
    }else{
        return false;
    }
}

$compueba = comprobariniciosesion();
if($compueba == false){
    header("Location: ./logout.php");
}

function mostrarProductos()
{
    $categorias = obtenerCategorias();
    require '../views/productos.php';
}

function obtenerSubcategoriasAjax($categoriaId)
{
    $subcategorias = obtenerSubcategorias($categoriaId);
    header('Content-Type: application/json');
    echo json_encode($subcategorias);
    exit;
}

function obtenerSubsubcategoriasYColoresAjax($categoriaId, $subcategoriaId)
{
    $subsubcategorias = obtenerSubsubcategorias($categoriaId, $subcategoriaId);
    $colores = obtenerColoresPorsubcategoria($categoriaId, $subcategoriaId);

    header('Content-Type: application/json');
    echo json_encode(['subsubcategorias' => $subsubcategorias, 'colores' => $colores]);
    exit;
}

function obtenerColoresPorSubsubcategoriaAjax($categoriaId, $subcategoriaId, $subsubcategoriaId)
{
    $colores = obtenerColoresPorSubsubcategoria($categoriaId, $subcategoriaId, $subsubcategoriaId);
    header('Content-Type: application/json');
    echo json_encode($colores);
    exit;
}

function mostrarProductosFiltrados($categoriaId, $subcategoriaId = null, $subsubcategoriaId = null, $color = null)
{
    $productos = obtenerProductosFiltrados($categoriaId, $subcategoriaId, $subsubcategoriaId, $color);
    require '../views/productos.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit'])) {
    $categoriaId = limpiar($_GET['categoria']) ?? null;
$subcategoriaId = limpiar($_GET['subcategoria']) ?? null;
$subsubcategoriaId = limpiar($_GET['subsubcategoria']) ?? null;
$colorId = limpiar($_GET['color']) ?? null;

    mostrarProductosFiltrados($categoriaId, $subcategoriaId, $subsubcategoriaId, $colorId);
    exit;
}

$categoriaId = limpiar($_GET['categoria']) ?? null;
$subcategoriaId = limpiar($_GET['subcategoria']) ?? null;
$subsubcategoriaId = limpiar($_GET['subsubcategoria']) ?? null;
$colorId = limpiar($_GET['color']) ?? null;

if ($categoriaId && $subcategoriaId && $subsubcategoriaId) {
    obtenerColoresPorSubsubcategoriaAjax($categoriaId, $subcategoriaId, $subsubcategoriaId);
} elseif ($categoriaId && $subcategoriaId) {
    obtenerSubsubcategoriasYColoresAjax($categoriaId, $subcategoriaId);
} elseif ($categoriaId) {
    obtenerSubcategoriasAjax($categoriaId);
} else {
    mostrarProductos();
}
?>
