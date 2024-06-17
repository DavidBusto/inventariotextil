<?php
require_once '../models/modelhistorial.php';


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

function mostrarhistorial() {
    $operaciones = obtenerhistorial();
    require '../views/historial.php';
}
mostrarhistorial();
?>