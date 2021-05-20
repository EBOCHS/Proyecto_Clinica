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
        Consulta de Solicitudes
    </title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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

<body class="gradient min-h-screen pt-0 md:pt-4 pb-6 px-2 md:px-0 ">
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

    <div class="min-w-screen min-h-screen flex items-center justify-center py-5 px-5">
        <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1500px">
            <!--BOTON DE RETORNO -->
            <form action="../../models/consulta_solicitudModel.php" method="POST">
                <div class="px-3 py-3">
                    <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out" href="">
                        <button name="salir"><i class="fas fa-chevron-circle-left"></button></i></a>
                </div>

                <div class="flex justify-center mb-1">
                    <div class=" ">
                        <div class="text-center mb-2">
                            <h1 class="font-bold text-3xl text-black mt-3">Consulta de Solicitudes</h1>
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

                            <!--filtro de busqueda-->
                            <div class="flex h-auto">
                                <div class="flex flex-col mx-auto my-4">
                                    <div class="flex border border-gray-200 overflow-hidden px-2 rounded-xl shadow-lg items-center">
                                        <select name="FILTRO" class=" cursor-pointer py-2 px-4 bg-gray-100 border border-transparent focus:outline-none
                                    focus:ring-0 focus:ring-gray-100 focus:border-transparent">
                                            <option value="">Seleccione</option>
                                            <option value="COD_SOLICITUD">Codigo de Solicitud</option>
                                            <option value="NIT">NIT</option>
                                            <option value="ESTADO_SOLICITUD">Estado Solicitud</option>
                                        </select>
                                        <input name="DATO_FILTRO" class="py-2 px-4 bg-gray-100 border border-transparent focus:outline-none
                                    focus:ring-0 focus:ring-gray-100 focus:border-transparent" type="text">
                                        <button type="submit" name="consultar_solicitud" class="mx-2"><i class="fas fa-search text-xl"></i></button>
                                    </div>


            </form>
        </div>

    </div>

    <div class="flex justify-items-center">

        <form action="" method="POST">

            <div class="flex -mx-3">
                <div class="w-1/2 px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">Codigo de Solicitud</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['COD_SOLICITUD']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="John">
                    </div>
                </div>
                <div class="w-1/2 px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">No. de Expediente</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['NUM_EXPEDIENTE']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="Smith">
                    </div>
                </div>
                <div class="w-1/2 px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">No. NIT</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['NIT']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="Smith">
                    </div>
                </div>
            </div>


            <div class="flex -mx-3">
                <div class="w-full px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">Tipo Solicitud</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['TIPO_SOLICITUD']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="1351328050109">
                    </div>
                </div>
                <div class="w-full px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">Estado de Solicitud</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['ESTADO_SOLICITUD']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="usr">
                    </div>
                </div>
                <div class="w-full px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">Usuario de Asignación</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['NOMBRE']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="usr">
                    </div>
                </div>

            </div>
            <div class="flex -mx-3">

                <div class="w-full px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">Fecha de Creación</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['FECHA_SOLICITUD_INICIAL']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="00/00/0000">
                    </div>
                </div>
                <div class="w-full px-3 mb-5">
                    <label for="" class="text-xs font-semibold px-1">Dias de Vencimiento</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['fecha_f']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="usr">
                    </div>
                </div>
            </div>
            <div class="flex -mx-3">
                <div class="w-full px-3 mb-2">
                    <label class="text-xs font-semibold px-1">Cantidad de Muestras</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['cantidad_muestra']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="usr">
                    </div>
                </div>
                <div class="w-full px-3 mb-2 ">
                    <label for="" class="text-xs font-semibold px-1">Cantidad de items</label>
                    <div class="flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <i class="fas fa-vial"></i>
                        </div>
                        <input type="text" value="<?php echo $_SESSION['cant_items']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="00">
                    </div>
                </div>

            </div>



        </form>
        <!--OPCIONES DEL FORM-->
        <form action="../../models/consulta_solicitudModel.php" method="POST">
            <div class="flex">
                <div class=" px-5">

                    <div class="flex flex-col justify-center">

                        <label for="" class="text-xs font-semibold my-2">Opciones</label>

                        <div class="mx-auto my-2">

                            <a id="ayuda" class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out disabled">
                                <button name="imprimir"><i class="fas fa-print" disabled></button></i></a>

                        </div>



                        <div class="mx-auto my-2">
                            <a class="text-4xl cursor-pointer hover:text-green-500 transition duration-300 ease-in-out">
                                <button name="excel"><i class="fas fa-file-excel"></button></i></a>
                        </div>
                        <div class="mx-auto my-2">
                            <a class="text-4xl cursor-pointer hover:text-gray-400 transition duration-300 ease-in-out">
                                <button name="limpiar"><i class="fas fa-broom"></button></i></a>
                        </div>

                        <label for="" class="text-xs font-semibold my-2 ">Eliminar</label>
                        <div class="mx-auto my-2">

                            <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out">
                                <button name="eliminar"><i class="fas fa-trash-alt"></button></i></a>
                        </div>

                    </div>


                </div>

                <div class=" px-5">

                    <div class="flex flex-col justify-center">

                        <label for="" class="text-xs font-semibold my-2">Crear Solicitud</label>

                        <div class="mx-auto my-2">

                            <a href="../solicitud/solicitud.php" id="ayuda" class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out"><i class="fas fa-notes-medical"></i></a>

                        </div>

                        <label for="" class="text-xs font-semibold my-2 ">Crear Muestra</label>
                        <div class="mx-auto my-2">

                            <a href="../Creacion_Muestras/muestra.php" class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out"><i class="fas fa-syringe"></i></a>
                        </div>

                    </div>


                </div>


            </div>

        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>




    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>

</body>

</html>