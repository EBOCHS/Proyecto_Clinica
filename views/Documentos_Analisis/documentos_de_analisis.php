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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
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

    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl  py-4 w-auto">

            <!--Boton de retorno-->

            <div class="px-4 py-1">
                <a class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-red-500" href="../inicio/menu_interno.php"><i class="fas fa-chevron-circle-left"></i></a>
            </div>

            <!---->
            <div class="mb-2 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Creación de Documentos de Análisis
                </h1>
            </div>

            <!--columna de listado de solicitudes-->
            <div class="md:flex w-full justify-around">
                <div class="flex flex-col w-full py-2 px-5 md:px-10">
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-2xl text-black mt-3"> Listado de Solicitudes</h1>

                    </div>
                    <div class="flex w-auto px-3 mb-5">
                        <table class="mx-auto max-w-sm bg-white table-auto lg:w-full ">
                            <thead>
                                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200 md:text-sm">
                                    <th class="px-2 py-3 text-left md:px-6">Codigo solicitud</th>
                                    <th class="px-2 py-3 text-left md:px-6">Tipo de solicitud</th>
                                    <th class="px-2 py-3 text-left md:px-6">Fecha creacion</th>
                                    <th class="px-2 py-3 text-left md:px-6">Estado</th>
                                    <th class="px-2 py-3 text-left md:px-6">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs font-light text-gray-600 md:text-sm">

                                <?php
                                if (isset($_SESSION['analista'])) {
                                    $id =  $_SESSION['ID'];
                                    $query = "SELECT s.COD_SOLICITUD, s.TIPO_SOLICITUD,s.ESTADO_SOLICITUD,p.NIT, e.NUM_EXPEDIENTE, mm.codigo_muestra , s.TIPO_SOLICITANTE,FECHA_SOLICITUD_INICIAL, CURDATE(), mm.tipo_muestra, mm.presentacion_muestra, mm.estado, mm.FECHA_CREACION  
                                    from SOLICITUD s 
                                    inner join 
                                    EXPEDIENTE e on s.ID_EXPEDIENTE =e.ID_EXPEDIENTE inner join
                                    MUESTRAS_MEDICAS mm on s.ID_SOLICITUD = mm.id_solicitud 
                                    INNER JOIN PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE
                                    inner join SOLICITUDES_ASIGNADAS sa on sa.ID_SOLICITUD = s.ID_SOLICITUD
                                    inner JOIN  USUARIO u on u.ID_USUARIO = sa.ID_USUARIO 
                                    where u.ID_USUARIO = '$id'";
                                    $res = mysqli_query($conn, $query);
                                    while ($rows = mysqli_fetch_array($res)) {
                                ?>
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 text-left md:px-6 whitespace-nowrap">
                                                <span class="font-medium"><?php echo $rows['COD_SOLICITUD']; ?></span>
                                            </td>
                                            <td class="py-3 text-left md:px-6">
                                                <span><?php echo $rows['TIPO_SOLICITUD']; ?></span>
                                            </td>
                                            <td class="py-3 text-left md:px-6">
                                                <p><?php echo $rows['FECHA_SOLICITUD_INICIAL']; ?></p>
                                            </td>
                                            <td class="py-3 text-left md:px-6">
                                                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-200 rounded-full"><?php echo $rows['ESTADO_SOLICITUD']; ?></span>
                                            </td>
                                            <td class="hidden px-2 py-3 text-center md:px-6 md:block">
                                                <div class="flex justify-center text-xl item-center">

                                                    <div class=" flex justify-centercursor-pointer w-4 mx-2 transform hover:text-blue-600 hover:scale-110">
                                                        <a onclick="mostrarForm('<?php echo $rows['COD_SOLICITUD']; ?>','<?php echo $rows['ESTADO_SOLICITUD']; ?>','<?php echo $rows['NIT']; ?>','<?php echo $rows['NUM_EXPEDIENTE']; ?>'
                                                        ,'<?php echo $rows['codigo_muestra']; ?>','<?php echo $rows['TIPO_SOLICITANTE']; ?>','<?php echo $rows['FECHA_SOLICITUD_INICIAL']; ?>','<?php echo $rows['CURDATE()']; ?>');"><i class="fas fa-file-alt"></i></a>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--FORMULARIO CREAR DOCUMENTO -->

            <div class="hidden mx-20" id="opciones">
                <div class="text-center mb-4">
                    <h1 class="font-bold text-2xl text-black mt-3">Creación de Documento</h1>
                    <p class="text-md mt-2 font-bold">Información del Documento</p>
                </div>
                <div class="">
                    <form class="" action="../../models/Documento_analisis.php" method="POST">
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Codigo de Solicitud</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="cod_solicitud" id="cambiarCodigo" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000-00-00-00-0000000000">
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Estado Actual</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="estado" id="cambiarEstado" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                                </div>
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Tipo de Documento</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <select required name="tipo_doc" id="NEW_ESTADO" class="cursor-pointer text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                        <option value="">Elija</option>
                                        <option value="PE-01">PE-01 Certificación de muestra médica</option>
                                        <option value="PE-02">PE-02 Dictamen de muestra médica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Nit</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="nit" id="nit" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                                </div>
                            </div>

                        </div>

                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">No. Expediente</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="expediente" id="expediente" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000-00-00-00-0000000000">
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Código Muestra</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="cod_muestra" id="muestra" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Usuario de asignación</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="us_asignacion" id="usr_asignacion" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000-00-00-00-0000000000">
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Usuario de creación</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="us_creacion" id="usr_creacion" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Fecha creación</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="fecha" id="fecha_creacion" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000-00-00-00-0000000000">
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Fecha emisión</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-id-card"></i>
                                    </div>

                                    <input name="emision" id="fecha_emision" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                                </div>
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-4">
                                <label for="" class="text-xs font-semibold px-1">Conclusión</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="fas fa-text-height"></i>
                                    </div>
                                    <textarea name="conclusion" id="descripcion" cols="30" rows="1" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">


                            <!--OPCIONES DEL FORM-->
                            <form class="flex py-2 mx-auto mt-2 rounded-lg shadow-lg lg:mt-0 bg-gray-20 lg:mx-0" action="../../models/consulta_muestras.php" method="POST">

                                <div class="px-5">
                                    <div class="flex  justify-center text-center">


                                        <div class="mx-auto my-2">

                                            <!--BOTON PARA PDF-->
                                            <a id="ayuda" class=" mx-10 text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-blue-500"><button name="pdf"><i class="fas fa-print"></button></i></a>

                                        </div>

                                        <div class="mx-auto my-2">
                                            <!--BOTON PARA EXCEL-->
                                            <a class="mx-10 text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-green-500"><button name="exel"><i class="fas fa-file-excel"></button></i></a>
                                        </div>
                                        <div class="mx-auto my-2">

                                            <a onclick="ocultarForm();" Class="mx-10 text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-red-500"><button name="imprimir"><i class="far fa-times-circle"></button></i></a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>


    <script>
        function mostrarForm(codigoSolicitud, estadoSolicitud, nit, n_expediente, codMuestra, usr_creacion, fecha_creacion, fecha_emision) {
            $("#cambiarCodigo").val(codigoSolicitud);
            $("#cambiarEstado").val(estadoSolicitud);
            $("#nit").val(nit);
            $("#expediente").val(n_expediente);
            $("#muestra").val(codMuestra);
            $("#usr_asignacion").val("ANALISTA");
            $("#usr_creacion").val(usr_creacion);
            $("#fecha_creacion").val(fecha_creacion);
            $("#fecha_emision").val(fecha_emision);
            $("#opciones").slideToggle("slow");
        }

        function ocultarForm() {

            $("#opciones").hide();
        }
    </script>
</body>

</html>