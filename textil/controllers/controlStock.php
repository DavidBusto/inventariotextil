<?php
require_once '../models/modelstock.php';


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

function mostrarFormularioReducirStock($categoriaId = null, $subcategoriaId = null, $subsubcategoriaId = null)
{
    $categorias = obtenerCategorias();
    $productos = [];
    if ($categoriaId && $subcategoriaId && $subsubcategoriaId) {
        $productos = obtenerProductosPorCategoriaSubcategoria($categoriaId, $subcategoriaId, $subsubcategoriaId);
    } elseif ($categoriaId && $subcategoriaId) {
        $productos = obtenerProductosPorCategoriaSubcategoria($categoriaId, $subcategoriaId);
    }
    require '../views/reducirStock.php';
}

function reducirStock($productoId, $cantidad)
{
    $producto = obtenerProductoPorId($productoId);
    if ($producto['stock_actual'] < $cantidad) {
        echo "<script>alert('No es posible reducir el stock. La cantidad a retirar es superior a la disponible.');</script>";
        echo "<script>window.location.href = 'controlStock.php';</script>";
        exit;
    }

    if (reducirStockProducto($productoId, $cantidad)) {
		añadiruso($productoId, $cantidad, $nomusu);
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

function obtenerSubsubcategoriasAjax($categoriaId, $subcategoriaId)
{
    $subsubcategorias = obtenerSubsubcategorias($categoriaId, $subcategoriaId);
    header('Content-Type: application/json');
    echo json_encode($subsubcategorias);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['categoria'])) {
        $categoriaId = $_GET['categoria'];
        if (isset($_GET['subcategoria'])) {
            $subcategoriaId = $_GET['subcategoria'];
            if (isset($_GET['subsubcategoria'])) {
                $subsubcategoriaId = $_GET['subsubcategoria'];
                mostrarFormularioReducirStock($categoriaId, $subcategoriaId, $subsubcategoriaId);
            } else {
                obtenerSubsubcategoriasAjax($categoriaId, $subcategoriaId);
            }
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
        $cantidad = limpiar($_POST['cantidad']);
        $nomusu = $_SESSION['user'];
        $fecha_actual = date('d-m-Y');

        reducirStock($productoId, $cantidad);
    }
}
?>
