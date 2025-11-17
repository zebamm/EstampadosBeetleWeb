<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estampados Beetle - Productos</title>
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="header">
        <div class="container-logo">
            <a href="index.php">
                <img src="imgs/EstampadosBeetle.png" alt="Estampados Beetle">
                <h1>Estampados Beetle</h1>
            </a>
        </div>

        <div class="container-navbar">
            <nav class="navbar">
                <img class="navbar-hamburguer" src="imgs/navbar_hamburguer.png" alt="Abrir Menu">
                <ul class="navbar-menu">
                    <li><b><a href="index.php">Productos Destacados</a></b></li>
                    <li><b><a href="listado_box.php">Listado de Productos</a></b></li>
                    <li><b><a href="contacto.php">Contacto</a></b></li>
                </ul>
                <div class="container-login">
                    <?php if(!isset($_SESSION["usuario_id"])): ?>
                        <b><a href="login.php">
                            <img src="imgs/user.png" alt="usuario">
                            Iniciar Sesión
                        </a></b>
                    <?php else: ?>
                        <div class="container-userLogIn">
                            <div class="userLogIn">
                                <img src="imgs/user.png" alt="usuario">
                                <p><?php echo htmlspecialchars($_SESSION["usuario_nombre"]); ?></p>
                            </div>
                            <ul class="user-menu">
                                <li><a href="userPedidos.php">Mis Pedidos</a></li>
                                <li><a href="scripts/db_logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="boxList">
            <h1 class="heading-1">Nuestros Productos</h1>
            <a href="listado_tabla.php">Mostrar Listado Tabla</a>
            <div class="container-box">
                <div class="box-product">
                    <img src="imgs/TazaCeramicaNacional.png" alt="Taza de Ceramica">
                    <h2>Taza Ceramica Nacional</h2>
                    <p><strong>$8000</strong></p>
                    <a href="producto.html?id=1">Ver más</a>
                </div>
                <div class="box-product">
                    <img src="imgs/BotellaHomero.png" alt="Botella de Plastico">
                    <h2>Botella de Plastico 500cc</h2>
                    <p><strong>$16000</strong></p>
                    <a href="producto.html?id=2">Ver más</a>
                </div>
                <div class="box-product">
                    <img src="imgs/botellaAluminio.png" alt="Botella de Aluminio">
                    <h2>Botella de Aluminio 500cc</h2>
                    <p><strong>$18000</strong></p>
                    <a href="producto.html?id=3">Ver más</a>
                </div>
                <div class="box-product">
                    <img src="imgs/tazaPlastico.png" alt="Taza de Plastico">
                    <h2>Taza de Plastico</h2>
                    <p><strong>$4000</strong></p>
                    <a href="producto.html?id=4">Ver más</a>
                </div>
                <div class="box-product">
                    <img src="imgs/vasoCafe.png" alt="Vaso de Café">
                    <h2>Vaso de Café</h2>
                    <p><strong>$8000</strong></p>
                    <a href="producto.html?id=5">Ver más</a>
                </div>
                <div class="box-product">
                    <img src="imgs/mateChico.png" alt="Mate de Ceramica">
                    <h2>Mate Chico de Ceramica</h2>
                    <p><strong>$9000</strong></p>
                    <a href="producto.html?id=6">Ver más</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container-footer">
            <p class="footer-title">Información de Contacto</p>
            <ul>
                <li>Telefono: 123-456-789</li>
                <li>Email: sebamatiasmonzon@gmail.com</li>
            </ul>
        </div>
        <div class="copyright">
            <p>Estampados Beetle &copy; 2025</p>
        </div>
    </footer>

    <script src="scripts/scripts.js"></script>
</body>
</html>