<?php
session_start();
include "includes/db_connection.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_rol"] != 1) {
    header("Location: index.php");
    exit;
}

// Procesar cambio de estado
if (isset($_POST["pedido_id"]) && isset($_POST["nuevo_estado"])) {
    $sqlUpdate = "UPDATE pedidos SET estado = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("si", $_POST["nuevo_estado"], $_POST["pedido_id"]);
    $stmtUpdate->execute();
}

// Traer pedidos
$sql = "
    SELECT p.id, p.descripcion, p.estado, p.fecha, p.imagen,
           u.usuario AS usuario, u.email,
           pr.nombre AS producto
    FROM pedidos p
    JOIN usuarios u ON p.usuario_id = u.id
    JOIN productos pr ON p.producto_id = pr.id
    ORDER BY p.fecha DESC
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos - Estampados Beetle</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
</head>
<body>

<header class="header">
    <div class="container-logoAdmin">
        <a href="index.php">
            <img src="imgs/EstampadosBeetle.png" alt="Logo">
            <h1>Estampados Beetle</h1>
        </a>
        <a href="admin_panel.php">Volver al Panel</a>
    </div>
</header>

<main class="container-mainAdmin">
    <h2 style="text-align:center;">Administración de Pedidos</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Producto</th>
                <th>Estampado</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>

                    <td><?php echo htmlspecialchars($row["usuario"]); ?></td>

                    <td><?php echo htmlspecialchars($row["email"]); ?></td>

                    <td><?php echo htmlspecialchars($row["producto"]); ?></td>

                    <td>
                        <img class="estampado-preview"
                             src="uploads/<?php echo $row["imagen"]; ?>"
                             alt="Imagen">
                    </td>

                    <td><?php echo htmlspecialchars($row["descripcion"]); ?></td>

                    <td>
                        <span class="estado <?php echo $row["estado"]; ?>">
                            <?php echo ucfirst($row["estado"]); ?>
                        </span>
                    </td>

                    <td><?php echo $row["fecha"]; ?></td>

                    <td>
                        <form method="POST">
                            <input type="hidden" name="pedido_id" value="<?php echo $row["id"]; ?>">

                            <select name="nuevo_estado">
                                <option value="pendiente" <?php if($row["estado"]=="pendiente") echo "selected"; ?>>Pendiente</option>
                                <option value="confirmado" <?php if($row["estado"]=="confirmado") echo "selected"; ?>>Confirmado</option>
                                <option value="cancelado" <?php if($row["estado"]=="cancelado") echo "selected"; ?>>Cancelado</option>
                            </select>

                            <button type="submit">Actualizar</button>
                        </form>
                    </td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</main>

</body>
</html>
