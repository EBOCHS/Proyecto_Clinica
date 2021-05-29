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
        <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl   py-4 w-auto">

            <!--Boton de retorno-->

            <div class="px-4 py-1">
                <a class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-red-500" href="../inicio/menu_interno.php"><i class="fas fa-chevron-circle-left"></i></a>
            </div>

            <!---->
            <div class="mb-2 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Asignación y traslado de solicitud
                </h1>
            </div>

            <!--columna de listado de solicitudes-->
            <div class="md:flex w-full justify-around">
                <div class="flex flex-col w-full py-2 px-5 md:px-10">
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-2xl text-black mt-3"> Listado de Solicitudes de Muestra Médica</h1>
                        
                    </div>
                    
                    <div class="flex w-auto px-3 mb-5">
                        <table class="mx-auto max-w-sm bg-white table-auto lg:w-full ">
                            <thead>
                                <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200 md:text-sm">
                                    <th class="px-2 py-3 text-left md:px-6">Codigo solicitud</th>
                                    <th class="px-2 py-3 text-left md:px-6">Tipo de solicitud</th>
                                    <th class="px-2 py-3 text-left md:px-6">Fecha creacion</th>
                                    <th class="px-2 py-3 text-left md:px-6">Estado</th>
                                    <th class="px-2 py-3 text-left md:px-6">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs font-light text-gray-600 md:text-sm">

                                <?php
                                if (isset($_SESSION['analista'])) {
                                    $id_usuario=$_SESSION['ID'];
                                    $query = "SELECT  * FROM SOLICITUDES_ASIGNADAS sa 
                                    INNER JOIN USUARIO U ON sa.ID_USUARIO = U.ID_USUARIO
                                    INNER JOIN SOLICITUD S ON sa.ID_SOLICITUD = S.ID_SOLICITUD 
                                    WHERE  U.ID_USUARIO ='$id_usuario' AND S.ESTADO_SOLICITUD='ANALISIS' OR S.ESTADO_SOLICITUD='REVISION' OR S.ESTADO_SOLICITUD='FINALIZADO' " ;
                                    $res = mysqli_query($conn, $query);
                                    while ($rows = mysqli_fetch_array($res)) { ?>
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

                                                    <div class="cursor-pointer w-4 mx-2 transform hover:text-blue-600 hover:scale-110">
                                                        <a onclick="mostrarForm('<?php echo $rows['COD_SOLICITUD']; ?>','<?php echo $rows['ESTADO_SOLICITUD']; ?>');"><i class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                </div>
                                                <div class="flex justify-center text-xl item-center">
                                                    <div class="cursor-pointer w-4 ml-2 transform hover:text-blue-600 hover:scale-110">

                                                    <form action="../../models/asignar_solicitud_M.php" method="POST">
                                                        <a onclick="return alerta()" id="eliminar"><button name= "eliminar" ><i class="far fa-trash-alt"></i></button></a>
                                                        <input type="hidden" name="id" value="<?php echo $rows['ID_SOLICITUD'];?> ">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                     
                
                               <?php }
                                 else {
                                    $query = "SELECT ID_SOLICITUD,COD_SOLICITUD,TIPO_SOLICITUD,FECHA_SOLICITUD_INICIAL,ESTADO_SOLICITUD from SOLICITUD s 
                                    where ESTADO_SOLICITUD='creado'";
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

                                                    <div class="cursor-pointer w-4 mx-2 transform hover:text-blue-600 hover:scale-110">
                                                        <a onclick="mostrarForm('<?php echo $rows['COD_SOLICITUD']; ?>','<?php echo $rows['ESTADO_SOLICITUD']; ?>');"><i class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                </div>
                                                <div class="flex justify-center text-xl item-center">
                                                    <div class="cursor-pointer w-4 ml-2 transform hover:text-blue-600 hover:scale-110">
                                                    <form action="../../models/asignar_solicitud_M.php" method="POST">
                                                        <a onclick="return alerta()" id="eliminar"><button name= "eliminar" ><i class="far fa-trash-alt"></i></button></a>
                                                        <input type="hidden" name="id" value="<?php echo $rows['ID_SOLICITUD'];?> ">
                                                        </form>
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
                <!--Columna de opciones -->

                <div class="hidden w-full  md:max-w-md py-2 px-5 md:px-10" id="opciones">
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-2xl text-black mt-3">Cambio de Estado</h1>
                        <p class="text-md mt-2 font-bold">Completa la información para realizar el cambio</p>
                    </div>
                    <div>
                        <form action="../../models/asignar_solicitud_M.php" method="POST">
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Codigo de Solicitud</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>

                                        <input name="CODIGO" id="cambiarCodigo" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="0000-00-00-00-0000000000">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Estado Actual</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>

                                        <input name="ESTADO_OLD" id="cambiarEstado" type="text" class="text-xs w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">

                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">Nuevo Estado</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <select required name="NEW_ESTADO" id="NEW_ESTADO" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option value="">Elija</option>
                                           
                                            <option value="REVISION">Revision</option>
                                            <option value="ANALISIS">Analisis</option>
                                            <option value="FINALIZADO">Finalizado</option>
                                        </select>
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
                                        <textarea name="DESC" id="descripcion" cols="30" rows="1" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-4">
                                    <label for="" class="text-xs font-semibold px-1">Observaciones</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-text-height"></i>
                                        </div>
                                        <textarea name="observaciones" id="descripcion" cols="30" rows="1" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mt-2">
                                    <!--validacion de formularios en el documento de javascript-->
                                    <input type="submit" onclick="return cambio()" value="Asignar" name="asignar" class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <a onclick="mostrarForm('<?php echo $rows['COD_SOLICITUD']; ?>','<?php echo $rows['ESTADO_SOLICITUD']; ?>');" class="block text-center my-2 w-full max-w-xs mx-auto bg-gray-400 hover:bg-red-400 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function mostrarForm(codigoSolicitud, estadoSolicitud) {
            $("#cambiarCodigo").val(codigoSolicitud);
            $("#cambiarEstado").val(estadoSolicitud);

            $("#opciones").slideToggle("slow");
        }
    function alerta(){
       var opcion = confirm("¿Está Seguro de Eliminar La solicitud?");
       if (opcion == true) {
         alert('Solicitud eliminado');
       } else {
           return false; 
       }
    }
    function cambio(){
       var opcion = confirm("¿Está Seguro de Cambiar el estado de la solicitud?");
       if (opcion == true) {
         alert('Estado Actualizado');
       } else {
           return false; 
       }
    }
    </script>
</body>

</html>