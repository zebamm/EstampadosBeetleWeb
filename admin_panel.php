<?php
session_start();
include "includes/db_connection.php";
if(!isset($_SESSION['usuario_id']) || $_SESSION["usuario_rol"] != 1){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estampados Beetle - Panel de Administración</title>
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="header">
        <div class="container-logoAdmin">
            <a href="index.php">
                <img src="imgs/EstampadosBeetle.png" alt="Estampados Beetle">
                <h1>Estampados Beetle</h1>
                <a href="index.php">Volver al sitio</a>
            </a>
        </div>

        <nav class="navbarAdmin">
            <div class="container-login">
                <div class="container-userLogIn">
                    <div class="userLogIn">
                        <img src="imgs/user.png" alt="usuario">
                        <p><?php echo htmlspecialchars($_SESSION["usuario_nombre"]); ?></p>
                    </div>
                    <ul class="user-menu">
                        <li><a href="scripts/db_logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="container-mainAdmin">
        <div class="container-usersAdmin">
            <h2>Gestion de Usuarios</h2>
            <ul class="adminList">
                <li><a href="admin_manageList.php?id=1">Administrar Usuarios</a></li>
            </ul>
        </div>
        <div class="container-usersAdmin">
            <h2>Gestion de Productos</h2>
            <ul class="adminList">
                <li><a href="admin_manageList.php?id=2">Adminsitrar Productos</a></li>
                <li><a href="admin_newProduct.php">Agregar un Nuevo Producto</a></li>
            </ul>
        </div>
        <div class="container-usersAdmin">
            <h2>Gestion de Correos</h2>
            <ul class="adminList">
                <li><a href="admin_manageList.php?id=3">Administrar Correos</a></li>
                <li><a href="#">Historial de correos enviados</a></li>
                <li><a href="#">Enviar Correo</a></li>
            </ul>
        </div>
    </main>
<script src="scripts/scripts.js"></script>
</body>
</html>