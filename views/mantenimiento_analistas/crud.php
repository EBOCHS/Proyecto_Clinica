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
        Mantenimiento de Analistas
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

    <link rel="stylesheet" href="../includes/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/6d0034a111.js" crossorigin="anonymous"></script>

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
        <div class="  w-full overflow-hidden text-gray-700 bg-gray-100 shadow-xl rounded-3xl" style="max-width:1300px">
            <!--BOTON DE RETORNO -->
            <div class="px-3 py-3">
                <a class="text-4xl transition duration-300 ease-in-out cursor-pointer hover:text-red-500"><button name="salir"><i class="fas fa-chevron-circle-left"></i></button></a>
            </div>

            <div class="flex justify-center mb-1">
                <div class="min-w-full pb-10">
                    <div class="mb-2 text-center">
                        <h1 class="text-3xl font-bold text-gray-800">Mantenimiento de analistas</h1>
                      
                    </div>
                </div>
                
            </div>
            
            
            <div class="flex">
            
                <!--Formulario-->
                <div class=" ml-10 mb-10 text-md" id="formulario">
                    <form class="mx-auto rounded shadow-lg" action="../../models/modelos_analista.php" method="POST">
                        
                      
                        
                        <h6 class="bg-gray-300 text-xl">Ingrese los siguientes datos</h6>
                      
                          <!--MENSAJE DE ERROR-->
                          <div class="flex justify-center mb-1">
                                <div class="flex h-auto">

                                <?php if(isset($_SESSION['message'])){ ?>        
                                       <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                                        <div class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-<?= $_SESSION['message_type'] ?>-600 text-base font-medium text-white hover:bg-<?= $_SESSION['message_type'] ?>-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                <?= $_SESSION['message'] ?>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="far fa-times-circle"></i></button>
                                            
                                          <?php unset($_SESSION['message']); ?>

                                          </div>
                                        <?php } ?>  
                                </div>

                            </div>
                            
                        <div class=" hidden mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <input id="ID_USR" type="text" name="ID_USR"  class="  w-full bg-gray-100" placeholder="Primer nombre, Segundo nombre">
                        </div>
                        <h6>Ingrese los nombres del usuario: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <input id="nombre"required type="text" name="nombres" class="  w-full bg-gray-100" placeholder="Primer nombre, Segundo nombre">
                        </div>
                        <h6>Ingrese los apellidos del usuario: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <input id="apellido"required type="text" name="apellidos" class=" w-full bg-gray-100" placeholder="Primer apellido, Segundo Apellido">
                        </div>
                        <h6>Ingrese la contraseña: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">

                            <input required id="password" name="pass" class=" w-full bg-gray-100" placeholder="Contraseña">
                        </div>
                        <h6>Ingrese el telefono del usuario: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <input id="telefono"required type="text" name="telefonos" class=" w-full bg-gray-100" placeholder="Casa/Movil">
                        </div>
                        <h6>Ingrese el correo electronico del usuario: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <input id="email"required type="email" name="mail" class=" w-full bg-gray-100" placeholder="example@correo.com">
                        </div>
                        <h6>Ingrese el CUI del Usuario: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <input id="cui"required type="text" name="cui" class=" w-full bg-gray-100" placeholder="example@correo.com">
                        </div>
                        <h6>Elija rol de usuario: </h6>
                        <div class="mb-4 flex items-center max-w-xs pr-2 overflow-hidden border border-gray-200 shadow-lg md:max-w-lg rounded-xl">
                            <select id ="rol" name="rol" required class="text-xs bg-gray-100 border border-transparent cursor-pointer md:w-auto md:text-lg md:max-w-full hover:bg-gray-300 focus:outline-none focus:ring-0 focus:ring-gray-100 focus:border-transparent" >
                                <option class="bg-gray-100" value="">Elija</option>
                                <option class="bg-gray-100" value="2">Administrador</option>
                                <option class="bg-gray-100" value="4">Analista</option>
                                <option class="bg-gray-100" value="1">Interno</option>
                                <option class="bg-gray-100" value="5">Laboratorista</option>
                                
                                
                            </select>
                        </div>
                        <div class="flex">
                            <input id="crear"type="submit" class="mb-4 mx-4 block w-24  bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" name="Crear" value="Crear">
                            <input id="editar"type="submit" class=" hidden mb-4 mx-4 block w-24  bg-blue-500 hover:bg-blue-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" name="Editar" value="Editar">
                            <input onclick="cancelar()" class="mb-4 mx-4 block w-24 bg-gray-500 hover:bg-red-300 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" value="Cancelar">
                        </div>
                    </form>
                </div>

                <!--TABLA-->
                <div class="mb-10 mx-auto">
                    <table class="mx-auto rounded shadow-lg">
                        <thead class="">
                            <tr class="text-xs leading-normal text-gray-600 uppercase bg-gray-200 md:text-sm">
                            <th class="hidden w-20 text-left px-4">ID_USR</th>
                                <th class="w-20 text-left px-4">Nombre</th>
                                <th class="w-20 text-left px-4">Apellido</th>
                                <th class="w-20 text-left px-4">Password</th>
                                <th class="w-20 text-left px-4">Telefonos</th>
                                <th class="w-20 text-left px-4">Correo</th>
                                <th class="hidden w-20 text-left px-4">CUI</th>
                                <th class="w-20 text-left px-4">Rol</th>
                                <th class="w-20 text-left px-4">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
  $id_usuario=$_SESSION['ID'];
  $query = "SELECT P.ID_PACIENTE,P.NOMBRE ,P.APELLIDO ,P.CUI ,P.TELEFONO,P.EMAIL,U.ALIAS ,R.DESCRIPCION,U.PASSWD FROM PACIENTE P 
  INNER JOIN USUARIO U ON U.ID_PACIENTE = P.ID_PACIENTE
  INNER JOIN  ROL_USUARIO  R ON U.ID_ROL_USUARIO = R.ID_ROL_USUARIO  WHERE U.ESTADO='ACTIVO' ";
  $res = mysqli_query($conn, $query);
  while ($rows = mysqli_fetch_array($res)) {
      

                              ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class=" hidden w-20 text-left px-4"><?php echo $rows['ID_PACIENTE'];?></td>
                                <td class="w-20 text-left px-4"><?php echo $rows['NOMBRE'];?></td>
                                <td class="w-20 text-left px-4"><?php echo $rows['APELLIDO'];?></td>
                                <td class="w-20 text-left px-4"><?php echo $rows['PASSWD'];?></td>
                                <td class="w-20 text-left px-4"><?php echo $rows['TELEFONO'];?></td>
                                <td class="w-20 text-left px-4"><?php echo $rows['EMAIL'];?></td>
                                <td class="hidden w-20 text-left px-4"><?php echo $rows['CUI'];?></td>
                                <td class="w-20 text-left px-4"><?php echo $rows['DESCRIPCION'];?></td>
                                <td class="w-20 text-left px-4">
                                    <a onclick="mostrarForm('<?php echo $rows['ID_PACIENTE']; ?>','<?php echo $rows['PASSWD']; ?>','<?php echo $rows['NOMBRE']; ?>','<?php echo $rows['APELLIDO']; ?>','<?php echo $rows['TELEFONO']; ?>','<?php echo $rows['EMAIL']; ?>','<?php echo $rows['CUI']; ?>','<?php echo $rows['DESCRIPCION']; ?>');" 
                                    class="px-2 transition duration-300 ease-in-out cursor-pointer hover:text-blue-500"><i class="fas fa-marker"></i></a>
                                    <form  action="../../models/eliminar_usuario.php" method="POST">
                                        <a onclick="return alerta()" class="px-2 transition duration-300 ease-in-out cursor-pointer hover:text-red-500" id="eliminar"><button  name="eliminar" ><i class="far fa-trash-alt" ></i></button></a>
                                        <input type="hidden" name="id" value="<?php echo $rows['ID_PACIENTE'];?> ">
                                    </form>
                                </td>
                            </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c658240a4e.js" crossorigin="anonymous"></script>


    <script src="script.js"></script>

    <script>
        function mostrarForm(id,password,nombre,apellido,telefono,email,cui,rol) {
            $("#ID_USR").val(id);
            $("#eliminar").val(id);
            $("#password").val(password);
            $("#nombre").val(nombre);
            $("#apellido").val(apellido);
            $("#telefono").val(telefono);
            $("#email").val(email);
            $("#cui").val(cui);
            $("#rol").val(rol);
            $("#crear").hide();
            $("#editar").show();
        }

        function cancelar () {
           $("#ID_USR").val("");
            $("#password").val("");
            $("#nombre").val("");
            $("#apellido").val("");
            $("#telefono").val("");
            $("#email").val("");
            $("#cui").val("");
            $("#rol").val("");
            $("#crear").show();
            $("#editar").hide();
        }

    function alerta(){
       
    var opcion = confirm("¿Está seguro de Eliminar el usuario?");
    if (opcion == true) {
      alert('usuario eliminado');
	} else {
	    return false; 
	}
}
      
    </script>
</body>

</html>