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
 <a href="#" class="navbar-brand">ETIQUETA DE MUESTRA MEDICA</a>
 <a href="#" class="navbar-brand"><?php echo ($_SESSION['usuario']);?></a>
 
<a href="../inicio/index.php" class="navbar-brand">inicio</a>
</nav>


<div class="container p-3">
<h6> ETIQUETA DE MUESTRA </h6>
<?php echo $id_muestra;?>
    <div class="row">
        
         
        <div class="col-md-20">
        <table class="table table-bordered">
        <thead >
        <tr>
        <th>codigo de Muestra</th>
        <th>Codigo de EXPEDIENTE</th>
        <th>Codigo del Solicitud</th>
        <th>CODIGO QR</th>
        <th>Codigo Etiqueta</th>
        <th>OPCIONES</th>
        </tr>
        </thead>
        <tbody>
                <tr>DATOS DE LA MUESTRA</tr>

            <?php
                //$obj = new conexion;
                //$conn = $obj -> conect();
                $codigo = $_SESSION['id'];
                $usuario = $_SESSION['usuario'];
                $num_etiqueta =  $_SESSION['cod_et'];
                $query = "SELECT  MM.codigo_muestra,EX.NUM_EXPEDIENTE,MM.id_muestra from MUESTRAS_MEDICAS MM 
                INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = MM.id_expediente 
                 WHERE  id_muestra='$codigo'";
                $resltados = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($resltados)){?>
                <tr>
                    <td><?php $cod_muestra = $row['codigo_muestra']; echo $row['codigo_muestra']?></td>
                    <td><?php $cod_exp = $row['NUM_EXPEDIENTE']; echo $row['NUM_EXPEDIENTE']?></td>
                    <td><?php echo $row['id_muestra']?></td>
                    <td><img src="../../models/<?php $qr = $_SESSION['QR']; echo $_SESSION['QR'];?>" ></td>
                    <td><?php echo $num_etiqueta?></td>
                    <td>
                    <form action="../../models/AsociarModelo.php" method="POST">
                        <input type="hidden" name="qr" value="<?php echo $qr;?>">
                        <input type="hidden" name="cod_etiqueta" value="<?php echo $num_etiqueta;?>">
                        <input type="hidden" name="cod_muestra" value="<?php echo $cod_muestra;?>">
                        <input type="hidden" name="cod_exp" value="<?php echo $cod_exp;?>">
                            
                        <input type="submit" class="btn btn-success" name="imprimir" value="Imprimir" >
                         <input type="submit" class="btn btn-danger" name="salir" value="Regresar" >
                
                    </form>
                    </td>
                </tr>
                <?php }
                ?>
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