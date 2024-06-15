<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reducir Stock de Producto</title>
    <link rel="stylesheet" href="../css/sty2.css">
</head>

<body>
    <nav>
        <a href="../controllers/controlStock.php">Consultar Stock</a>
        <a href="../controllers/controlProducto.php">Coger Producto</a>
        <a href="../controllers/controlHistorial">Consultar Historial</a>
    </nav>
    <div class="container">
        <button onclick="window.location.href='controlInicio.php'"> Volver</button>
        <h1>Reducir Stock de Producto</h1>

        <form id="filterForm" action="controlStock.php" method="get">
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria" id="categoria" required>
                    <option value="">Selecciona una categoría</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id'] ?>" <?= isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id'] ? 'selected' : '' ?>><?= $categoria['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subcategoria">Subcategoría:</label>
                <select name="subcategoria" id="subcategoria" required>
                    <option value="">Selecciona una subcategoría</option>
                </select>
            </div>
            <button type="submit">Buscar</button>
        </form>

        <?php if (!empty($productos)) : ?>
            <h2>Productos Disponibles</h2>
            <form id="reducirStockForm" action="controlStock.php" method="post">
                <div class="form-group">
                    <label for="producto">Producto:</label>
                    <select name="producto" id="producto" required>
                        <option value="">Selecciona un producto</option>
                        <?php foreach ($productos as $producto) : ?>
                            <option value="<?= $producto['id'] ?>"><?= $producto['nombre'] ?> (Stock: <?= $producto['stock_actual'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" min="1" required>
                </div>
                <button type="submit">Reducir Stock</button>
            </form>
        <?php endif; ?>
    </div>
    <script src="../js/scriptStock.js">
        <?php if (isset($_GET['categoria'])) : ?>
            document.getElementById('categoria').dispatchEvent(new Event('change'));
        <?php endif; ?>
    </script>

</body>

</html>