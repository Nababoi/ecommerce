<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Estilos/style.css">
    <!-- Después cambiar en el documento el nombre del producto -->
</head>
<body>
<?php require("../Vistas/navbar.php"); ?>

<div class="ContenedorProductos">
    <div class="container mt-4">
        <h1>CRUD de Productos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($datosProductosCrud)) { ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td>$<?php echo $fila['precio']; ?></td>
                        <td><?php echo $fila['categoriaNombre']; ?></td>
                        <td>
                            <a href="../Vistas/V_formProductoMod.php?id=<?php echo $fila['id'];?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt"></i> Editar
                            </a>
                            <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="../Vistas/V_formularioProducto.php" class="btn btn-success">Agregar Producto</a>
    </div>
</div>
</body>
</html>
