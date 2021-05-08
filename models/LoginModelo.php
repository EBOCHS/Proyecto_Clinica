<?php
include ("../config/databases.php");
include ("../controllers/C_Login.php");
if(!isset ($_SESSION['usuario'])){
    header ("location: ../views/Login/Vista_Login.php");
}
else{
    if(isset($_POST['Interno'])){
        header ("location: ../views/Expedientes/expedientes.php");
    }else{
    header ("location: ../views/inicio/index.php");
    }
}

if(isset($_POST['Sign_in'])){
    $c_login = new Validar_login;

    $User = $_POST['usuario'];
    $Pass = $_POST['password'];
    //echo ("usuario: ".$User." password:".$Pass);
    //FUNCIONES PARA VALIDAR DATOS INGRESADOS 
    if($c_login->val_usuario($User)!=true){
        if($c_login->val_password($Pass)!=true){
            $queri ="SELECT PS.NOMBRE, US.PASSWD, RL.DESCRIPCION  FROM USUARIO US
            INNER JOIN PACIENTE PS ON US.ID_PACIENTE = PS.ID_PACIENTE 
            INNER  JOIN ROL_USUARIO RL ON  US.ID_ROL_USUARIO = RL.ID_ROL_USUARIO WHERE PS.NOMBRE = '$User' AND US.PASSWD = '$Pass'";
            $res=mysqli_query($conn,$queri);
            $respuesta=mysqli_query($conn,$queri);
        if(mysqli_fetch_array($respuesta)==0){
            $_SESSION['message']='Datos incorrectos ';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Login/Vista_Login.php");
        }else{    
  
        while( $row = mysqli_fetch_array($res)){
            $_SESSION['usuario']= $row['NOMBRE'];
            //echo( $row['NOMBRE']." contraseña: ");
            //echo( $row['PASSWD']." Tipo usuario: ");
            //echo( $row['DESCRIPCION']);
             $_SESSION['Tipo_usuario']= $row['DESCRIPCION'];
             }
             
             header ("location: ../views/inicio/index.php");
            }
        }else{
            $_SESSION['message']='contraseña incorrecta: ';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Login/Vista_Login.php");
        }
        

    }
    else{
        $_SESSION['message']='Usuario incorrecto ';
        $_SESSION['message_type']='danger';
        header("Location: ../views/Login/Vista_Login.php");

    }
            
}
if(isset($_POST['cerrar'])){
    session_start();
    session_destroy();
    header("Location: ../views/inicio/index.php");


}

?>