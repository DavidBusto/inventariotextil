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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'], $_POST['descripcion'], $_POST['categoria'], $_POST['subcategoria'])) {
        $nombre = limpiar($_POST['nombre']);
        $descripcion = limpiar($_POST['descripcion']);
        $categoriaId = limpiar($_POST['categoria']);
        $subcategoriaId = limpiar($_POST['subcategoria']);
        $subsubcategoriaId = limpiar($_POST['subsubcategoria']) ?? null;
        $observaciones = limpiar($_POST['observaciones']) ?? '';
        $tamano = limpiar($_POST['tamano']) ?? '';
        $color = limpiar($_POST['color']) ?? '';
        $stockInicial = limpiar($_POST['stock_inicial']) ?? 0;
        
        agregarNuevoProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $subsubcategoriaId, $observaciones, $tamano, $color, $stockInicial);
    } else {
        mostrarFormularioAgregarProducto();
    }
} elseif (isset($_GET['categoria'], $_GET['subcategoria'])) {
    $categoriaId = limpiar($_GET['categoria']);
    $subcategoriaId = limpiar($_GET['subcategoria']);
    obtenerSubsubcategoriasAjax($categoriaId, $subcategoriaId);
} elseif (isset($_GET['categoria'])) {
    $categoriaId = limpiar($_GET['categoria']);
    obtenerSubcategoriasAjax($categoriaId);
} else {
    mostrarFormularioAgregarProducto();
}

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

function obtenerSubsubcategoriasAjax($categoriaId, $subcategoriaId)
{
    $subsubcategorias = obtenerSubsubcategorias($categoriaId, $subcategoriaId);
    header('Content-Type: application/json');
    echo json_encode($subsubcategorias);
}

function agregarNuevoProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $subsubcategoriaId, $observaciones, $tamano, $color, $stockInicial)
{
    if (agregarProducto($nombre, $descripcion, $categoriaId, $subcategoriaId, $subsubcategoriaId, $observaciones, $tamano, $color, $stockInicial)) {
        header("Location: controlProductoAdd.php");
        exit;
    } else {
        echo "Error al agregar el producto.";
    }
}
?>
