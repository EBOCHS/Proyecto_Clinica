<?php 
  include ("../../config/databases.php");
  include ("../../models/AsociarModelo.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>
    
<body >
<nav class="navbar navbar-dark bg-dark">
 <a href="index.php" class="navbar-brand">ASOCIAR MUESTRA MEDICA</a>
 <a href="index.php" class="navbar-brand"><?php echo ($_SESSION['usuario']);?></a>
 
<a href="../inicio/index.php" class="navbar-brand">inicio</a>
</nav>


<div class="container p-3">
<h6> BUSCAR MUESTRA MEDICA </h6>
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['alerta'])){?>
            <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['alerta']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php session_unset($_SESSION['alerta']);
        }?>
        </div>
         <div class="row">
         <div class="col-md-4">
            <form  action="../../models/AsociarModelo.php" method="POST" >

                <div class="form-group">
                <input type="text" name="codigo" placeholder="Codigo Muestra" class="form-control" >
                </div>
                <input type="submit" class="btn btn-success" name="BUSCAR" value=" BUSCAR" >
                <input type="submit" class="btn btn-danger" name="cancelar" value=" Cancelar" >
                </div>
            </form>
            </div>
            </div>

        <div class="col-md-7">
        <table class="table table-bordered">
        <thead >
        <tr>
        <th>Codigo muestra</th>
        <th>Tipo muestra</th>
        <th>Codigo Solicitud</th>
        <th>NO. Expediente</th>
        <th>NIT</th>
        <th>unidad_medida</th>
        <th>Presentacion</th>
    
        </tr>
        </thead>
        <tbody>
                <tr>DATOS DE LA MUESTRA</tr>
                   </tbody>
        </table>
    </div>
    <div class="col-md-7">
        <table class="table table-bordered">
        <thead >
        <tr>
        <th>Usuario asignacion</th>
        <th>Usuario creacion</th>
        <th>Fecha creacion</th>
        <th>Fecha recepcion</th>
        <th>Estado Solicitud</th>
        <th>Cantidad unidades</th>
        <th>Unidad Medida</th>
        <th>Cantidad items</th>
        <th>Cantidad Documentos</th>
        <th>opciones</th>
        

        </tr>
        </thead>
        <tbody>
                <tr>DATOS DE LA MUESTRA</tr>
                   </tbody>
        </table>
    </div>
        
    </div>    
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</body>
</html>