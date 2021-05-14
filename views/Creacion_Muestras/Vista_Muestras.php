

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
<?php include ("../../config/databases.php"); ?>
<?php include ("../../models/MuestraModelo.php"); ?>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">MUESTRAS MEDICAS</a>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <form action="../../models/MuestrasModelo.php" method="POST">
                        <input type="submit" class="btn btn-secondary " name="Inicio" value="Inicio">
                    </form>
                    </div>
                </div>
            </div>

        </nav>
    </div>
    <br>
    <div class="container p-4 card card-body">
        <h1 class="animate__fadeInUp">CREACION DE MUSTRA MEDICA</h1>
        <h6>INGRESE LOS DATOS QUE SE LE SOLICITAN </h6>
        <div class="row">
            <div class="col col-md-5">
            <?php if(isset($_SESSION['message'])){?>
            <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php unset($_SESSION['message']);
        }?>

                <div class="card card-body">
                    <form action="../../models/MuestrasModelo.php" method="POST">
                        <div class="form-group">
                            <h6>Elija el tipo de muestra: </h6>

                            <select class="form-control" name="Tmuestra" >
                                <option value="">Seleccione una opción</option>
                                <option value="1">CULTIVO</option>
                                <option value="2">PLAQUETAS</option>
                                <option value="3">HESES</option>
                                <option value="4">ORINA</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Ingrese la presentacion de la muestra </h6>
                            <input type="text" name="Presentacion" class="form-control" placeholder="Presentacion" value="<?php if(isset($presentacion)){ echo ($presentacion);}?>"></input>
                            
                        </div>
                        <br>
                            <h6> Cantidad : </h6>
                        <div class="form-group">
                            <input type="text" name="cantidad" id="exp" class="form-control" placeholder="Cantidad"></input>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6>Elija La Unidad De Medida </h6>

                            <select class="form-control" name="Umedida">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Mililitros</option>
                                <option value="2">Gramos</option>
                                <option value="3">Miligramos</option>
                            </select>
                        </div>
                        <br>
                        <h6>Adjunto:</h6>
                        <input type="text" name="adjunto" id="adj" class="form-control" placeholder="Adjunto"></input>
                        <br>
                        <h6>Ingrese El Codigo De Solicitud:</h6>
                        <input type="text" name="cod_solicitud" id="adj" class="form-control" placeholder="NUM.Expediente"></input>
                        <br>
                        <div class="form-group mx-auto" >
                            <input type="submit" class="btn btn-secondary " name="Crear" value="Crear" >
                            <input type="submit" class="btn btn-secondary " name="salir" value="SALIR" >
                        </div>
                    </form>

                </div>
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>

</body>
<?php include ("../includes/footer.php");?>
