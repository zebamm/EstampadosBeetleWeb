<?php
session_start();
include "../includes/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $clave = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    //Verifico si existe el usuario
    if($resultado->num_rows > 0){
        $usuario = $resultado->fetch_assoc();

        //Verifico la clave
        if(password_verify($clave, $usuario["contraseña"])){
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["usuario_nombre"] = $usuario["usuario"];

            header("Location: ../index.php");
            exit;
        }else {
            $_SESSION['error'] = "Contraseña Incorrecta";
            header("Location: ../login.php");
            exit();
        }
    }else {
        $_SESSION['error'] = "Usuario Inexistente";
        header("Location: ../login.php");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>