<?php
session_start();
include "includes/db_connection.php";
if(!isset($_SESSION['usuario_id']) || $_SESSION["usuario_rol"] != 1){
    header("Location: index.php");
}
$managerSelector = $_GET["id"];
if(isset($managerSelector)){
    switch($managerSelector){
        case 1:
            $sql = "SELECT * FROM usuarios";
            break;
        case 2:
            $sql = "SELECT * FROM productos";
            break;
        default:
            header("Location: admin_panel.php");
    }
}else{
    header("Location: admin_panel.php");
}
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estampados Beetle - Panel de Administración</title>
    <link rel="icon" type="image/png" href="imgs/EstampadosBeetle.png">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="header">
        <div class="container-logoAdmin">
            <a href="index.php">
                <img src="imgs/EstampadosBeetle.png" alt="Estampados Beetle">
                <h1>Estampados Beetle</h1>
                <a href="index.php">Volver al sitio</a>
            </a>
        </div>

        <nav class="navbarAdmin">
            <div class="container-login">
                <div class="container-userLogIn">
                    <div class="userLogIn">
                        <img src="imgs/user.png" alt="usuario">
                        <p><?php echo htmlspecialchars($_SESSION["usuario_nombre"]); ?></p>
                    </div>
                    <ul class="user-menu">
                        <li><a href="scripts/db_logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="container-mainAdmin">
        <div class="container-adminList">
            <?php switch($managerSelector):
                case 1:?>
                    <table class="adminTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Correo Electronico</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($rows = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><?php echo $rows['usuario']; ?></td>
                                <td><?php echo $rows['email']; ?></td>
                                <td><?php echo $rows['rol']; ?></td>
                                <td><?php echo $rows['estado']; ?></td>
                                <td><?php echo $rows['creado']; ?></td>
                                <td>
                                    <a class="btn-edit" href="admin_editUser.php?id=<?php echo $rows['id']; ?>">Editar</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php case 2: ?>
                    <table class="adminTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Destacado</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($rows = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $rows['id']; ?></td>
                                <td><img src="<?php echo $rows['imagen']; ?>" alt="<?php echo $rows['nombre']; ?>"></td>
                                <td><?php echo $rows['nombre']; ?></td>
                                <td><?php echo $rows['categoria']; ?></td>
                                <td><?php echo $rows['descripcion']; ?></td>
                                <td><?php echo $rows['precio']; ?></td>
                                <td><?php echo $rows['destacado']; ?></td>
                                <td><?php echo $rows['stock']; ?></td>
                                <td><?php echo $rows['estado']; ?></td>
                                <td><?php echo $rows['creado']; ?></td>
                                <td>
                                    <a class="btn-edit" href="admin_editProduct.php?id=<?php echo $rows['id']; ?>">Editar</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php endswitch; ?>
        </div>
    </main>
<script src="scripts/scripts.js"></script>
</body>
</html>