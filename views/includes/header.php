<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---BOOSTRAP------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>
    <title>Clinica la Bendición</title>
</head>

<body>

    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/proyecto_clinica/views/inicio/index.php">CLINICA LA BENDICION</a>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                                <!-- Default dropleft button -->
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <img src="../images/user.png"
                                        width="50"
                                        height="50">
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Dropdown menu links -->
                                        <h7>Usuario:</h7>
                                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" >
                                        <h7>Contraseña:</h7>
                                        <input type="Password" name="contraseña" class="form-control" placeholder="Contraseña" >
                                        <input type="submit md-5" class="btn btn-success " name="Crear" value=" Sign in" >
                                        <input type="submit md-5" class="btn btn-success " name="Crear" value="SIN Usuario" >
                                        </div>
                                </div>
                    <a class="nav-item nav-link active" href="../Expedientes/expedientes.php">CREAR EXPEDIENTE <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="#">ANALISIS TECNICO <span class="sr-only">(current)</span></a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <h8> MANTENIMIENTO DE SOLICITUDES </h8>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../solicitud/solicitud.php">CREAR SOLICITUD</a>
                                <a class="dropdown-item" href="#">Buscar SOLICITUD</a>
                                <a class="dropdown-item" href="../Creacion_Muestras/Vista_Muestras.php">CREAR MUESTRA MEDICA</a>
                            </div>
                        </li>
                        </a>
                    </div>
                    <!-- Default dropleft button -->
                    </div>
                </div>
              
            </div>


        </nav>
    </div>