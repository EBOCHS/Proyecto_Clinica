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
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>

    <style>
        .gradient {
            background: linear-gradient(40deg, #0354eb 0%, #fcfdff 100%);
        }
    </style>
</head>

<body class="gradient min-h-screen pt-10 md:pt-4 pb-6 px-2 md:px-0 overflow-hidden">
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
    <form action="../../models/SolicitudModelo.php" method="POST"  method="POST" enctype="multipart/form-data">
        <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
            <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                <div class="px-3 py-3">
                    <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out" href="">
                        <button name="salir"><i class="fas fa-chevron-circle-left"></button></i></a>
                </div>

                <div class="md:flex w-full">
                    <div class="hidden zoom-picture md:block w-1/2 bg-white">
                        <img src="../images/data-health.jpg" alt="icono_registro" class="max-h-screen">
                    </div>
                    <div class="w-full md:w-1/2 py-2 px-5 md:px-10">
                        <div class="text-center mb-4">
                            <h1 class="font-bold text-3xl text-black mt-3">Solicitud de Muestra Médica</h1>
                            <p class="text-md mt-2 font-bold">Completa la información para hacer la Solicitud</p>
                        </div>
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-3">

                                    <?php if (isset($_SESSION['message'])) { ?>
                                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['message'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <?php unset($_SESSION['message']);
                                    } ?>
                                        </div>

                                </div>
                            </div>

                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Tipo de Usuario</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-user"></i>
                                        </div>

                                        <select name="tipo_usu" id="Tusuario" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="">Elija</option>
                                            <option value="IN">IN-Usuario Interno</option>
                                            <option value="EX">EX-Usuario Externo</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Tipo de Solicitud</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>

                                        <select name="tipo_solicitud" id="Tsolicitud" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="">Elija</option>
                                            <option value="MM">MM-Muestra Médica</option>
                                            <option value="LQ">LQ-Laboratorio</option>
                                        </select>

                                    </div>
                                </div>
                            </div>



                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">No. de Expediente</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-folder-open"></i>
                                        </div>
                                        <input type="text" name="expediente" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000-00-00-00-0000000000">
                                    </div>
                                </div>
                                <div class="flex -mx-3">
                                    <div class="w-full px-3 mb-2">
                                        <div class="flex pt-4">
                                            <div class="mx-4 flex flex-col pt-4">
                                                <label id="ayuda" class="text-xs text-gray-600 hover:text-blue-900 cursor-pointer">¿Ha
                                                    olvidado su
                                                    expediente?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="help" class="flex -mx-3 hidden">
                                <div class="flex">
                                    <div class="w-full px-3 mb-2">
                                        <label for="" class="text-xs font-semibold px-1">No. de CUI</label>
                                        <div class="flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <i class="fas fa-id-card"></i>
                                            </div>
                                            <input id="cui" type=" text" name='DPI' class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000000000000" maxlength="13" value="">
                                        </div>
                                    </div>
                                    <!--funcion para ocultar javascript-->
                                    <div class="flex -mx-3 items-center">
                                        <div id="search_expediente" class="w-full px-3 mb-2">
                                            <div class="flex pt-4">
                                                <div class="mr-6 flex flex-col">
                                                    <label class="text-xs">Buscar</label>
                                                    <a id="search" name="buscar_dpi" class="cursor-pointer hover:text-blue-500 text-2xl mx-auto">
                                                        <button type="submit" name="buscar_dpi"><i class="fas fa-search"></i></button></a>
                                                </div>
                                                <div class="max-2 flex flex-col">
                                                    <label class="text-xs">Cancelar</label>
                                                    <a id="exp_cancelar" class="cursor-pointer hover:text-blue-500 text-2xl mx-auto">
                                                        <i class="fas fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-4">
                                    <label for="" class="text-xs font-semibold px-1">Descripcion</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-text-height"></i>
                                        </div>
                                        <textarea name="descripcion" id="descripcion" cols="30" rows="1" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mt-2">
                                    <!--validacion de formularios en el documento de javascript-->
                                    <input type="submit" value="Crear" onclick="return confirmar()" name="Crear_Solicitud" class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <input type="submit" value="cancelar" name="cancelar" class="block text-center my-2 w-full max-w-xs mx-auto bg-gray-400 hover:bg-red-400 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">


                                </div>
                            </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>


    <script>
        $("#ayuda").click(function() {
            $("#help").slideToggle("slow");
        });
        $("#exp_cancelar").click(function() {
            $("#help").slideUp("slow");
        });

        /* $("#search").click(function () {
             var search = document.getElementById("cui").value;
             alert(search);
         });*/
    </script>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>

</body>

</html>