<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Gestion de solicitudes
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

<body class="min-h-screen px-2 pt-10 pb-6 gradient md:pt-4 md:px-0 ">
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

    <div class="flex items-center justify-center min-h-screen min-w-screen">
        <div class="w-full overflow-hidden text-gray-700 bg-gray-100 shadow-xl rounded-3xl" style="max-width:1000px">
            <!--BOTON DE RETORNO -->
            <div class="px-3 py-3">
                <a class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-red-500" href=""><i
                        class="fas fa-chevron-circle-left"></i></a>
            </div>

            <div class="flex justify-center mb-1">
                <div class="min-w-full pb-10">
                    <div class="mb-2 text-center">
                        <h1 class="text-3xl font-bold text-gray-800">Gestion de solicitudes de muestras</h1>

                    </div>

                    <!--filtro de busqueda-->
                    <div class="flex h-auto">
                        <div class="flex flex-col mx-auto my-4">
                            <label for="buscar" class="mb-2 text-2xl font-semibold text-center text-gray-500">Filtro de
                                Busqueda</label>

                            <form action="../../models/consulta_muestras.php" method="POST">
                                <div
                                    class="flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                                    <select required name="condicion" id="Tsangre"
                                        class="w-32 px-4 py-2 text-sm bg-gray-100 border border-transparent cursor-pointer md:w-auto md:text-lg md:max-w-full hover:bg-gray-300 focus:outline-none focus:ring-0 focus:ring-gray-100 focus:border-transparent">
                                        <option value="0">Seleccione</option>
                                        <option class="bg-gray-100" value="cod_expediente">Codigo de Expediente</option>
                                        <option class="bg-gray-100" value="cod_muestra">Codigo de Muestra</option>
                                        <option class="bg-gray-100" value="cod_solicitud">Codigo de Solicitud</option>
                                        <option class="bg-gray-100" value="nit">NIT</option>
                                    </select>
                                    <input name ="busqueda";
                                        class="w-full px-4 py-2 bg-gray-100 border border-transparent focus:outline-none focus:ring-0 focus:ring-gray-100 focus:border-transparent"
                                        type="text">
                                    <button type="submit" class="mx-2" name= "buscar"><i class="text-xl fas fa-search"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="flex flex-col justify-around mt-4 md:flex-row">
                        <div class="flex flex-col">
                            <div class="flex justify-around w-full mb-4 bg-gray-100 rounded-lg shadow-lg">
                                <div class="p-2">
                                    <label class="text-xs font-semibold">No. Expediente</label>
                                    <p>003515105</p>
                                </div>
                                <div class="p-2">
                                    <label class="text-xs font-semibold">Nombre</label>
                                    <p>Dolores del Ano</p>
                                </div>
                                <div class="p-2">
                                    <label class="text-xs font-semibold">Nit</label>
                                    <p>85134146</p>
                                </div>
                            </div>
                            <div class="flex w-auto lg:w-full">
                                <div class="mx-auto rounded shadow-lg">
                                    <table class="max-w-sm bg-white table-auto lg:w-full ">
                                        <thead>
                                            <tr
                                                class="text-xs leading-normal text-gray-600 uppercase bg-gray-200 md:text-sm">
                                                <th class="px-2 py-3 text-left md:px-6">Codigo solicitud</th>
                                                
                                                <th class="px-2 py-3 text-left md:px-6">Tipo de solicitud</th>
                                                <th class="px-2 py-3 text-left md:px-6">Fecha creacion</th>
                                                <th class="px-2 py-3 text-left md:px-6">Estado</th>
                                                <th class="hidden px-2 py-3 text-left md:px-6 md:block">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-xs font-light text-gray-600 md:text-sm">
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="py-3 text-left md:px-6 whitespace-nowrap">
                                                    <span class="font-medium">01020350</span>
                                                </td>
                                                <td class="py-3 text-left md:px-6">
                                                    <span>alv</span>
                                                </td>
                                                <td class="py-3 text-left md:px-6">
                                                    <p>15/05/2021</p>
                                                </td>
                                                <td class="py-3 text-left md:px-6">
                                                    <span
                                                        class="px-3 py-1 text-xs text-blue-600 bg-blue-200 rounded-full">Activo</span>
                                                </td>
                                                <td class="hidden px-2 py-3 text-center md:px-6 md:block">
                                                    <div class="flex justify-center text-xl item-center">
                                                        <div
                                                            class="w-4 mr-2 transform cursor-pointer hover:text-blue-600 hover:scale-110">
                                                            <a onclick="viewOverlay();"><i class="fas fa-eye"></i></a>
                                                        </div>
                                                        <div
                                                            class="w-4 mx-2 transform hover:text-blue-600 hover:scale-110">
                                                            <a href=""><i class="fas fa-pencil-alt"></i></a>
                                                        </div>
                                                        <div
                                                            class="w-4 ml-2 transform hover:text-blue-600 hover:scale-110">
                                                            <a href=""><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--OPCIONES DEL FORM-->
                        <div class="flex py-2 mx-auto mt-4 rounded-lg shadow-lg lg:mt-0 bg-gray-50 lg:mx-0">
                            <div class="px-5">
                                <div class="flex flex-col justify-center text-center">

                                    <label for="" class="my-2 text-xs font-semibold">Imprimir</label>

                                    <div class="mx-auto my-2">

                                        <a id="ayuda"
                                            class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-blue-500"><i
                                                class="fas fa-print"></i></a>

                                    </div>

                                    <label for="" class="my-2 text-xs font-semibold">Exportar a excel</label>

                                    <div class="mx-auto my-2">
                                        <a
                                            class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-green-500"><i
                                                class="fas fa-file-excel"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="px-5 ">

                                <div class="flex flex-col justify-center">

                                    <label for="" class="my-2 text-xs font-semibold">Crear Solicitud</label>

                                    <div class="mx-auto my-2">

                                        <a id="ayuda"
                                            class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-blue-500"><i
                                                class="fas fa-notes-medical"></i></a>

                                    </div>

                                    <label for="" class="my-2 text-xs font-semibold ">Crear Muestra</label>
                                    <div class="mx-auto my-2">

                                        <a
                                            class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-blue-500"><i
                                                class="fas fa-syringe"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!---OVERLAY-->
    <div class="hidden" id="over">
        <div class="w-auto h-auto px-4 py-10 bg-white shadow-lg rounded-xl">
            <a href="#" onclick="closePopup();"
                class="float-right text-lg text-gray-600 transition duration-500 ease-in-out hover:text-black"><i
                    class="fas fa-times"></i></a>
            <div class="flex flex-col">
                <h3 class="text-2xl text-center">Datos de la solicitud.</h3>
                <div class="flex justify-center my-2">
                    <div class="flex mx-2">
                        <p class="font-bold">Codigo de Solicitud:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $nombres; ?>
                        </p>
                    </div>
                    <div class="flex mx-2">
                        <p class="font-bold">Tipo de solicitud:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $apellidos; ?>
                        </p>
                    </div>
                </div>
                <div class="flex justify-center my-2">
                    <div class="flex mx-2">
                        <p class="font-bold">Fecha de Creacion:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $cui; ?>
                        </p>
                    </div>
                    <div class="flex mx-2">
                        <p class="font-bold">Estado:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $edad; ?>
                        </p>
                    </div>
                </div>
                <div class="flex justify-center my-2">
                    <div class="flex mx-2">
                        <p class="font-bold">Usuario de Asignacion:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $tsangre; ?>
                        </p>
                    </div>
                    <div class="flex mx-2">
                        <p class="font-bold">Cantidad de Muestras:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $genero; ?>
                        </p>
                    </div>
                </div>
                <div class="flex justify-center my-2">
                    <div class="flex mx-2">
                        <p class="font-bold">Cantidad de items:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $estadocivil; ?>
                        </p>
                    </div>
                    <div class="flex mx-2">
                        <p class="font-bold">Dias de Vencimiento:</p>
                        <p class="mx-2 text-gray-700">
                            <?php echo $nit; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>