<?php
include("../../config/databases.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---BOOSTRAP------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Clinica la Bendición</title>


    <!-- BARRA DENAVEGACION-->
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand text-light" href="/Proyecto_Clinica/views/inicio/index.php">CLINICA LA BENDICION</a>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active text-light" href="../inicio/index.php"><i class="fas fa-undo"></i></a>
                        </a>
                    </div>
                </div>
            </div>

        </nav>
    </div>

</head>

<body>




    <h1 class="text-center text-primary bg-light">Creación de solicitud de muestra medica</h1>

    <div class="portada p-4">

        <div class="container text-secondary">
            <div class="row vh-80 justify-content-center align-items-center ">
                <div class=" col-auto">



                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php unset($_SESSION['message']);
                    } ?>





                    <form class="card card-body" action=" ../../models/SolicitudModelo.php" method="POST">
                        <div class="form-group">
                            <h6>Elija el tipo de usuario: </h6>

                            <select class="form-control text-secondary" name="tipo_usu" require>
                                <option value="">Seleccione una opción</option>
                                <option value="IN">IN-Usuario interno</option>
                                <option value="EX">EX-Usuario externo</option>
                            </select>

                        </div>
                        <br>
                        <div class="form-group ">
                            <h6>Elija el tipo de solicitud: </h6>
                            <select class="form-control text-secondary" name="tipo_solicitud" require>
                                <option value="">Seleccione una opción</option>
                                <option value="MM">MM-Muestra medica</option>
                                <option value="LQ">LQ-Laboratorio </option>
                            </select>
                        </div>
                        <br>
                        <h6> Descripción: </h6>
                        <div class="form-group">
                            <textarea minlength="10" maxlength="2001" type="text" name="descripcion" class="form-control" require></textarea>
                        </div>
                        <br>


                        <h6> No. Expediente: </h6>
                        <input type="text" name="expediente" id="exp" class="form-control" placeholder="0000-00-00-00-0000000000" pattern="[0-9]{4}-[0-9]{2}-[0-9]{1}-[0-9]{2}-[0-9]{7-10}" title="Numero de expediente incorrecto" require>
                        <br>
                        <a type="submit" id="search" class="btn btn-outline-primary " onclick="mostrar()" name="expediente"><i class="fas fa-search">¿?</i></a>

                        <br>

                        <button type="submit" class="btn btn-outline-primary  " name="Crear_Solicitud" onclick="return confirmar_solicitud()"><i class="fas fa-file-import"></i></button>

                    </form>
                    <div class="card card-body" id="search_expediente">
                        <h5>Buscar Expediente</h5>
                        <div class="form-group">
                            <form action="../../models/SolicitudModelo.php" method="POST">
                                <h6>Ingrese su numero de CUI: </h6>
                                <input type="text" required name="DPI" class="form-control" placeholder="0000 00000 0000"> </input>
                                <br>

                                <button type="submit" name="buscar_dpi" class="btn btn-outline-primary btn-sm " id="exp_buscar">Buscar</button>

                                <button class="btn btn-outline-primary btn-sm" id="exp_cancelar" name="regresar" onclick="ocultar()">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!--SCRIPTS -->



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../controllers/java_script/formularioSolicitud.js"></script>
</body>

</html>