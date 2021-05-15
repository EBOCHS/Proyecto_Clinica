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
        Consulta de Solicitudes
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
    <style>
        .gradient {
            background: linear-gradient(40deg, #0354eb 0%, #fcfdff 100%);
        }
    </style>
</head>

<body class="gradient min-h-screen pt-10 md:pt-4 pb-6 px-2 md:px-0 ">
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
        <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1200px">
            <!--BOTON DE RETORNO -->
            <div class="px-3 py-3">
                <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out" href=""><i
                        class="fas fa-chevron-circle-left"></i></a>
            </div>

            <div class="flex justify-center mb-1">
                <div class=" ">
                    <div class="text-center mb-2">
                        <h1 class="font-bold text-3xl text-black mt-3">Consulta de Solicitudes</h1>
                        <p class="text-md mt-2 font-bold">Completa la información para consultar el estado de la
                            Solicitud</p>
                    </div>

                    <!--filtro de busqueda-->
                    <div class="flex h-auto">
                        <div class="flex flex-col mx-auto my-4">
                            <label for="buscar" class="text-center text-2xl text-gray-600 font-semibold">Filtro de
                                Busqueda</label>

                            <form action="../../models/consulta_solicitudModel.php" method="POST">
                                <div
                                    class="flex border border-gray-200 overflow-hidden px-2 rounded-xl shadow-lg items-center">
                                    <select required name ="FILTRO" class=" cursor-pointer py-2 px-4 bg-gray-100 border border-transparent focus:outline-none
                                    focus:ring-0 focus:ring-gray-100 focus:border-transparent">
                                        <option value="">Seleccione</option>
                                        <option value="COD_SOLICITUD">Codigo de Solicitud</option>
                                        <option value="NIT">NIT</option>
                                        <option value="ESTADO_SOLICITUD">Estado Solicitud</option>
                                    </select>
                                    <input  name="DATO_FILTRO"
                                    class="py-2 px-4 bg-gray-100 border border-transparent focus:outline-none
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
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['COD_SOLICITUD'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="John">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">No. de Expediente</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-folder-open"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['NUM_EXPEDIENTE'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="Smith">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">No. NIT</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['NIT'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="Smith">
                                    </div>
                                </div>
                            </div>


                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Tipo Solicitud</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['TIPO_SOLICITUD'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="1351328050109">
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Estado de Solicitud</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['ESTADO_SOLICITUD'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="usr">
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Usuario de Asignación</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['NOMBRE'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="usr">
                                    </div>
                                </div>

                            </div>
                            <div class="flex -mx-3">

                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Fecha de Creación</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['FECHA_SOLICITUD_INICIAL'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="00/00/0000">
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Dias de Vencimiento</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['fecha_f'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="usr">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <label class="text-xs font-semibold px-1">Cantidad de Muestras</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-syringe"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['cantidad_muestra'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="usr">
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-2 ">
                                    <label for="" class="text-xs font-semibold px-1">Cantidad de items</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-vial"></i>
                                        </div>
                                        <input type="text" value="<?php echo $_SESSION['cant_items'];?>"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="00">
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

                                        <a id="ayuda"
                                            class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out disabled">
                                            <button name="imprimir" ><i class="fas fa-print" disabled></button></i></a>

                                    </div>



                                    <div class="mx-auto my-2">
                                        <a
                                            class="text-4xl cursor-pointer hover:text-green-500 transition duration-300 ease-in-out">
                                            <button name="excel" ><i class="fas fa-file-excel"></button></i></a>
                                    </div>
                                    <div class="mx-auto my-2">
                                        <a
                                            class="text-4xl cursor-pointer hover:text-gray-400 transition duration-300 ease-in-out">
                                            <button name="limpiar"><i class="fas fa-broom"></button></i></a>
                                    </div>

                                    <label for="" class="text-xs font-semibold my-2 ">Eliminar</label>
                                    <div class="mx-auto my-2">

                                        <a
                                            class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out">
                                            <button name="eliminar"><i class="fas fa-trash-alt"></button></i></a>
                                    </div>

                                </div>


                            </div>

                            <div class=" px-5">

                                <div class="flex flex-col justify-center">

                                    <label for="" class="text-xs font-semibold my-2">Crear Solicitud</label>

                                    <div class="mx-auto my-2">

                                        <a id="ayuda"
                                            class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out"><i
                                                class="fas fa-notes-medical"></i></a>

                                    </div>

                                    <label for="" class="text-xs font-semibold my-2 ">Crear Muestra</label>
                                    <div class="mx-auto my-2">

                                        <a
                                            class="text-4xl cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out"><i
                                                class="fas fa-syringe"></i></a>
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
</body>

</html>