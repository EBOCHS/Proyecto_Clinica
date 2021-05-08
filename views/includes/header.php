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
<?php require ("../../config/databases.php");
?>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">CLINICA LA BENDICION</a>
            
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                    <div class="navbar-nav">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../images/user.png" width="50" height="50"><?php echo( $_SESSION['usuario']) ?> 
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../models/LoginModelo.php">Iniciar sesion</a>
                        <form action="../../models/LoginModelo.php" method="POST"; >
                        <button type="submit" class="btn "  name ="cerrar">Cerrar Sesion</button>
                        </form>        
                        </div>
                    </div>
                    
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Crear Expediente
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Tipo de usuario</a>
                            <form action="../../models/LoginModelo.php" method="POST"; >
                        <button type="submit" class="btn "  name ="Interno">Interno</button>
                        </form>  
                                <a class="dropdown-item" href="../Expedientes/expedientes.php">externo</a>
                            </div>
                        </li>
            
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                MANTENIMIENTO DE SOLICITUDES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../solicitud/solicitud.php">MANTENIMIENTO DE SOLICITUDES </a>
                                <a class="dropdown-item" href="../solicitud/solicitud.php">CREAR SOLICITUD</a>
                                <a class="dropdown-item" href="#">Buscar SOLICITUD</a>
                                <form action="../../models/MuestrasModelo.php" method="POST"; >
                                    <button type="submit" class="btn "  name ="Crear_muestra">Crear muestra medica</button>
                                </form> 
                            </div>
                        </li>

                        <a class="nav-item nav-link disabled" href="#">
                        </a>
                    </div>
                </div>
            </div>

        </nav>
    </div>