<?php
include ("../config/databases.php");
include ("../controllers/C_Login.php");

/*if(!isset ($_SESSION['usuario'])){
    header ("location: ../views/Login/Vista_Login.php");
}
else{
    if(isset($_POST['Interno'])){
        header ("location: ../views/Expedientes/expedientes.php");
    }else{
    header ("location: ../views/inicio/index.php");
    }
}*/

if(isset($_POST['Sign_in'])){
    $c_login = new Validar_login;

    $User = $_POST['usuario'];
    $Pass = $_POST['password'];
    //FUNCIONES PARA VALIDAR DATOS INGRESADOS 
    if($c_login->val_usuario($User)!=true){
        if($c_login->val_password($Pass)!=true){
            $queri ="SELECT PS.NOMBRE, US.PASSWD, RL.DESCRIPCION  FROM USUARIO US
            INNER JOIN PACIENTE PS ON US.ID_PACIENTE = PS.ID_PACIENTE 
            INNER  JOIN ROL_USUARIO RL ON  US.ID_ROL_USUARIO = RL.ID_ROL_USUARIO WHERE PS.NOMBRE = '$User' AND US.PASSWD = '$Pass'";
            $res=mysqli_query($conn,$queri);
            $respuesta=mysqli_query($conn,$queri);
        if(mysqli_fetch_array($respuesta)==0){
            $_SESSION['message']='Datos Incorrectos ';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Login/login.php");
        }else{    
  
        while( $row = mysqli_fetch_array($res)){
            if($row['DESCRIPCION']=="analista"){
                $_SESSION['usuario']= $row['NOMBRE'];
                $_SESSION['analista']=$row['DESCRIPCION'];
                //header ("location: ../views/inicio/menu_interno.php");
            }{
                $_SESSION['usuario']= $row['NOMBRE'];//interno            
                $_SESSION['Tipo_usuario']= $row['DESCRIPCION'];

            }
             }
             header ("location: ../views/inicio/menu_interno.php");
            }
        }else{
          
            //echo "Contraseña incorrecta";
            $_SESSION['message']='contraseña incorrecta ';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Login/login.php");
        }
        

    }
    else{
        echo "usuario incorrecto";
        $_SESSION['message']='Usuario incorrecto ';
        $_SESSION['message_type']='danger';
        header("Location: ../views/Login/login.php");

    }
            
}
if(isset($_POST['cerrar'])){
    session_start();
    session_destroy();
    header("Location: ../views/inicio/index.php");
}

?>