<?php
session_start();
include "includes/db_connection.php";
if(!isset($_SESSION['usuario_id']) || $_SESSION["usuario_rol"] != 1){
    header("Location: index.php");
}

if (!isset($_GET["id"])) {
    die("ID inválido.");
}

$id = $_GET["id"];
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

if (!$producto) {
    die("Producto no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
    </head>

    <body>

    <div class="editForm-container">

        <h2>Editar Producto ID <?php echo $producto["id"]; ?></h2>

        <form action="scripts/db_updateProduct.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>">

            <label>Descripción</label>
            <textarea name="descripcion"><?php echo $producto['descripcion']; ?></textarea>

            <label>Precio</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>">

            <label>Destacado (0-1)</label>
            <input type="number" name="destacado" min="0" max="1" value="<?php echo $producto['destacado']; ?>">

            <label>Stock</label>
            <input type="number" name="stock" value="<?php echo $producto['stock']; ?>">

            <label>Estado (0-1)</label>
            <input type="number" name="estado" min="0" max="1" value="<?php echo $producto['estado']; ?>">

            <label>Imagen actual</label>
            <img src="<?php echo $producto['imagen']; ?>">

            <label>Nueva imagen (opcional)</label>
            <input type="file" name="imagen">

            <button type="submit">Actualizar</button>
        </form>

    </div>

    </body>
</html>