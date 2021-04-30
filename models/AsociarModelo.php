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
        $C_asociar = new asociar;
        $item1 = $_POST['1'];
        $item2 = $_POST['2'];
        $item3 = $_POST['3'];
        $item4 = $_POST['4'];
        $id_muestra=$_POST['id'];
        //echo("id: ".$id_muestra." item:1" .$item1);
        $resultado = $C_asociar->asociar_item($item1,$item2,$item3,$item4,$id_muestra);
    
        $res=mysqli_query($conn,$resultado);
        if(!$res){
            die(mysqli_error($conn));
        }
        $_SESSION['message']='Items asociado con exito';
        $_SESSION['message_type']='success';
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
    }
    if (isset($_POST['Desasociar'])) {
        $C_asociar = new asociar;
        $item1 = $_POST['1'];
        $item2 = $_POST['2'];
        $item3 = $_POST['3'];
        $item4 = $_POST['4'];
        $id_muestra=$_POST['id'];
        $resultado = $C_asociar->desacociar_item($item1,$item2,$item3,$item4,$id_muestra);
        $res=mysqli_query($conn,$resultado);
        if(!$res){
            die(mysqli_error($conn));
        }
        $_SESSION['message']='Items desasociados con exito';
        $_SESSION['message_type']='success';
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
        
    }
    if(isset($_POST['etiqueta'])){
        $id = $_POST['id'];
        echo("id de ".$id);
        $_SESSION['id']=$id;
        header("Location: ../views/Creacion_Muestras/etiqueta_muestra.php");
        

    }
?>