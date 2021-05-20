<?php
include("../../config/databases.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---BOOSTRAP------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>
    <title>Consulta de Solicitudes</title>
</head>


<!-- BARRA DE NAVEGACION -->

<div class="bg-light">
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/Proyecto_Clinica/views/inicio/index.php">CLINICA LA BENDICION</a>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </nav>
    </div>

    <!--MENSAJES DE VALIDACION-->

    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message']);
    } ?>

    <!--FILTROS DE BUSQUEDA-->

    <body>
        <h1 class="text-center fw-bold">Consulta de solicitudes</h1>
        <div class="container p-4 card card-body">
            <form class="row g-3" action="../../models/consulta_solicitudModel.php" method="POST">


                <div class="col-auto">
                    <h6 class="form-control-plaintext">Filtro de Busqueda</h6>
                </div>
                <div class="col-auto">
                    <select class="form-control" name="FILTRO" require>
                        <option value="">Seleccione una opción</option>
                        <option value="COD_SOLICITUD">Codigo de Solicitud</option>
                        <option value="NUM_EXPEDIENTE">No. Expediente</option>
                        <option value="NIT">No. NIT</option>
                        <option value="ESTADO_SOLICITUD">Estado Solicitud</option>
                    </select>
                </div>
                <div class="col-auto">
                    <h6 class="form-control-plaintext">Ingrese los datos</h6>
                </div>
                <div class="col-auto">

                    <input type="text" name="DATO_FILTRO" class="form-control" placeholder="0000 00000 0000"> </input>
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-success btn-block" name="consultar_solicitud" value="Consultar Solicitud">

                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary btn-block" name="limpiar" value="Limpiar Datos">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-danger btn-block" name="eliminar" value="Eliminar solicitud">
                </div>

                <div class="col-auto">
                    <input type="submit" class="btn btn-secondary btn-block" name="crear_s" value="Crear Solicitud">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-secondary btn-block" name="crear_mm" value="Crear Muestra">
                    <a href="/Proyecto_Clinica/views/solicitud/solicitud.php" class="btn btn-outline-danger">Volver</a>
                </div>
            </form>

        </div>
        <!--TABLA DE SALIDA DE DATOScontainer p-4 card card-body -->
        <div>

        </div>
        <h1 class="text-center fw-bold">Datos de la Solicitud</h1>
        <div class="text-center card card-body">
            <table id="datos" class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Codigo de Solicitud</th>
                        <th>No. Expediente</th>
                        <th>NIT</th>
                        <th>Tipo Solicitud</th>
                        <th>Usr Asignacion</th>
                        <th>Estado</th>
                        <th>Fecha de creacion</th>
                        <th>Cantidad de muestras</th>
                        <th>Cantidad de items</th>
                        <th>Dias de Vencimiento</th>

                    </tr>
                </thead>
                <?php
                $var1 = $_SESSION['var1'];
                $dato = $_SESSION['datos'];

