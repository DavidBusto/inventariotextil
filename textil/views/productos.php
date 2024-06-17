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
        <a href="../controllers/controlProductoAdd.php">Dar de alta producto</a>
        <a href="../controllers/controlStock.php">Coger Producto</a>
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
                        <option value="<?= $categoria['id'] ?>" <?= isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id'] ? 'selected' : '' ?>>
                            <?= $categoria['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group" id="subcategoria-group" <?= isset($subcategorias) && !empty($subcategorias) ? 'style="display: block;"' : 'style="display: none;"' ?>>
                <label for="subcategoria">Subcategoría:</label>
                <select name="subcategoria" id="subcategoria">
                    <option value="">Selecciona una subcategoría</option>
                    <?php if (!empty($subcategorias)) : ?>
                        <?php foreach ($subcategorias as $subcategoria) : ?>
                            <option value="<?= $subcategoria['id'] ?>" <?= isset($_GET['subcategoria']) && $_GET['subcategoria'] == $subcategoria['id'] ? 'selected' : '' ?>>
                                <?= $subcategoria['nombre'] ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group" id="subsubcategoria-group" style="display: none;">
                <label for="subsubcategoria">Subsubcategoría:</label>
                <select name="subsubcategoria" id="subsubcategoria">
                    <option value="">Selecciona una subsubcategoría</option>
                </select>
            </div>

            <div class="form-group" id="color-group" style="display: none;">
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
            <div class="table-container">
              <?php foreach ($productos as $producto) : ?>
    <fieldset>
        <legend><?= $producto['nombre'] ?></legend>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td><?= $producto['id'] ?></td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td><?= $producto['descripcion'] ?></td>
                </tr>
                <tr>
                    <th>Stock Inicial</th>
                    <td><?= $producto['stock_inicial'] ?></td>
                </tr>
                <tr>
                    <th>Stock Actual</th>
                    <td><?= $producto['stock_actual'] ?></td>
                </tr>
                <tr>
                    <th>Tamaño</th>
                    <td><?= $producto['tamano'] ?></td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td><?= $producto['color'] ?></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
<?php endforeach; ?>

            </div>
        <?php else : ?>
        <?php endif; ?>
    </div>

    <script src="../js/scriptProductos.js"></script>
</body>
</html>
