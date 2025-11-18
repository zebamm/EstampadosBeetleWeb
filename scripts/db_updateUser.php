<?php
session_start();
include "../includes/db_connection.php";

if(!isset($_SESSION['usuario_id']) || $_SESSION["usuario_rol"] != 1){
    header("Location: ../index.php");
    exit;
}

$id = $_POST["id"];
$rol = $_POST["rol"];
$estado = $_POST["estado"];

$sql = "UPDATE usuarios SET rol = ?, estado = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $rol, $estado, $id);

if ($stmt->execute()) {
    header("Location: ../admin.php?success=usuario_actualizado");
} else {
    echo "Error al actualizar usuario.";
}
