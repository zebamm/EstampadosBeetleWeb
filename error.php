<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estampados Beetle - Página no encontrada</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
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
        <div class="container-error">
                <h2>Página no encontrada</h2>
                <p>Parece ser que este enlace no existe más</p>
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
</body>
</html>