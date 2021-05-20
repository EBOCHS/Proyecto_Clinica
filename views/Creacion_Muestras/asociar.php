<?php
include("../../config/databases.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Clinica la Bendicion
    </title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
-->
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>

    <style>
        .gradient {
            background: linear-gradient(40deg, #0354eb 0%, #fcfdff 100%);
        }
    </style>
</head>

<body class="gradient min-h-screen pt-0 md:pt-0 pb-6 px-2 md:px-0 ">




    <div id="loader" class="mesh-loader">
        <div class="set-one">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="set-two">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>

    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1200px">

            <!--BOTON DE RETORNO -->
            <form action="../../models/AsociarModelo.php" method="POST">
                <div class="px-3 py-3">
                    <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out"><button name="salir"><i class="fas fa-chevron-circle-left"></button></i></a>
                </div>

                <div>
                    <div class="text-center font-bold">
                        <h1>Asociar Muestra Médica</h1>
                        <p class="text-md mt-3 font-bold">Completa la información para asociar items
                        </p>
                    </div>
                    <div class="flex justify-center mb-1">
                        <div class="flex h-auto">
                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                                    <div class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-<?= $_SESSION['message_type'] ?>-600 text-base font-medium text-white hover:bg-<?= $_SESSION['message_type'] ?>-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        <?= $_SESSION['message'] ?>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="far fa-times-circle"></i></button>
                                <?php unset($_SESSION['message']);
                            } ?>

                                </div>
                        </div>
                    </div>

                    <div class="flex h-auto">
                        <div class="flex flex-col mx-auto my-4">
                            <label for="buscar" class="text-center text-2xl text-gray-600 font-semibold">Buscar
                                Muestra Medica</label>

                            <div class="flex border border-gray-200 overflow-hidden px-2 rounded-xl shadow-lg items-center">
                                <input type="text" name="cod_nuestra" id="buscar" class="py-2 px-4 bg-gray-100 border border-transparent focus:outline-none focus:ring-0 focus:ring-gray-100 focus:border-transparent">
                                <button type="submit" class="mx-2" name="buscar"><i class="fas fa-search text-xl"></i></button>
                            </div>
            </form>
        </div>
    </div>

    <!--formulario para mostrar datos -->
    <div class="flex justify-center my-14">
        <div class="flex">
            <form class="" action="" method="POST">
                <div class="flex -mx-3">
                    <div class="w-1/2 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">TIPO DE MUESTRA</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fas fa-vial"></i>
                            </div>

                            <input type="text" value="<?php echo $_SESSION['tipo_muestra'] ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                        </div>
                    </div>
                    <div class="w-1/2 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Código de Muestra</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fas fa-vial"></i>
                            </div>

                            <input type="text" value="<?php echo $_SESSION['codigo_muestra'] ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">


                        </div>
                    </div>
                </div>
                <div class="flex -mx-3">
                    <div class="w-1/2 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Presentación de la Muestra</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fas fa-vial"></i>
                            </div>

                            <input type="text" value="<?php echo $_SESSION['presentacion_muestra'] ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                        </div>
                    </div>
                    <div class="w-1/2 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Cantidad de Muestra</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fas fa-vial"></i>
                            </div>

                            <input type="text" value="<?php echo $_SESSION['cantidad_muestra'] ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">


                        </div>
                    </div>
                </div>
                <div class="flex -mx-3">
                    <div class="w-1/2 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Unidad de Medida</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fas fa-vials"></i>
                            </div>

                            <input type="text" value="<?php echo $_SESSION['unidad_medida'] ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                        </div>
                    </div>
                    <div class="w-1/2 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">ESTADO</label>
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fas fa-vial"></i>
                            </div>

                            <input type="text" value="<?php echo $_SESSION['estado'] ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                        </div>
                    </div>

                </div>
            </form>
            <div class=" w-1/2 px-3 mb-5">
                <label for="" class="text-xs font-semibold px-1">Opciones</label>
                <div class="flex">
                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">

                    </div>

                    <form action="../../models/AsociarModelo.php" method="POST">


                        <legend>ASIGNAR ITEMS: </legend>
                        <input type="checkbox" name="1" <?php echo $_SESSION['item1A']; ?>>ORINA<br>
                        <input type="checkbox" name="2" <?php echo $_SESSION['item2A']; ?>>HECES<br>
                        <input type="checkbox" name="3" <?php echo $_SESSION['item3A']; ?>>PLAQUETAS<br>
                        <input type="checkbox" name="4" <?php echo $_SESSION['item4A']; ?>>DIABETES<br>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id_muestra']; ?>">
                        <br>
                        <input type="submit" name="asociar" value="  Asociar  " class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-1 py-1 font-semibold">


                    </form>
                    <form class="px-20" action="../../models/AsociarModelo.php" method="POST">


                        <legend>DESASOCIAR ITEMS </legend>
                        <input type="checkbox" name="1" <?php echo  $_SESSION['item1B']; ?>>ORINA<br>
                        <input type="checkbox" name="2" <?php echo  $_SESSION['item2B']; ?>>HECES<br>
                        <input type="checkbox" name="3" <?php echo  $_SESSION['item3B']; ?>>PLAQUETAS<br>
                        <input type="checkbox" name="4" <?php echo  $_SESSION['item4B']; ?>>DIABETES<br>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id_muestra']; ?>">
                        <br>
                        <input type="submit" name="Desasociar" value="Desasociar" class="block w-full max-w-xs mx-auto bg-gray-400 hover:bg-red-400 focus:bg-indigo-700 text-white rounded-lg px-1 py-1 font-semibold">


                    </form>
                </div>
            </div>
            <div class="">
                <div class="">
                    <label for="" class="text-xs font-semibold ">Generar</label>
                    <div class="flex flex-col justify-center">
                        <form action="../../models/AsociarModelo.php" method="POST">
                            <div class="mx-auto my-2">

                                <a id="ayuda" class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out">
                                    <i class="fas fa-tag"></i></a>

                            </div>
                            <div class="mx-auto my-2">
                                <a class="text-4xl cursor-pointer hover:text-green-500 transition duration-300 ease-in-out">
                                    <button name="excel"><i class="fas fa-file-excel"></button></i></a>
                            </div>

                            <label for="" class="text-xs font-semibold my-2 ">Eliminar</label>
                            <div class="mx-auto my-2">

                                <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out">
                                    <button name="eliminar"><i class="fas fa-trash-alt"></button></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    <!---TABLA OCULTA para mandar a excel -->
    <div id="help" class="hidden">
        <div class="w-full   md:flex flex-col bg-gray-100 p-14 rounded-3xl mx-auto" style="max-width:1200px">
            <div class="">
                <table class="" id="table_id">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th>CODIGO DE ETIQUETA</th>
                            <th>CODIGO MUESTRA</th>
                            <th>NUMERO DE EXPEDIENTE </th>
                            <th>NUMERO DE SOLICITUD</th>
                            <th>CODIGO QR</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-300">
                        <tr>
                            <td><?php if (isset($_SESSION['cod_et'])) {
                                    $_POST['estado'] = "";
                                }
                                echo  $_SESSION['cod_et'] ?></td>
                            <td><?php echo  $_SESSION['codigo_muestra'] ?></td>
                            <td><?php echo  $_SESSION['num_expediente'] ?></td>
                            <td><?php echo  $_SESSION['COD_SOLICITUD'] ?></td>
                            <td><img src="../../models/<?php $qr = $_SESSION['QR'];
                                                        echo $_SESSION['QR']; ?>"></td>
                            <td>
                                <form action="../../models/AsociarModelo.php" method="POST">
                                    <input type="submit" name="imprimir" value="IMPRIMIR" class="block w-full max-w-xs mx-auto bg-gray-400 hover:bg-red-400 focus:bg-indigo-700 text-white rounded-lg px-1 py-1 font-semibold">
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>

    <script>
        $("#ayuda").click(function() {
            $("#help").slideToggle("slow");
        });
        $("#exp_cancelar").click(function() {
            $("#help").slideUp("slow");
        });

        $("#search").click(function() {
            var search = document.getElementById("cui").value;
            alert(search);
        });
    </script>
</body>

</html>