<?php
include ("../../config/databases.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
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

<body class="gradient min-h-screen pt-0 md:pt-4 pb-6 px-2 md:px-0 overflow-hidden">
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



            <div class="md:flex w-full">


                <div class="hidden zoom-picture md:block w-1/2 bg-white">
                    <!--BOTON DE RETORNO -->
                    <div class="px-3 py-3">
                        <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out"
                            href=""><i class="fas fa-chevron-circle-left"></i></a>
                    </div>
                    <img src="../images/data-health.jpg" alt="icono_registro" class="max-h-screen">
                </div>
                <div class="w-full md:w-1/2 py-0 px-5 md:px-10">
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-3xl text-black mt-3">Creacion de Muestra Medica</h1>
                        <p class="text-md mt-2 font-bold">Completa la informacion para crear una Muestra</p>
                    </div>
                    <div>
                    <form action="../../models/MuestrasModelo.php" method="POST">
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
                                    <label for="" class="text-xs font-semibold px-1">Tipo de Muestra</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-vial"></i>
                                        </div>

                                        <select required name="Tmuestra" id="Tmuestra"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="0">Elija</option>
                                            <option value="1">Cultivo</option>
                                            <option value="2">Heces</option>
                                            <option value="3">Plaquetas</option>
                                            <option value="4">Orina</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Presentación de la Muestra</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-vials"></i>
                                        </div>

                                        <select required name="Presentacion" id="Tsangre"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="0">Elija</option>
                                            <option value="1">Frasco</option>
                                            <option value="2">Jeringa</option>
                                            <option value="3">Bolsa</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Cantidad </label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-sort-numeric-up-alt"></i>
                                        </div>
                                        <select required name="cantidad" id="Tsangre"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="0">Elija</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Unidad de Medida</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-flask"></i>
                                        </div>
                                        <select required name="Umedida" id="Tsangre"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="0">Elija</option>
                                            <option value="1">miligramos</option>
                                            <option value="2">mililitros</option>
                                            <option value="3">gramos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Codigo de Solicitud</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-folder-open"></i>
                                        </div>
                                        <input type="text" name="cod_solicitud"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="0000-00-00-00-0000000000">
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Adjunto</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-notes-medical"></i>
                                        </div>
                                        <input type="text" mane ="adjunto"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="00">
                                    </div>
                                </div>
                            </div>



                            <div class="flex -mx-3">
                                <div class="w-full px-3 mt-2">
                                    <input type="submit" value="Crear" name="Crear"
                                        class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <a href="./index.html"
                                        class="block text-center my-2 w-full max-w-xs mx-auto bg-gray-400 hover:bg-red-400 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>



    <script src="script.js"></script>
</body>

</html>