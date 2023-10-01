<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/style.css">
    <script src="https://kit.fontawesome.com/e5cc728d9d.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <script src="../Modelos/detalleProducto.js"></script>

  <nav class="navbar navbar-expand-lg navbarCustom">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">AMOR & MODA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-start" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">PRODUCTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">SUCURSAL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">COMO COMPRAR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <!-- Button trigger modal -->
<button type="button" class="botonModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fas fa-search"></i></a>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Que estas buscando?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div>
      <form class="ContenedorFormFiltrado" action="Controlador/C_filtrado.php" method= "POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name = "producto" />
    <div id="filtrado" class="form-text"></div>
    </div>

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Subir</button>
      </div>
    </div>
  </div>
</div>  
</form>

        </li>
        <li class="nav-item">
        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#carritoModal">
    <i class="fas fa-shopping-cart"></i>
</a>

        </li>
        
        <a class="nav-link" href="./Vistas/V_login.php">
        <i class="fas fa-user"></i>
        </a>

        <!-- <li class="nav-item">
          <a class="nav-link" href="./Vistas/V_login.php">login prueba</a>
        </li> -->
        
      </ul>
    </div>
  </div>
</nav>
<!-- Modal del Carrito -->
<div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carritoModalLabel">Tu Carrito de Compras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí puedes agregar la lista de productos en el carrito -->
                <ul>
               
                    <!-- Agrega más productos aquí -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Comprar</button>
            </div>
        </div>
    </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>