<<<<<<< Updated upstream:views/Consulta_Solicitudes/consulta_solicitud_NO.php
    </div>
    <h1 class="text-center fw-bold">Datos de la Solicitud</h1>
    <div class="text-center card card-body">
        <table id="datos" class="table">
            <thead class="table-dark">
                <tr>
                    <th>Codigo de Solicitud</th>
                    <th>No. Expediente</th>
                    <th>NIT</th>
                    <th>Tipo Solicitud</th>
                    <th>Usr Asignacion</th>
                    <th>Estado</th>
                    <th>Fecha de creacion</th>
                    <th>Cantidad de muestras</th>
                    <th>Cantidad de items</th>
                    <th>Dias de Vencimiento</th>

                </tr>
            </thead>
            <?php
                $filtro=$_SESSION['var1'];
                $dato=$_SESSION['datos'];
                 $query = "SELECT S.COD_SOLICITUD,EX.NUM_EXPEDIENTE,P.NIT,S.TIPO_SOLICITUD,P.NOMBRE ,S.ESTADO_SOLICITUD, 
                 S.FECHA_SOLICITUD_INICIAL,COUNT(A.id_muestra),COUNT(A.id_items),
                 DATE_ADD(S.FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f
                 FROM SOLICITUD S 
                 INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = S.ID_EXPEDIENTE 
                 INNER JOIN PACIENTE P ON P.ID_PACIENTE = EX.ID_PACIENTE 
                 INNER JOIN MUESTRAS_MEDICAS MM ON MM.id_solicitud
                 INNER JOIN ASOCIAR A ON A.id_muestra = MM.id_muestra
                 WHERE $filtro = '$dato' ";

            $result=mysqli_query($conn,$query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tbody>
                    <tr>
                        <td><?php $_SESSION['cod_s'] = $row['COD_SOLICITUD'];
                            echo $row['COD_SOLICITUD']; ?></td>
                        <td><?php echo $row['NUM_EXPEDIENTE']; ?></td>
                        <td><?php echo $row['NIT'] ?></td>
                        <td><?php echo $row['TIPO_SOLICITUD']; ?></td>
                        <td><?php echo $row['NOMBRE'] ?></td>
                        <td><?php echo $row['ESTADO_SOLICITUD']; ?></td>
                        <td><?php echo $row['FECHA_SOLICITUD_INICIAL']; ?></td>
                        <td><?php echo $row['COUNT(A.id_muestra)']; ?></td>
                        <td><?php echo $row['COUNT(A.id_items)']; ?></td>
                        <td><?php echo $row['fecha_f']; ?></td>
=======
                $query = "SELECT COD_SOLICITUD,e.NUM_EXPEDIENTE,p.NIT,TIPO_SOLICITUD,p.NOMBRE,ESTADO_SOLICITUD,
            FECHA_SOLICITUD_INICIAL,COUNT(a.id_muestra),COUNT(a.id_items),DATE_ADD(FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f 
            FROM SOLICITUD s  
            INNER JOIN EXPEDIENTE e ON s.ID_EXPEDIENTE =e.ID_EXPEDIENTE 
            INNER  JOIN  PACIENTE p ON e.ID_PACIENTE = p.ID_PACIENTE 
            INNER JOIN MUESTRAS_MEDICAS mm ON e.ID_EXPEDIENTE =mm.id_expediente 
            INNER  JOIN ASOCIAR a ON mm.id_muestra =a.id_muestra 
            INNER JOIN ITEMS i ON a.id_items =i.ID WHERE $var1 = '$dato'";
                $result = mysqli_query($conn, $query);

                ?>

                <?php

                while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tbody>
                        <tr>
                            <td><?php $_SESSION['cod_s'] = $row['COD_SOLICITUD'];
                                echo $row['COD_SOLICITUD']; ?></td>
                            <td><?php echo $row['NUM_EXPEDIENTE']; ?></td>
                            <td><?php echo $row['NIT'] ?></td>
                            <td><?php echo $row['TIPO_SOLICITUD']; ?></td>
                            <td><?php echo $row['NOMBRE'] ?></td>
                            <td><?php echo $row['ESTADO_SOLICITUD']; ?></td>
                            <td><?php echo $row['FECHA_SOLICITUD_INICIAL']; ?></td>
                            <td><?php echo $row['COUNT(a.id_muestra)']; ?></td>
                            <td><?php echo $row['COUNT(a.id_items)']; ?></td>
                            <td><?php echo $row['fecha_f']; ?></td>
>>>>>>> Stashed changes:views/Consulta_Solicitudes/consulta_solicitud.php

                        </tr>

                    <?php } ?>

                    </tbody>
            </table>

        </div>
</div>
<!------SCRIPTS-------->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


<!--
    /******************************
    *DEPEDENCIAS PARA BOTONES DE IMPRIMIR-EXCEL-PDF
    */
    -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="jquery/jquery-3.3.1.min.js"></script>

<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>

<!-- para usar botones en datatables JS -->
<script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

<!-- código JS propìo-->
<script type="text/javascript" src="main.js"></script>
</body>




</html>