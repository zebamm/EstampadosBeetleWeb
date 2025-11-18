<?php
session_start();
include "includes/db_connection.php";
if(!isset($_SESSION['usuario_id']) || $_SESSION["usuario_rol"] != 1){
    header("Location: index.php");
}

if (!isset($_GET["id"])) die("ID inválido.");

$id = $_GET["id"];

$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if (!$usuario) die("Usuario no encontrado.");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body>
    <div class="editForm-container">
        <h2>Editar Usuario ID <?php echo $usuario["id"]; ?></h2>

        <form action="scripts/db_updateUser.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <label>Usuario</label>
            <input type="text" value="<?php echo $usuario['usuario']; ?>" disabled>

            <label>Correo Electrónico</label>
            <input type="email" value="<?php echo $usuario['email']; ?>" disabled>

            <label>Rol</label>
            <select name="rol">
                <option value="0" <?php if($usuario['rol']==0) echo "selected"; ?>>Usuario</option>
                <option value="1" <?php if($usuario['rol']==1) echo "selected"; ?>>Administrador</option>
            </select>

            <label>Estado</label>
            <select name="estado">
                <option value="1" <?php if($usuario['estado']==1) echo "selected"; ?>>Activo</option>
                <option value="0" <?php if($usuario['estado']==0) echo "selected"; ?>>Desactivado</option>
            </select>

            <button type="submit">Actualizar</button>
        </form>
    </div>
    </body>
</html>