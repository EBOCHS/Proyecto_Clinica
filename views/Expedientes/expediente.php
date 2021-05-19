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
    <form action="../../models/ExpedienteModel.php" method="POST">   
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-700 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
             
                <div class="hidden  md:block w-1/2 bg-white">
                <div class="px-3 py-3">
                <a class="text-4xl cursor-pointer hover:text-red-500 transition duration-300 ease-in-out" href="">
                <button name="salir"><i class="fas fa-chevron-circle-left"></button></i></a>
            </div>
                    <img src="../images/data-health.jpg" alt="icono_registro" class="max-h-screen">
                </div>
                <div class="w-full md:w-1/2 py-2 px-5 md:px-10">
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-3xl text-black mt-3">Registrarse</h1>
                        <p class="text-md mt-2 font-bold">Completa la informacion para crear un expediente</p>
                    </div>
                    
                    <div>
                        <form action="../../models/ExpedienteModel.php" method="POST">
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
                                    <label for="" class="text-xs font-semibold px-1">Nombres</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="John" name="nombre">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Apellidos</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text" name="apellido"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="Smith">
                                    </div>
                                </div>
                            </div>

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Cui</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <input type="text" name="cui"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="1351328050109">
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Edad</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-sort-numeric-up-alt"></i>
                                        </div>
                                        <input type="number" min="00" max="99" name="edad"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="00">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Tipo de sangre</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-virus"></i>
                                        </div>
                                        <select required name="Tsangre" id="Tsangre"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500">
                                            <option selected>TIPO DE SANGRE</option>
                                                <option value="1" name="a+">A+</option>
                                                <option value="2">A-</option>
                                                <option value="3" name="B+">B+</option>
                                                <option value="4" name="B-">B-</option>
                                                <option value="5" name="O+">O+</option>
                                                <option value="6" name="O-">O-</option>
                                                <option value="7" name="AB+">AB+</option>
                                                <option value="8" name="AB-">AB-</option>
                                                <option value="9" name="AB-">NA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Sexo</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-venus-mars"></i>
                                        </div>
                                        <div class="mx-4">
                                            <div class="flex items-center">
                                                <input type="radio" name="sexo" value="1" id="Masculino"
                                                    checked class="mr-2">
                                                <label for="Masculino">Masculino</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" name="sexo" value="2" id="Femenino"
                                                    class="mr-2">
                                                <label for="Femenino">Femenino</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <label class="text-xs font-semibold px-1">Estado Civil</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-ring"></i>
                                        </div>
                                        <div class="mx-4">
                                        <div class="flex items-center">
                                                <input type="radio" name="Civil" value="Soltero" 
                                                    checked class="mr-2">
                                                <label for="Masculino">Soltero</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" name="Civil" value="Casado" 
                                                    class="mr-2">
                                                <label for="Femenino">Casado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">Nit</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <input type="txt" name="nit"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                            placeholder="1351328050109">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">Direccion</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <input type="text" name = "Direccion"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="1ra Av.2-16 zona 4 Guatemala">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-4">
                                    <label for="" class="text-xs font-semibold px-1">Descripcion</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fas fa-text-height"></i>
                                        </div>
                                        <textarea name="descripcion" id="descripcion" cols="30" rows="1"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mt-2">
                                    <input type="submit" value="Crear" name="Crear"
                                        class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                                </div>
                                <input type="submit" value="cancelar" name="cancelar"
                                        class="block text-center my-2 w-full max-w-xs mx-auto bg-gray-400 hover:bg-red-400 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                               
                                  
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