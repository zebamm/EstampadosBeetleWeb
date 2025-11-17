<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "";
$dbname = "tiendabeetle";

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

//echo "Conexión exitosa a la base de datos.";
?>