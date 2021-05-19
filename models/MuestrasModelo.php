<?php
    include_once ("../controllers/C_muestras.php");
    include ("../config/databases.php");

    /*if(!isset ($_SESSION['usuario'])){
        header ("location: ../views/Login/Vista_Login.php");
    }
    else{
        if(isset($_POST['Crear_muestra'])){//crear muetra del archivo index pajina principal
            header ("location: ../views/Creacion_Muestras/Vista_Muestras.php");
        }
    }*/
    
    if(isset($_POST['Crear'])){
        //creamos el modelo de una muestra
        //con los datos del formulario creasion de muestra
       $Tmuestra = $_POST['Tmuestra'];
        $presentacion = $_POST['Presentacion'];
        $cantidad = $_POST['cantidad'];
        $Umedida = $_POST['Umedida'];
        $adjunto = $_POST['adjunto'];
        $cod_solicitud = $_POST['cod_solicitud'];
        /*antes de guardar los datos validamos que esten correctos
        para eso se crea una funcion para validar cada uno de los datos 
        estas funciones estan en el la carpeta cotrollers/C_muestras.php
        
        */
        $C_muestra = new validar_muestra;
        
        $Tmuestra1 = $C_muestra->val_Tipo_muestra($Tmuestra);
        $presentacion1 = $C_muestra->val_Presentacion($presentacion);
        $cantidad1 = $C_muestra->val_cantidad((int)$cantidad);
        $Umedida1 = $C_muestra->val_medida($Umedida);
        $valnumexp1 = $C_muestra ->val_numSolicitud($cod_solicitud);
        //echo ("Esctado: ".$valnumexp1." dato ingresado: ".$cod_solicitud );
       if($Tmuestra!=0){
            if($presentacion!=0){
                if($cantidad!=0){
                    if($Umedida1!=false){
                        if($valnumexp1!=false){
                            $queri = "SELECT  codigo_muestra from MUESTRAS_MEDICAS  order by codigo_muestra desc limit 1";
                            $res = mysqli_query($conn,$queri);
                            $COD_MUESTRA = $C_muestra-> get_codigo_muestra($res);
                            $codigo_muestra= $COD_MUESTRA;
                            //
                            $cod = "SELECT ID_SOLICITUD ,COD_SOLICITUD FROM SOLICITUD s2 WHERE  COD_SOLICITUD ='$cod_solicitud' AND ESTADO_SOLICITUD='creado'";
                            $resp = mysqli_query($conn,$cod);
                            $rows = mysqli_fetch_array($resp);
                            if($rows['ID_SOLICITUD']==""){
                                $codigo_muestra=$C_muestra ->get_codigo_muestra($res);
                                $_SESSION['message']= "CODIGO DE SOLICITUD NO EXISTE EN LA BASE DE DATOS";
                                $_SESSION['message_type']='danger';
                                header("Location: ../views/Creacion_Muestras/muestra.php");
                                
                            }
                            $id_COD = $rows['ID_SOLICITUD'];
                            //$num_exp = $rows ['COD_SOLICITUD'];
                            //echo ("id: ".$id_exp." numero expediente: ".$num_exp);

                            //insetando muestra medica a la base de datos 
                            $insert = "INSERT  into MUESTRAS_MEDICAS (codigo_muestra,tipo_muestra,presentacion_muestra,cantidad_muestra,unidad_medida,adjunto,id_solicitud,estado,FECHA_CREACION,FECHA_FINAL)
                             VALUES ('$COD_MUESTRA','$Tmuestra1','$presentacion1','$cantidad1','$Umedida1','$adjunto','$id_COD','creado',sysdate(),sysdate())";
                            $respons = mysqli_query($conn,$insert);
                            if(!$respons){
                                die (mysqli_error($conn));
                            }
                            
                            $_SESSION['message']= "Muestra medica creada con exito\n
                                 Codigo de la muestra \n".$COD_MUESTRA;
                            $_SESSION['message_type']='success';
                            header("Location: ../views/Creacion_Muestras/muestra.php");
                        
                        }else{
                            $_SESSION['message']= "CODIGO DE SOLICITUD NO VALIDO";
                            $_SESSION['message_type']='danger';
                            header("Location: ../views/Creacion_Muestras/muestra.php");
                        }
                        
                    }else{
                        $_SESSION['message']= "Elija una Unidad de medida";
                        $_SESSION['message_type']='danger';
                        header("Location: ../views/Creacion_Muestras/muestra.php");
                    }
                }else{
                    $_SESSION['message']= "Elija la Cantidad de la Muestra";
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Creacion_Muestras/muestra.php");
                }
                    
            }else{
                $_SESSION['message']='Elija Un tipo de Presentacion';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Creacion_Muestras/muestra.php");
            }
        }else{
            $_SESSION['message']='Elija Un tipo de Muestra';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Creacion_Muestras/muestra.php");
        }

    }

    if(isset($_POST['cancelar'])||isset($_POST['salir']) ){
        unset($_SESSION['message']);
        if(isset($_SESSION['usuario'])){
            header("Location: ../views/inicio/menu_interno.php");
        }else{
            header("Location: ../views/inicio/index.php");
        }
        
    }

    if(isset($_POST['Inicio'])){
        header("Location: ../views/inicio/index.php");
         usert( $_SESSION['message']);
    }

?>