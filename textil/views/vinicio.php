<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Textil Moda</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>

<body>
    <header class="header">
        <div class="logo" onclick="openNav()"><i class="bi bi-list"></i></div>

        <div class="welcome-container">
            <div class="welcome-message">
                <?php datosCliente(); ?>
            </div>
            <div class="date" id="current-date"></div>
        </div>

        <form action="" method="post">
            <button class="Btn form-btn" name="salir">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text"></div>
            </button>
        </form>
    </header>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="controlProductoAdd.php">Dar de alta producto</a>
        <a href="controlProducto.php">Consultar Stock</a>
        <a href="controlStock.php">Coger Producto</a>
        <a href="controlHistorial.php">Historial</a>
        <a href="controlrol.php">Añadir Usuario</a>
    </div>

    <section class="menu">
        <div class="image-container">
            <a href="controlProductoAdd.php">
                <img src="../img/image-26.png" alt="">
                <div class="image-text">Dar de alta producto</div>
            </a>
        </div>
        <div class="image-container">
            <a href="controlProducto.php">
                <img src="../img/material.jpg" alt="">
                <div class="image-text">Consultar Stock</div>
            </a>
        </div>
        <div class="image-container">
            <a href="controlStock.php">
                <img src="../img/telas.jpeg" alt="">
                <div class="image-text">Coger Producto</div>
            </a>
        </div>
        <div class="image-container">
            <a href="controlHistorial.php">
                <img src="../img/taller.webp" alt="">
                <div class="image-text">Historial</div>
            </a>
        </div>
    </section>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.left = "0";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.left = "-250px";
        }
    </script>
    <script src="../js/script2.js"></script>
</body>

</html>