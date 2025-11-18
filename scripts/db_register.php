<?php
session_start();
include "../includes/db_connection.php";
	
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $nombre = $_POST["name"];
    $clave = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    //Verifico si ya existe el email en la bdd
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if($resultado->num_rows > 0){
        $_SESSION['error'] = "El email ya esta registrado";
        header("Location: ../registro.php");
        exit();
    }
    
    //Si todo va bien, hago la inyeccion en la bdd
    $sql = "INSERT INTO usuarios (email, usuario, contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $nombre, $clave);
    
    //Verifico si salio todo bien
    if($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "ERROR: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>