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
        <a href="../controllers/controlStock.php">Consultar Stock</a>
        <a href="../controllers/controlProducto.php">Coger Producto</a>
        <a href="../controllers/controlHistorial.php">Consultar Historial</a>
    </nav>
    <div class="container">
        <button onclick="window.location.href='controlInicio.php'">Volver</button>
        <h1>Productos</h1>
        <form action="controlProducto.php" method="get">
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria" id="categoria">
                    <option value="">Selecciona una categoría</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id'] ?>" <?= isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id'] ? 'selected' : '' ?>><?= $categoria['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group" id="subcategoria-group" <?= isset($subcategorias) && !empty($subcategorias) ? 'style="display: block;"' : 'style="display: none;"' ?>>
                <label for="subcategoria">Subcategoría:</label>
                <select name="subcategoria" id="subcategoria">
                    <option value="">Selecciona una subcategoría</option>
                    <?php if (!empty($subcategorias)) : ?>
                        <?php foreach ($subcategorias as $subcategoria) : ?>
                            <option value="<?= $subcategoria['id'] ?>" <?= isset($_GET['subcategoria']) && $_GET['subcategoria'] == $subcategoria['id'] ? 'selected' : '' ?>><?= $subcategoria['nombre'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group" id="color-group" <?= isset($colores) && !empty($colores) ? 'style="display: block;"' : 'style="display: none;"' ?>>
                <label for="color">Color:</label>
                <select name="color" id="color">
                    <option value="">Selecciona un color</option>
                    <?php if (!empty($colores)) : ?>
                        <?php foreach ($colores as $color) : ?>
                            <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" name="submit">Buscar</button>
        </form>

        <?php if (!empty($productos)) : ?>
            <h2>Productos Disponibles</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stock Inicial</th>
                        <th>Stock Actual</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <td><?= $producto['id'] ?></td>
                            <td><?= $producto['nombre'] ?></td>
                            <td><?= $producto['descripcion'] ?></td>
                            <td><?= $producto['stock_inicial'] ?></td>
                            </td>
                            <td><?= $producto['stock_actual'] ?></td>
                            <td><?= $producto['color'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>

        <?php endif; ?>
    </div>

    <script src="../js/scriptProductos.js">
    </script>
</body>

</html>