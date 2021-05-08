<?php
    include_once ("../controllers/C_muestras.php");
    include ("../config/databases.php");

    if(!isset ($_SESSION['usuario'])){
        header ("location: ../views/Login/Vista_Login.php");
    }
    else{
        if(isset($_POST['Crear_muestra'])){//crear muetra del archivo index pajina principal
            header ("location: ../views/Creacion_Muestras/Vista_Muestras.php");
        }
    }
    
    if(isset($_POST['Crear'])){
        //creamos el modelo de una muestra
        //con los datos del formulario creasion de muestra
        $Tmuestra = $_POST['Tmuestra'];
        $presentacion = $_POST['Presentacion'];
        $cantidad = $_POST['cantidad'];
        $Umedida = $_POST['Umedida'];
        $adjunto = $_POST['adjunto'];
        $numExp = $_POST['exp'];
        /*antes de guardar los datos validamos que esten correctos
        para eso se crea una funcion para validar cada uno de los datos 
        estas funciones estan en el la carpeta cotrollers/C_muestras.php
        */
        
        $C_muestra = new validar_muestra;
        
        $Tmuestra1 = $C_muestra->val_Tipo_muestra($Tmuestra);
        $presentacion1 = $C_muestra->val_Presentacion($presentacion);
        $cantidad1 = $C_muestra->val_cantidad((int)$cantidad);
        $Umedida1 = $C_muestra->val_medida($Umedida);
        $valnumexp1 = $C_muestra ->val_numExpediente($numExp);
        if($Tmuestra!=0){
            if($presentacion1!=false){
                if($cantidad1!=false){
                    if($Umedida1!=false){
                        if($valnumexp1!=false){
                         
                            $queri = "SELECT  codigo_muestra from MUESTRAS_MEDICAS  order by codigo_muestra desc limit 1";
                            $res = mysqli_query($conn,$queri);
                            $COD_MUESTRA = $C_muestra-> get_codigo_muestra($res);
                            $codigo_muestra= $COD_MUESTRA;
                            $exp = "SELECT ID_EXPEDIENTE ,NUM_EXPEDIENTE FROM EXPEDIENTE WHERE  NUM_EXPEDIENTE ='$numExp'";
                            $resp = mysqli_query($conn,$exp);
                            
                            $rows = mysqli_fetch_array($resp);
                            if($rows['ID_EXPEDIENTE']==""){
                                $codigo_muestra=$C_muestra ->get_codigo_muestra($res);
                                $_SESSION['mms']= "NUMERO DE EXPEDIENTE NO EXISTE EN LA BASE DE DATOS";
                                $_SESSION['message_type']='danger';
                                header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                                
                            }

                            $id_exp = $rows['ID_EXPEDIENTE'];
                            $num_exp = $rows ['NUM_EXPEDIENTE'];
                            //echo ("id: ".$id_exp." numero expediente: ".$num_exp);

                            //insetando muestra medica a la base de datos 
                            $insert = "INSERT  into MUESTRAS_MEDICAS (codigo_muestra,tipo_muestra,presentacion_muestra,cantidad_muestra,unidad_medida,adjunto,id_expediente)
                             VALUES ('$COD_MUESTRA','$Tmuestra1','$presentacion','$cantidad','$Umedida','$adjunto','$id_exp')";
                            $respons = mysqli_query($conn,$insert);
                            if(!$respons){
                                die (die(mysqli_error($conn)));
                            }
                            
                            $_SESSION['mms']= "Muestra medica creada con exito\n
                                 Codigo de la muestra \n".$COD_MUESTRA;
                            $_SESSION['message_type']='success';
                            header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                        
                        }else{
                            $_SESSION['mms']= "NUMERO DE EXPEDIENTE NO VALIDO";
                            $_SESSION['message_type']='danger';
                            header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                        }
                        
                    }else{
                        $_SESSION['mms']= "Elija una Unidad de medida";
                        $_SESSION['message_type']='danger';
                        header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                    }
                }else{
                    $_SESSION['mms']= "Cantidad no es valida";
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                }
                    
            }else{
                $_SESSION['mms']='Presentacion no valida';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
            }
        }else{
            $_SESSION['mms']='Elija Un tipo de Muestra';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
        }
        
    }
    if(isset($_POST['salir'])){
        header ("location: ../views/inicio/index.php");
    }
?>