<?php
include ("../controllers/C_asociar.php");
include ("../config/databases.php");
    if(isset($_POST['BUSCAR'])){
        $get_codigo_muestra = $_POST['codigo'];
     
        $C_asociar = new asociar;

        $estado = $C_asociar->val_codigo_muestra($get_codigo_muestra);
       if($estado==true){
            $queri = "SELECT  COUNT(*) from MUESTRAS_MEDICAS  WHERE  codigo_muestra='$get_codigo_muestra' ";
            $res = mysqli_query($conn,$queri);
            $datos = $C_asociar->val_consulta($res);
            if($datos==true){
                $codigo = $get_codigo_muestra;
                $_SESSION['dato']=$codigo;
                header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
            }else{
                $_SESSION['message']='Codigo no existe en la base de datos ';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
            }
            
       }else{
        $_SESSION['message']='codigo ingresado incorrecto ';
        $_SESSION['message_type']='danger';
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
       }
    }
    if(isset($_POST['asociar'])){
        $item1 = $_POST['item1'];
        $item2 = $_POST['item2'];
        $item3 = $_POST['item3'];
        $item4 = $_POST['item4'];
        

    }
?>