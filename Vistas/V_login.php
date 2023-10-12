<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amor & Moda</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="../Estilos/styleLogin.css">

</head>

<body>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="./navbar.php">
        <img src="../img/logo.png" class="logo" width="13%" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>    
    <div class="icono-y-texto">
        <i class="fas fa-user" style="margin-right: 5%;"></i>
        <a class="navbar-brand" style="background-color: #000000;" href="../Vistas/V_registrarse.php" > Registrate</a>
    </div>
    <a class="navbar-brand" style="background-color: #000000; margin-left: 1%;" href="../index.php">Home </a>
    <a class="navbar-brand" style="background-color: #000000; margin-left: 1%;" href="../Controlador/C_cerrarSesion.php">Cerrar Sesion </a>
</nav>

    <br><br><br><br>

    <main class="row">
        <section class="col-md" id="panel-right">
            <div class="container">

                <h5 class="col-12 text-center" id="checkCuentaCreada" style="color:darkgreen; display:none;">¡Tu cuenta fue creada con éxito! <i class="fas fa-check-circle" aria-hidden="true"></i></h5>
                <h5 class="col-12 text-center" id="datosIncorrectos" style="color:crimson; display:none;">Los datos ingresados son incorrectos <i class="fa fa-exclamation-circle" aria-hidden="true"></i></h5>


                <br><br>
                <div class="row mb-5">
                    <h2 class="col-12 text-center">Iniciar sesión</h2>
                </div>
                <div class="row">
                    <form action="../Controlador/C_login.php" class="col-12 col-md-8 offset-md-2" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                        </div>
                        <br>
                        <div class="form-group text-center pt-4">
                            <input type="submit" class="btn btn-primary" value="Ingresar">
                        </div>
                    </form>
                </div>
                <div class="row mt-5">
                    <div class="col-12 links text-center">
                        <div>
                            <a href="../Vistas/V_error.php">Olvide mi contraseña</a>
                        </div>
                        <div>
                            <a href="../Vistas/V_registrarse.php">Crear cuenta</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>