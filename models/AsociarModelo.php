<?php
include ("../controllers/C_asociar.php");
include ("../config/databases.php");
//buscar una muestra
        $_SESSION['item1B']="disabled";
        $_SESSION['item2B']="disabled";
        $_SESSION['item3B']="disabled";
        $_SESSION['item4B']="disabled";
    if(isset($_POST['buscar'])){
        
        unset( $_SESSION['item1A']);
        unset( $_SESSION['item2A']);
        unset( $_SESSION['item3A']);
        unset( $_SESSION['item4A']);

        unset($_SESSION['id_muestra']);
        unset($_SESSION['codigo_muestra']);
        unset($_SESSION['presentacion_muestra']);
        unset($_SESSION['cantidad_muestra']);
        unset($_SESSION['unidad_medida']);
        unset($_SESSION['adjunto']);
        unset($_SESSION['num_expediente']);
        unset($_SESSION['COD_SOLICITUD']);
        unset($_SESSION['tipo_muestra']);
        $get_codigo_muestra = $_POST['cod_nuestra'];
        $C_asociar = new asociar;
        $num_muestra = $get_codigo_muestra;
        $estado = $C_asociar->val_codigo_muestra($num_muestra);
       if( $estado != 0){
            $queri = "SELECT  COUNT(codigo_muestra) from MUESTRAS_MEDICAS  WHERE  codigo_muestra= '$num_muestra' AND estado='creado'";
            $res = mysqli_query($conn,$queri);
            $rows =mysqli_fetch_array($res);
            if($rows['COUNT(codigo_muestra)']==1){
                //echo('codigo valido');
                $query = "SELECT EX.NUM_EXPEDIENTE,SO.COD_SOLICITUD  ,MM.id_muestra ,MM.codigo_muestra,MM.tipo_muestra,MM.presentacion_muestra,MM.cantidad_muestra,MM.unidad_medida,MM.adjunto 
                FROM  MUESTRAS_MEDICAS MM 
                INNER JOIN SOLICITUD SO ON SO.ID_SOLICITUD = MM.id_solicitud 
                INNER JOIN EXPEDIENTE  EX ON SO.ID_EXPEDIENTE = EX.ID_EXPEDIENTE 
                WHERE MM.codigo_muestra = '$num_muestra';
                ";
                $res = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($res);
                $_SESSION['id_muestra']= $row['id_muestra'];
                $_SESSION['codigo_muestra']=$row['codigo_muestra'];
                $_SESSION['tipo_muestra']=$row['tipo_muestra'];
                $_SESSION['presentacion_muestra']=$row['presentacion_muestra'];
                $_SESSION['cantidad_muestra']=$row['cantidad_muestra'];
                $_SESSION['unidad_medida']=$row['unidad_medida'];
                $_SESSION['adjunto']=$row['adjunto'];
                $_SESSION['num_expediente']=$row['NUM_EXPEDIENTE'];
                $_SESSION['COD_SOLICITUD']=$row['COD_SOLICITUD'];
                $id_muestra=$row['id_muestra'];
                $ITEMS = "SELECT id_items FROM ASOCIAR  WHERE id_muestra = '$id_muestra' AND ESTADO = 'asociado' ";
                $E_ITEMS=mysqli_query($conn,$ITEMS);
                
                $C_asociar->val_items($E_ITEMS);

                //$_SESSION['num_muestra']=$num_muestra;
                //echo $_SESSION['num_muestra'];
                //header("Location: ../views/Creacion_Muestras/asociar.php");
            }else {
                echo ("falso");
                $_SESSION['message']='Codigo  de muestra no existe en la base de datos ';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Creacion_Muestras/asociar.php");
             }
       }else{
           //echo "codigo no valido";
            $_SESSION['message']='Codigo de muestra no valido';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Creacion_Muestras/asociar.php");
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
        //echo("id: ".$id_muestra." item1: " .$item1." item2: ".$item2." itme3: ".$item3." item4: ".$item4);
        
        $resultado = $C_asociar->asociar_item($item1,$item2,$item3,$item4,$id_muestra);
    
        $res=mysqli_query($conn,$resultado);
        if(!$res){
            die(mysqli_error($conn));
        }
        $ITEMS = "SELECT id_items FROM ASOCIAR  WHERE id_muestra = '$id_muestra' ";
        $E_ITEMS=mysqli_query($conn,$ITEMS);
        
        $C_asociar->val_items($E_ITEMS);
        //$_SESSION['message']='Items asociado con exito';
        //$_SESSION['message_type']='success';

        //header("Location: ../views/Creacion_Muestras/asociar.php");
    }
  //codigo para desasociar items de una  muestra medica 
    if (isset($_POST['Desasociar'])) {
        unset( $_SESSION['item1A']);
        unset( $_SESSION['item2A']);
        unset( $_SESSION['item3A']);
        unset( $_SESSION['item4A']);
        $C_asociar = new asociar;
        $item1 = $_POST['1'];
        $item2 = $_POST['2'];
        $item3 = $_POST['3'];
        $item4 = $_POST['4'];
        $id_muestra=$_POST['id'];
       //echo ("id: ".$id_muestra." item1: ".$item1." item2: ".$item2." item3: ".$item3." item4: ".$item4);
       $resultado = $C_asociar->desacociar_item($item1,$item2,$item3,$item4,$id_muestra);
       //echo $resultado; 
       $res=mysqli_query($conn,$resultado);
        if(!$res){
            die(mysqli_error($conn));
        }
        $ITEMS_ = "SELECT id_items FROM ASOCIAR  WHERE id_muestra = '$id_muestra' ";
        $E_ITEMS_=mysqli_query($conn,$ITEMS_);
        $C_asociar->val_items_desasociados($E_ITEMS_);

        //$_SESSION['message']='Items desasociados con exito';
        //$_SESSION['message_type']='success';
        //header("Location: ../views/Creacion_Muestras/asociar.php");
        
    }
    //codigo para generar etiqueta de la muestra medica 
    if(isset($_POST['buscar'])){
        //echo "hola";        
        $C_asociar = new asociar;
        $id = $_SESSION['id_muestra'];
        $cod_muestra =  $_SESSION['codigo_muestra'];
        $cod_exp = $_SESSION['num_expediente'];

       //echo ("id: ".$id." dato1: ".$dato1." dato2: ".$dato2);
        $codigo = "Codigo de muestra: ".$cod_muestra." Codigo de Expediente: ". $cod_exp;
        $QR = $C_asociar-> generar_QR($codigo);
        
        $fecha = "SELECT CURDATE() FROM DUAL";
        $TIME= mysqli_query($conn,$fecha);
        $rows = mysqli_fetch_array($TIME);
        $fecha = $rows['CURDATE()'];
        $cod_etiqueta = $C_asociar->get_cod_etiqueta($fecha);
        $_SESSION['cod_et'] =$cod_etiqueta; 
        $_SESSION['QR']=$QR; 
        header("Location: ../views/Creacion_Muestras/asociar.php");
    }

    //
    
    if (isset($_POST['imprimir'])){
        
        $cod_muestra = $_SESSION['codigo_muestra'];
        $cod_exp = $_SESSION['num_expediente'];
        $qr = $_SESSION['QR'];
        $cod_etiqueta=  $_SESSION['cod_et'];
        $cod_solicitud=$_SESSION['COD_SOLICITUD'];
        $C_imprimir = new asociar;
        $C_imprimir->imprimir_Etiqueta($cod_muestra,$cod_exp,$cod_solicitud,$qr,$cod_etiqueta);

    }
    if(isset($_POST['excel'])){
        $C_excel = new asociar;
        $id_muestra = $_SESSION['id_muestra'];
        $C_excel -> crear_excel($id_muestra); 
    }
    if(isset($_POST['eliminar'])){
        $id_muestra = $_SESSION['id_muestra'];
        $C_eliminar = new asociar;
        //$elimnar_items = "UPDATE MUESTRAS_MEDICAS SET estado ='eliminado' WHERE id_muestra= '$id_muestra'";
        /*$elim = mysqli_query($conn,$elimnar_items);
        if(!$elim){
            die(mysqli_error($conn));
        }*/
        $eliminar = $C_eliminar -> eliminar_muestra($id_muestra); 
        $res = mysqli_query($conn,$eliminar);
        if(!$res){
            die(mysqli_error($conn));
        }
        unset( $_SESSION['item1A']);
        unset( $_SESSION['item2A']);
        unset( $_SESSION['item3A']);
        unset( $_SESSION['item4A']);

        unset($_SESSION['id_muestra']);
        unset($_SESSION['codigo_muestra']);
        unset($_SESSION['presentacion_muestra']);
        unset($_SESSION['cantidad_muestra']);
        unset($_SESSION['unidad_medida']);
        unset($_SESSION['adjunto']);
        unset($_SESSION['num_expediente']);
        unset($_SESSION['COD_SOLICITUD']);
        unset($_SESSION['tipo_muestra']);
        
        $_SESSION['message']='MUESTRA MEDICA ELIMINADO CON EXITO';
        $_SESSION['message_type']='success';
        header("Location: ../views/Creacion_Muestras/asociar.php");
    }
    if (isset($_POST['salir'])) {
        header("Location: ../views/Creacion_Muestras/asociar.php");
    }
    if(isset($_POST['regresar'])){
        header("Location: ../views/solicitud/solicitud.php");
    }
    if(isset($_POST['Inicio'])){
        header("Location: ../views/inicio/index.php");
        usert( $_SESSION['message']);
    }
?>