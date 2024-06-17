<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/sty2.css">
</head>
<body>
    <nav>
        <a href="../controllers/controlProducto.php">Consultar Stock</a>
        <a href="../controllers/controlStock.php">Coger Producto</a>
        <a href="../controllers/controlHistorial.php">Consultar Historial</a>
    </nav>

    <div class="container">
        <button onclick="window.location.href='controlInicio.php'">Volver</button>

        <h1>Agregar Nuevo Producto</h1>
        <form id="agregarForm" action="controlProductoAdd.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria" id="categoria" required>
                    <option value="">Selecciona una categoría</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group" id="subcategoria-group" style="display: none;">
                <label for="subcategoria">Subcategoría:</label>
                <select name="subcategoria" id="subcategoria" required>
                    <option value="">Selecciona una subcategoría</option>
                </select>
            </div>
            <div class="form-group" id="subsubcategoria-group" style="display: none;">
                <label for="subsubcategoria">Subsubcategoría:</label>
                <select name="subsubcategoria" id="subsubcategoria">
                    <option value="">Selecciona una subsubcategoría</option>
                </select>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <textarea name="observaciones" id="observaciones"></textarea>
            </div>
            <div class="form-group">
                <label for="tamano">Tamaño:</label>
                <input type="text" name="tamano" id="tamano">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" name="color" id="color">
            </div>
            <div class="form-group">
                <label for="stock_inicial">Stock Inicial:</label>
                <input type="number" name="stock_inicial" id="stock_inicial">
            </div>
            <button type="submit">Agregar Producto</button>
        </form>
    </div>

    <script src="../js/scriptAddProducto.js"></script>
</body>
</html>
