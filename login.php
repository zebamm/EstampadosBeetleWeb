<?php
session_start();
//Redirecciono al index en caso de que ya este iniciada una sesion
if (isset($_SESSION["usuario_id"])){
    header("Location: index.php");
};
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
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container-form">
            <h2 class="heading-1">Iniciar Sesión</h2>
            <form class="login-form" action="scripts/db_login.php" method="POST">
                <label for="email">Correo Electronico</label>
                <input type="text" name="email" placeholder="Correo Electronico" required>
                <label for="password">Contraseña</label>
                <input type="password" id="clave" name="password" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <?php
            // Manejo de mensajes de error
                if (isset($_SESSION['error'])):
            ?>
                <div class="alerta-error">
                    <?php echo $_SESSION['error']; ?>
                </div>
            <?php
                unset($_SESSION['error']); // borramos el error
                endif;
            ?>
            <p>¿No tienes cuenta? <a href="registro.php">Registrate Aquí</a></p>
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