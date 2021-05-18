<?php
include ("../../config/databases.php");
?>
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
      background: linear-gradient(90deg, #0354eb 0%, #e7f1ff 100%);
    }
  </style>
</head>

<body class="leading-normal tracking-normal text-white gradient overflow-hidden"

  style="font-family: 'Source Sans Pro', sans-serif;">
  <!--Loader-->
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

  <!--Nav-->
  <nav id="header" class="fixed w-full z-30 top-0 text-white hidden">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center">
        <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
          <!--Icono: -->
          <p><i class="fas fa-briefcase-medical"></i> CLINICA</p>
          LA BENDICION
        </a>
      </div>
      <div class="block lg:hidden pr-4">
        <button id="nav-toggle"
          class="flex items-center p-1 text-blue-500 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <i class="fas fa-caret-square-down text-4xl"></i>
          <title>Menu</title>
        </button>
      </div>
      <div
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
        id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center transition duration-1000">
          <li
            class="mr-3 bg-white hover:bg-blue-300 text-gray-900 font-bold rounded-full mt-4 lg:mt-0 py-2 px-5 shadow focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a class="inline-block text-black no-underline hover:text-underline " href="../Expedientes/expediente.php">Crear Expediente</a>
          </li>
          <li
            class="mr-3 bg-white hover:bg-blue-300 text-gray-900 font-bold rounded-full mt-4 lg:mt-0 py-2 px-5 shadow focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a class="inline-block text-black no-underline hover:text-underline" href="../solicitud/solicitud.php">Gestionar
              Solicitudes</a>
          </li>
        </ul>
        <a href="../Login/login.php"><button id="navAction"
            class="mx-auto lg:mx-0 bg-white hover:bg-blue-300 text-gray-900 font-bold rounded-full mt-4 lg:mt-0 py-1 px-8 shadow focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Login <?php echo $_SESSION['usuario']?><i class="fas fa-user-circle m-2"></i>
          </button>
        </a>
      </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
  </nav>
  <!--Hero-->
  <div id="hero" class="pt-24 mb-10 hidden">
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
      <!--Left Col-->
      <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
        <p class="uppercase tracking-loose w-full">#QuedateEnCasa</p>
        <h1 class="my-4 text-5xl font-bold leading-tight">
          Estamos felices por cuidar de tu salud y la de tu familia
        </h1>
        <p class="leading-normal text-2xl mb-8">
          Puedes gestionar cualquier consulta o laboratorio desde aqui!
        </p>
        <a href="comenzar.php">
          <button
            class="mx-auto lg:mx-0 text-2xl hover:bg-blue-500 hover:text-gray-100 bg-white text-gray-800 font-bold rounded-xl my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Comenzar
          </button>
        </a>
      </div>
      <!--Right Col-->
      <div class="w-full md:w-3/5 py-6 text-center">
        <img
          class="w-full md:w-4/5 z-50 my-14 ml-24 rounded-xl shadow-xl transform skew-y-2 hover:scale-105 transition duration-700 hover:ease-in-out"
          src="../images/hero.jpg" />
      </div>
    </div>
  </div>
  <div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
          <path
            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
            opacity="0.100000001"></path>
          <path
            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
            opacity="0.100000001"></path>
          <path
            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
            id="Path-4" opacity="0.200000003"></path>
        </g>
        <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
          <path
            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
          </path>
        </g>
      </g>
    </svg>
  </div>


  <!--Footer-->
  <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
  <script src="script.js"></script>
</body>

</html>