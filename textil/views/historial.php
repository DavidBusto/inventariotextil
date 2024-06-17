<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/sty2.css">

</head>

<body>
    <nav>
        <a href="../controllers/controlProductoAdd.php">Dar de alta Producto</a>
        <a href="../controllers/controlProducto.php">Consultar Stock</a>
        <a href="../controllers/controlStock.php">Coger Producto</a>
    </nav>
    <div class="container">
        <button onclick="window.location.href='controlInicio.php'">Volver</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($operaciones)) {
                    foreach ($operaciones as $operacion) : ?>
                        <tr>
                            <td data-label="Usuario"><?= $operacion['nombre_usuario'] ?></td>
                            <td data-label="Producto"><?= $operacion['NOMBRE'] ?></td>
                            <td data-label="Cantidad"><?= $operacion['cantidad'] ?></td>
                            <td data-label="Fecha"><?= $operacion['fecha'] ?></td>
                        </tr>
                <?php endforeach;
                }  ?>
            </tbody>
        </table>
    </div>
</body>

</html>