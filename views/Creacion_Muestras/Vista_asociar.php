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
 <a href="#" class="navbar-brand">ASOCIAR MUESTRA MEDICA</a>
 <a href="index.php" class="navbar-brand"><?php echo ($_SESSION['usuario']);?></a>
 
 <form action="../../models/AsociarModelo.php" method="POST">
        <input type="submit" class="btn btn-success " name="Inicio" value="Inicio">
        </form>
</nav>


<div class="container p-3">
<h6> BUSCAR MUESTRA MEDICA </h6>
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])){?>
            <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php unset($_SESSION['message']);
        }?>
        </div>
         <div class="row">
         <div class="col-md-4">
            <form  action="../../models/AsociarModelo.php" method="POST" >

                <div class="form-group">
                <input type="text" name="codigo" placeholder="Codigo Muestra" class="form-control" >
                </div>
                <input type="submit" class="btn btn-success" name="BUSCAR" value=" BUSCAR" >
                <input type="submit" class="btn btn-danger" name="regresar" value="Salir" >
                </div>
            </form>
            </div>
            </div>

        <div class="col-md-7">
        <table class="table table-bordered">
        <thead >
        <tr>
        <th>id muestra</th>
        <th>cod.Muestra</th>
        <th>tipo_muestra</th>
        <th>presentacion_muestra</th>
        <th>cantidad_muestra</th>
        <th>unidad_medida</th>
        <th>adjunto</th>
        <th>OPCIONES</th>
    
        
        </tr>
        </thead>
        <tbody>
                <tr>DATOS DE LA MUESTRA</tr>
            <?php
                //$obj = new conexion;
                //$conn = $obj -> conect();
                if (isset($_SESSION['dato'])) {
                    
                $codigo = $_SESSION['dato'];
                $usuario = $_SESSION['usuario'];
                $query = "SELECT  MM.id_muestra,MM.codigo_muestra,MM.tipo_muestra,MM.presentacion_muestra,
                MM.cantidad_muestra,MM.unidad_medida,MM.adjunto, EX.NUM_EXPEDIENTE from MUESTRAS_MEDICAS MM 
                INNER JOIN SOLICITUD so ON so.ID_SOLICITUD = MM.id_solicitud
                INNER  JOIN EXPEDIENTE  EX ON EX.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                WHERE  codigo_muestra='$codigo'";
                $resltados = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($resltados)){
                    $num_expediente = $row['NUM_EXPEDIENTE'];
                    ?>
                <tr>
                    <td><?php $id =$row['id_muestra']; echo $row['id_muestra']?></td>
                    <td><?php $codigo_muestra = $row['codigo_muestra']; echo $row['codigo_muestra']?></td>
                    <td><?php $tipo_muestra=$row['tipo_muestra'];  echo $row['tipo_muestra']?></td>
                    <td><?php echo $row['presentacion_muestra']?></td>
                    <td><?php echo $row['cantidad_muestra']?></td>
                    <td><?php echo $row['unidad_medida']?></td>
                    <td><?php echo $row['adjunto']?></td>
                    <td>
                            <form action="../../models/AsociarModelo.php"  method="POST" >
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown">
                                    ASOCIAR ITEMS<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                            <?php
                                $query = "SELECT ID,DESCRIPCION FROM ITEMS";
                                $resltados = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_array($resltados)){ ?>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="<?php echo $row['ID'] ?>">
                                            <label class="form-check-label" for="exampleCheck1"><?php echo $row['DESCRIPCION']?></label>
                                        </div>
                                    
                            <?php }?>
                            <input type="submit" class="btn btn-success " name="asociar" value="ASOCIAR" >           
                            </ul>
                            </div>
                    
                        </form>
                        <p></p>
                        <form action="../../models/AsociarModelo.php"  method="POST" >
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle"
                                    data-toggle="dropdown">
                                    DESASOCIAR ITEM<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                               <?php
                                $query = "SELECT  ID,DESCRIPCION FROM ASOCIAR ASO
                                INNER JOIN ITEMS  IT ON ASO.id_items = IT.ID 
                                WHERE id_muestra ='$id' ";
                                $resltados = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_array($resltados)){ ?>
                           
                                        <div class="form-check">
                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="<?php echo $row['ID'];?>">
                                            <label class="form-check-label" for="exampleCheck1"><?php echo $row['DESCRIPCION']?></label>
                                        </div>
                                <?php }
                               
                               ?> 
                               <input type="submit" class="btn btn-danger" name="Desasociar" value="Desasociar" > 
                            
                            </ul>
                            </div>
                        </form>
                        <p></p>
                        <form action="../../models/AsociarModelo.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="cod_muestra" value="<?php echo $codigo_muestra;?>">
                        <input type="hidden" name="cod_exp" value="<?php echo $num_expediente;?>">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">
                                        mas opciones<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <input type="submit" class="btn btn-success" name="etiqueta" value="ETIQUETA" > 
                                    <p></p>
                                    <input type="submit" class="btn btn-success" name="excel" value="Exportar A Excel" >
                                    <p></p> 
                                    <input type="submit" class="btn btn-danger" name="eliminar" value="Eliminar muestra" > 
                                    
                                    
                                </ul>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php }
                //session_destroy();
                }//session_destroy();
                
                
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