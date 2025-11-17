<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estampados Beetle</title>
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

    <section class="banner">
        <div class="content-banner">
            <h2>Estampados Beetle</h2>
            <h3>Diseños para personalizar tu día a día</h3>
            <p>¿Quieres un diseño único que no ves en ninguna parte? ¡Contacta con nosotros para hacerlo realidad!</p>
            <a href="contacto.php">Contacto</a>
        </div>
    </section>

    <main class="main-content">
        <section class="container_top-products">
            <h2 class="heading-1">Productos Destacados</h2>
            <div class="container-products">
                <a href="producto.html?id=1">
                    <div class="card-product product-TazaCeramicaNacional">
                        <p>Taza Cerámica Nacional</p>
                        <span>Ver más</span>
                    </div>
                </a>

                <a href="producto.html?id=2">
                    <div class="card-product product-BotellaPlastico">
                        <p>Botella de Plastico 500cc</p>
                        <span>Ver más</span>
                    </div>
                </a>

                <a href="producto.html?id=3">
                    <div class="card-product product-BotellaAluminio">
                        <p>Botella de Aluminio 500cc</p>
                        <span>Ver más</span>
                    </div>
                </a>
            </div>
        </section>

        <section class="container-process">
            <div class="process">
                <h2>¿Cómo lo hacemos?</h2>
                <p>Estampamos todos nuestros productos a mano utilizando DTF UV para que tengan la mejor calidad posible y aguanten cualquier ambiente. Pueden mojarse y llevarse en cualquier bolso sin ningún problema</p>
            </div>
            <img src="imgs/BotellaHomero.png" alt="Botella con Homero en un arbusto">
        </section>

        <section class="container_new-products">
            <h2 class="heading-1">Nuevos Productos</h2>
            <div class="container-products">
                <a href="producto.html?id=4">
                    <div class="card-product product-TazaPlastico">
                        <p>Taza de Plastico</p>
                        <span>Ver más</span>
                    </div>
                </a>

                <a href="producto.html?id=5">
                    <div class="card-product product-VasoCafe">
                        <p>Vaso para café de Cerámica</p>
                        <span>Ver más</span>
                    </div>
                </a>

                <a href="producto.html?id=6">
                    <div class="card-product product-MateChico">
                        <p>Mate Chico</p>
                        <span>Ver más</span>
                    </div>
                </a>
            </div>
        </section>
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