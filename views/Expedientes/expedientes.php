<?php
include("../../config/databases.php");
//include ("../../models/ExpedienteModel.php");
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

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">Crea un Expediente</a>
        <a href="index.php" class="navbar-brand"><?php echo ($_SESSION['usuario']); ?></a>
        <a href="../inicio/index.php" class="navbar-brand">inicio</a>
    </nav>


    <div class="container p-3">
        <div class="row">
            <div class="col-md-5">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();
                } ?>

                <form action="../../models/ExpedienteModel.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Nombre Del Paciente" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido Del Paciente">
                    </div>
                    <div class="form-group">
                        <input type="text" name="cui" class="form-control" placeholder="CUI Del Paciente">
                    </div>
                    <div class="form-group">
                        <select class="form-control" aria-label="Default select example" id="Tsangre" name="Tsangre">
                            <option selected>TIPO DE SANGRE</option>
                            <option value="1" name="a+">A+</option>
                            <option value="2">A-</option>
                            <option value="3" name="B+">B+</option>
                            <option value="4" name="B-">B-</option>
                            <option value="5" name="O+">O+</option>
                            <option value="6" name="O-">O-</option>
                            <option value="7" name="AB+">AB+</option>
                            <option value="8" name="AB-">AB-</option>
                        </select>
                    </div>
                    <div>
                        <select class="form-control" aria-label="Default select example" id="Sexo" name="Sexo">
                            <option selected>SEXO</option>
                            <option value="1">MASCULINO</option>
                            <option value="2">FEMENINO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Edad" class="form-control" placeholder="Edad">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Estado_civil" class="form-control" placeholder="Estado civil">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nit" class="form-control" placeholder="nit">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion">
                    </div>
                    <div class="form-group mx-auto">
                        <input type="submit" class="btn btn-success " name="Crear" value=" Crear">
                        <input type="submit" class="btn btn-danger " name="cancelar" value=" Cancelar">
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.Expediente</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>ESTADO</th>
                            <th>CREADO POR</th>
                            <th>ACCION</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>EXPEDIENTES</tr>
                        <?php
                        //$obj = new conexion;
                        //$conn = $obj -> conect();
                        $usuario = $_SESSION['usuario'];
                        $query = "SELECT  EX.NUM_EXPEDIENTE , PA.NOMBRE, PA.APELLIDO ,EX.ESTADO,EX.USUARIO_CREACION  FROM EXPEDIENTE EX 
                INNER JOIN PACIENTE PA ON EX.ID_PACIENTE = PA.ID_PACIENTE WHERE EX.USUARIO_CREACION  ='$usuario'";
                        $resltados = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($resltados)) { ?>
                            <tr>
                                <td><?php echo $row['NUM_EXPEDIENTE'] ?></td>
                                <td><?php echo $row['NOMBRE'] ?></td>
                                <td><?php echo $row['APELLIDO'] ?></td>
                                <td><?php echo $row['ESTADO'] ?></td>
                                <td><?php echo $row['USUARIO_CREACION'] ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id'] ?> " class="btn btn-success"><i class="fas fa-marker"></i></a>
                                    <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php }


                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>
</body>

</html>