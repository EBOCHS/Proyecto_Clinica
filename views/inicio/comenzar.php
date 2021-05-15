<!DOCTYPE html>
<html lang="en">

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
    <style>
        .gradient {
            background: linear-gradient(40deg, #afcfff 0%, #1258da 100%);
        }
    </style>
</head>

<body class="gradient overflow-hidden">
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
    <div id="hero" class="min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative hidden">
        <div
            class="w-full max-w-6xl rounded-3xl bg-white shadow-xl p-10 lg:px-20 lg:py-32 mx-auto text-gray-800 relative md:text-left">
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="relative">
                        <img src="../images/5160427.jpg"
                            class="w-full relative z-10 transform -skew-y-1 hover:scale-105 transition duration-700 hover:ease-in-out shadow-xl"
                            alt="">
                        <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h1 class="font-bold uppercase text-2xl mb-5">Para Comenzar <br>Debes crear un expediente</h1>
                        <p class="text-md">Un expediente te ayudara a llevar un registro completo de todas tus
                            consultas,
                            examenes y resultados, el cual utilizamos para ayudarte de la mejor manera.
                    </div>
                    <div>
                        <div class="inline-block align-bottom">
                            <a href="../Expedientes/expediente.php"
                                class="bg-blue-600 shadow-xl transition duration-500 hover:bg-blue-400 text-gray-100 hover:text-gray-900 rounded-full px-10 py-4 font-semibold"><i
                                    class="mdi mdi-cart -ml-2 mr-2"></i>Continuar
                            </a>
                            <a href="index.php"
                                class="bg-gray-300 mx-4 transition duration-500 opacity-50 hover:opacity-100 text-red-600 rounded-full px-8 py-4 font-semibold"><i
                                    class="mdi mdi-cart -ml-2 mr-2"></i>En otro momento
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>