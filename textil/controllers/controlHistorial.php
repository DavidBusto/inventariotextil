<?php
require_once '../models/modelhistorial.php';

function mostrarhistorial() {
    $operaciones = obtenerhistorial();
    require '../views/historial.php';
}
mostrarhistorial();
