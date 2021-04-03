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
</head>

<body>
    <br>
    <div class="container p-4 card card-body">
        <h1 class="animate__fadeInUp">FORMULARIO DE SOLICITUD</h1>
        <h6>INGRESE LOS DATOS QUE SE LE SOLICITAN </h6>
        <div class="row">
            <div class="col col-md-5">
                <?php if (isset($_SESSION['mensaje'])) { ?>

                    <div class="alert alert-<?= $_SESSION['tipo']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php } ?>
                <?php session_unset(); ?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <h6>Elija el tipo de usuario: </h6>

                            <select class="form-control" name="comunidad" required>
                                <option value="">Seleccione una opción</option>
                                <option value="1">IN-Usuario interno</option>
                                <option value="2">EX-Usuario externo</option>
                            </select>

                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Elija el tipo de solicitud: </h6>
                            <select class="form-control" name="comunidad" required>
                                <option value="">Seleccione una opción</option>
                                <option value="1">MM-Muestra medica</option>
                                <option value="2">LQ-Laboratorio </option>
                            </select>
                        </div>
                        <br>
                        <h6> Descripción: </h6>
                        <div class="form-group">
                            <textarea required type="text" name="des" class="form-control"></textarea>
                        </div>
                        <br>
                        <h6> No. Expediente: </h6>
                        <div class="form-group card card-body">
                            <input required type="text" name="expediente" id="exp" class="form-control" placeholder="0000-00-00-00-0000000000" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{10}" title="Numero de expediente incorrecto"></input>
                            <br>
                            <button id="search" class="btn btn-secondary btn-sm" onclick="mostrar()"><i class="fas fa-search"> Buscar Expediente</i></button>
                        </div>

                        <br>
                        <input type="submit" class="btn btn-success btn-block" name="Guardar_Usuario" onclick="return confirmar_solicitud()">
                        <a href="/proyecto_clinica/views/solicitud/solicitud.php" class="btn btn-outline-danger">Volver</a>
                    </form>

                </div>
            </div>

            <div class="col col-md-6">

                <div class="card card-body" id="search_expediente">
                    <h5>Buscar Expediente</h5>
                    <div class="form-group">
                        <h6>Ingrese su numero de CUI: </h6>
                        <input required type="text" name="DPI" class="form-control"> </input>
                        <br>
                        <button class="btn btn-success" id="exp_buscar" onclick="mostrar_dat()">Buscar</button>
                        <button class="btn btn-secondary" id="exp_cancelar" onclick="ocultar()">Cancelar</button>
                    </div>



                </div>

                <div class="card card-body" id="datos_expediente">
                    <h5>Expediente:</h5>
                    <table class="table table-light">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Numero de CUI</th>
                                <th>Numero de Expediente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>ejemplo</td>
                            <td>456456</td>
                            <td>0000-00-00-00-000000000</td>
                        </tbody>

                    </table>
                    <div><button class="btn btn-outline-danger" id="exp_cerrar" onclick="ocultar_dat()">Cerrar</button></div>
                </div>

            </div>



        </div>

    </div>

    <!--SCRIPTS -->

    <script type="text/javascript" src="../../controllers/java_script/formularioSolicitud.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>

</html>