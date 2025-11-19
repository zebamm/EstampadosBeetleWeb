<?php
session_start();
include "includes/db_connection.php";

//Verificamos que el usuario este logueado
if(!isset($_SESSION["usuario_id"])){
    header("Location: login.php");
}

$sql = "SELECT id, nombre FROM productos WHERE estado = 1 AND stock > 0";
$result = $conn->query($sql);
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
            <a href="index.html">
                <img src="imgs/EstampadosBeetle.png" alt="Estampados Beetle">
                <h1>Estampados Beetle</h1>
            </a>
        </div>

        <div class="container-navbar">
            <nav class="navbar">
                <img class="navbar-hamburguer" src="imgs/navbar_hamburguer.png" alt="Abrir Menu">
                <ul class="navbar-menu">
                    <li><b><a href="index.html">Productos Destacados</a></b></li>
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
        <div class="container-form">
        <h2>Formulario de Pedido de Compra</h2>
        <form  id="formCompra" action="scripts/procesarCompra.php" enctype="multipart/form-data" method="POST">
            <label for="provincia">Provincia:</label>
            <select id="provincia" name="provincia" required>
                <option value="">Seleccionar provincia</option>
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="CABA">CABA</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Ríos">Entre Ríos</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquén">Neuquén</option>
                <option value="Río Negro">Río Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucumán">Tucumán</option>
            </select>

            <label for="ciudad">Ciudad / Localidad:</label>
            <input type="text" id="ciudad" name="ciudad" placeholder="Ej: Rosario, Godoy Cruz, Quilmes" required>

            <label for="direccion">Dirección de entrega:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="instrucciones">Instrucciones de entrega:</label>
            <textarea name="instrucciones" id="instrucciones" rows="4" placeholder="Ej: Casa de portón verde oscuro / Edificio X apartamento 31"></textarea>

            <label for="producto">Producto:</label>
            <select id="producto" name="producto" required>
                <option value=""><?php echo $_GET["id"]; ?></option>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['nombre']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="cantidad">Estampado:</label>
            <input type="file" name="imagen" accept="image/jpeg, image/png, image/jpg">

            <label for="descripcion">Explicá cómo querés que vaya el estampado:</label>
            <textarea id="descripcion" name="descripcion" rows="4" placeholder="Ej: Quiero la imagen centrada, en tamaño grande, ocupando casi toda la taza." required></textarea>

            <button type="submit">Confirmar Pedido</button>
        </form>
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