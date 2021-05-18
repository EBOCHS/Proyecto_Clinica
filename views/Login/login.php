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

    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4xl font-bold text-gray-700 text-center">Sistema Interno</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-4 rounded-lg shadow-2xl">
        <section>
            <h3 class="text-2xl text-gray-800">Bienvenido</h3>
            <p class="text-gray-600 pt-2">Inicie Sesion en tu cuenta.</p>
        </section>
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

        <section class="mt-6">
        
                         
            <form class="flex flex-col" method="POST" action="../../models/LoginModelo.php">
                <div class="mb-6 pt-3 rounded bg-gray-100 shadow-md">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Nombre Usuario</label>
                    <input type="text" name="usuario"
                        class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-100 shadow-md">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3">
                </div>
                
                <div class="flex justify-around">
                    <button
                        class="bg-blue-600 w-44 transition duration-700 hover:bg-blue-200 hover:text-blue-800 text-white font-bold rounded shadow-lg hover:shadow-xl transition duration-200"
                        type="submit" name="Sign_in" >Iniciar</button>
                    <a href="../inicio/index.php"
                        class="bg-gray-100 w-44 mb-2 text-center mt-2 transition duration-700 hover:bg-gray-300 hover:text-red-500 text-gray-700 font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>


</body>

</html>