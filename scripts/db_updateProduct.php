<?php
include "../includes/db_connection.php";

if(!isset($_SESSION['usuario_id']) || $_SESSION["usuario_rol"] != 1){
    header("Location: ../index.php");
    exit;
}

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$destacado = $_POST["destacado"];
$stock = $_POST["stock"];
$estado = $_POST["estado"];

// Si suben imagen nueva
if (!empty($_FILES["imagen"]["name"])) {

    $nombreImagen = "producto_" . $id . "_" . time() . ".jpg";
    $ruta = "../../imgs/" . $nombreImagen;

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    // Actualizar también la imagen
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, destacado=?, stock=?, estado=?, imagen=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdiiisi", $nombre, $descripcion, $precio, $destacado, $stock, $estado, $nombreImagen, $id);

} else {
    // Sin nueva imagen
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, destacado=?, stock=?, estado=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdiiis", $nombre, $descripcion, $precio, $destacado, $stock, $estado, $id);
}

$stmt->execute();
$stmt->close();

header("Location: ../admin_manageList.php?success=1");
exit;
?>