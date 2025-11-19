<?php
session_start();
include "../includes/db_connection.php";
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT id FROM pedidos WHERE usuario_id = ? AND estado = 'pendiente'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["usuario_id"]);
$stmt->execute();
$stmt->store_result();
$stmt->close();


$provincia = $_POST["provincia"];
$ciudad = $_POST["ciudad"];
$direccion = $_POST["direccion"];
$instrucciones = $_POST["instrucciones"];
$producto_id = $_POST["producto"];
$descripcion = $_POST["descripcion"];
$usuario_id = $_SESSION["usuario_id"];

if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {

    $maxSize = 2 * 1024 * 1024; // 2 MB
    $fileSize = $_FILES["imagen"]["size"];

    if ($fileSize > $maxSize) {
        die("La imagen es demasiado grande. Máximo permitido: 2MB");
    }

    $permitidos = ["image/jpeg", "image/png", "image/jpg"];

    if (!in_array($_FILES["imagen"]["type"], $permitidos)) {
        die("Formato inválido. Solo se permiten JPG y PNG.");
    }

    // Guardar archivo
    $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
    $rutaDestino = "../uploads/" . $nombreImagen;

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino);

} else {
    die("Error al subir la imagen.");
}


$sql = "INSERT INTO pedidos (usuario_id, producto_id, provincia, ciudad, direccion, instrucciones, descripcion, imagen, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pendiente')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissssss", $usuario_id, $producto_id, $provincia, $ciudad, $direccion, $instrucciones, $descripcion, $nombreImagen);
$stmt->execute();

$pedido_id = $stmt->insert_id;
$stmt->close();


$sql = "SELECT email, usuario FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($emailUsuario, $nombreUsuario);
$stmt->fetch();
$stmt->close();


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('sublimadosbeetle@gmail.com', 'Estampados Beetle');
    $mail->addAddress($emailUsuario);

    $mail->Subject = "Gracias por tu pedido #$pedido_id";
    $mail->Body = "Hola $nombreUsuario, recibimos tu pedido. Te avisaremos cuando esté confirmado.";

    $mail->send();

} catch (Exception $e) {
    echo "Error al enviar email al usuario.";
}

$mail2 = new PHPMailer(true);

try {
    $mail2->isSMTP();
    $mail2->Host = 'smtp.gmail.com';
    $mail2->SMTPAuth = true;
    $mail2->Username = '';
    $mail2->Password = '';
    $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail2->Port = 587;

    $mail2->setFrom('sublimadosbeetle@gmail.com');
    $mail2->addAddress("sebamatiasmonzon@gmail.com"); 

    $mail2->Subject = "Nuevo Pedido Realizado (#$pedido_id)";
    $mail2->Body = "Un usuario realizó un nuevo pedido. ID: $pedido_id.";

    $mail2->send();

} catch (Exception $e) {
    echo "Error al enviar email al administrador.";
}

header("Location: ../userPedidos.php?ok=1");
exit;
?>
