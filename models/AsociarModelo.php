<?php
include ("../controllers/C_asociar.php");
include ("../config/databases.php");
//buscar una muestra
    if(isset($_POST['BUSCAR'])){
        $get_codigo_muestra = $_POST['codigo'];
        $C_asociar = new asociar;
        $codigo = $get_codigo_muestra;
        $estado = $C_asociar->val_codigo_muestra($codigo);
       if($estado!=0){
            $queri = "
            SELECT  COUNT(codigo_muestra) from MUESTRAS_MEDICAS  WHERE  codigo_muestra= '$codigo';
            ";
            $res = mysqli_query($conn,$queri);
            $rows =mysqli_fetch_array($res);
            if($rows['COUNT(codigo_muestra)']==1){
                echo('codigo valido');
                $_SESSION['dato']=$codigo;
                header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
            }else {
                $_SESSION['alerta']='Codigo no existe en la base de datos ';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
            }   
       }else{
            $_SESSION['alerta']='Codigo no valido';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
        }
    }
    //codigo para asociar items a una muestra medica
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
        $_SESSION['alerta']='Items asociado con exito';
        $_SESSION['message_type']='success';
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
    }
  //codigo para desasociar items de una  muestra medica 
    if (isset($_POST['Desasociar'])) {
        $C_asociar = new asociar;
        $item1 = $_POST['1'];
        $item2 = $_POST['2'];
        $item3 = $_POST['3'];
        $item4 = $_POST['4'];
        $id_muestra=$_POST['id'];
        //echo ("item1: ".$item1." item2: ".$item2." item3: ".$item3." item4: ".$item4);
        $resultado = $C_asociar->desacociar_item($item1,$item2,$item3,$item4,$id_muestra);
        $res=mysqli_query($conn,$resultado);
        if(!$res){
            die(mysqli_error($conn));
        }
        $_SESSION['alerta']='Items desasociados con exito';
        $_SESSION['message_type']='success';
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
        
    }
    //codigo para generar etiqueta de la muestra medica 
    if(isset($_POST['etiqueta'])){
        $C_asociar = new asociar;
        $id = $_POST['id'];
        $cod_muestra = $_POST['cod_muestra'];
        $cod_exp = $_POST['cod_exp'];
       //echo ("id: ".$id." dato1: ".$dato1." dato2: ".$dato2);
        $codigo = "Codigo de muestra: ".$cod_muestra." Codigo de Expediente: ". $cod_exp;
        $QR = $C_asociar-> generar_QR($codigo);
        
        $fecha = "SELECT CURDATE() FROM DUAL";
        $TIME= mysqli_query($conn,$fecha);
        $rows = mysqli_fetch_array($TIME);
        $fecha = $rows['CURDATE()'];
        $cod_etiqueta = $C_asociar->get_cod_etiqueta($fecha);
        $_SESSION['cod_et'] =$cod_etiqueta; 
        $_SESSION['id']=$id;
        $_SESSION['QR']=$QR; 
        header("Location: ../views/Creacion_Muestras/etiqueta_muestra.php");
    }

    //
    
    if (isset($_POST['imprimir'])){
        $cod_muestra = $_POST['cod_muestra'];
        $cod_exp = $_POST['cod_exp'];
        $qr = $_POST['qr'];
        $cod_etiqueta= $_POST['cod_etiqueta'];
        $C_imprimir = new asociar;
        $C_imprimir->imprimir_Etiqueta($cod_muestra,$cod_exp,"12345",$qr,$cod_etiqueta);

    }
    if(isset($_POST['excel'])){
        $C_excel = new asociar;
        $id_muestra = $_POST['id'];
        $C_excel -> crear_excel($id_muestra); 
    }
    if(isset($_POST['eliminar'])){
        $id_muestra = $_POST['id'];
        $C_eliminar = new asociar;
        $elimnar_items = "DELETE FROM ASOCIAR WHERE id_muestra= '$id_muestra'";
        $elim = mysqli_query($conn,$elimnar_items);
        if(!$elim){
            die(mysqli_error($conn));
        }

        $eliminar = $C_eliminar -> eliminar_muestra($id_muestra); 
        $res = mysqli_query($conn,$eliminar);
        if(!$res){
            die(mysqli_error($conn));
        }
        $_SESSION['alerta']='MUESTRA MEDICA ELIMINADO CON EXITO';
        $_SESSION['message_type']='success';
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
    }
    if (isset($_POST['salir'])) {
        header("Location: ../views/Creacion_Muestras/Vista_asociar.php");
    }
    if(isset($_POST['regresar'])){
        header("Location: ../views/solicitud/solicitud.php");
    }
?>