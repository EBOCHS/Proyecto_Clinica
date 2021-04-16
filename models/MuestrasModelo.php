<?php
    include_once ("../controllers/C_muestras.php");
    include ("../config/databases.php");
    if(isset($_POST['Crear'])){
        //creamos el modelo de una muestra
        //con los datos del formulario creasion de muestra
        $Tmuestra = $_POST['Tmuestra'];
        $presentacion = $_POST['Presentacion'];
        $cantidad = $_POST['cantidad'];
        $Umedida = $_POST['Umedida'];
        $adjunto = $_POST['adjunto'];
        /*antes de guardar los datos validamos que esten correctos
        para eso se crea una funcion para validar cada uno de los datos 
        estas funciones estan en el la carpeta cotrollers/C_muestras.php
        */
        
        $C_muestra = new validar_muestra;
        
        $Tmuestra = $C_muestra->val_Tipo_muestra($Tmuestra);
        $presentacion = $C_muestra->val_Presentacion($presentacion);
        $cantidad = $C_muestra->val_cantidad((int)$cantidad);
        $Umedida = $C_muestra->val_medida($Umedida);
        
        if($Tmuestra!=false){
            if($presentacion!=false){
                if($cantidad!=false){
                    if($Umedida!=false){
                        echo ("unidad de medida ".$Umedida);
                    }else{
                        $_SESSION['message']= "Elija una Unidad de medida";
                        $_SESSION['message_type']='danger';
                        header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                    }
                }else{
                    $_SESSION['message']= "Cantidad no es valida";
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
                }
                    
            }else{
                $_SESSION['message']='Presentacion no valida';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
            }
        }else{
            $_SESSION['message']='Elija Un tipo de Muestra';
            $_SESSION['message_type']='danger';
            header("Location: ../views/Creacion_Muestras/Vista_Muestras.php");
        }
        

    }
?>