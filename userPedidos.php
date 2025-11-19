<?php
session_start();
include "includes/db_connection.php";

// Verifico login
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION["usuario_id"];

$sql = "SELECT p.id, p.descripcion, p.estado, p.fecha, p.imagen, pr.nombre AS producto
        FROM pedidos p
        JOIN productos pr ON p.producto_id = pr.id
        WHERE p.usuario_id = ?
        ORDER BY p.fecha DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos - Estampados Beetle</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
</head>
<body>

<header class="header">
    <div class="container-logo">
        <a href="index.php">
            <img src="imgs/EstampadosBeetle.png" alt="Logo">
            <h1>Estampados Beetle</h1>
        </a>
    </div>
    <div class="container-navbar">
        <nav class="navbar">
            <ul class="navbar-menu">
                <li><a href="index.php"><b>Inicio</b></a></li>
                <li><a href="listado_box.php"><b>Productos</b></a></li>
                <li><a href="contacto.php"><b>Contacto</b></a></li>
            </ul>

            <div class="container-login">
                <div class="container-userLogIn">
                    <div class="userLogIn">
                        <img src="imgs/user.png" alt="usuario">
                        <p><?php echo $_SESSION["usuario_nombre"]; ?></p>
                    </div>
                    <ul class="user-menu">
                        <li><a href="userPedidos.php">Mis Pedidos</a></li>
                        <li><a href="scripts/db_logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<main class="pedidos-container">
    <h2>Mis Pedidos</h2>

    <?php if (isset($_GET["ok"])): ?>
        <div style="background:#d4edda;color:#155724;padding:10px;border-radius:5px;margin-bottom:20px;">
            ✔ Pedido realizado con éxito.
        </div>
    <?php endif; ?>

    <?php if ($result->num_rows === 0): ?>
        <p>No realizaste ningún pedido todavía.</p>
    <?php else: ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="pedido-card">
                <img src="uploads/<?php echo $row["imagen"]; ?>" alt="Estampado">

                <div class="pedido-info">
                    <h3><?php echo htmlspecialchars($row["producto"]); ?></h3>

                    <p><b>Descripción:</b> <?php echo htmlspecialchars($row["descripcion"]); ?></p>

                    <p>
                        <b>Estado:</b>
                        <span class="estado <?php echo $row["estado"]; ?>">
                            <?php echo ucfirst($row["estado"]); ?>
                        </span>
                    </p>

                    <small>Fecha: <?php echo $row["fecha"]; ?></small>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

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
