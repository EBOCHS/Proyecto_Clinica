<?php

    class validar {
        
          //funcion para validar el nombre del paciente
          public function val_nombre($nombre){
            $exp_nombre ="/^[a-z]+$/i";//exprecion regular que aepta solo letras a asta la z 
            $val = preg_match($exp_nombre,$nombre,$conside); //fucncion preg_mach compara la cadena con la exprecion regular
            if(!$val){
                $_SESSION['message']='Nombre no valido';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
                //return false;
                //echo("nombre no valido");
            }
        }
        //funcion para validar el apellido del paciente
        public function val_apellido($apellido){
            $exp_nombre ="/^[a-z]+$/i";
            $val = preg_match($exp_nombre,$apellido,$conside);
                if(!$val){
                    $_SESSION['message']='apellido no valido';
                    $_SESSION['message_type']='danger';
                   header("Location: ../views/Expedientes/expedientes.php");
                    //echo("apellido no valido");
                }
            }

        public function val_Cui($cui){
                $exp_cui ="/^[0-9]+$/";
                $val = preg_match($exp_cui,$cui,$res);

                if(!$val){
                    $_SESSION['message']='CUI no valido Solo se permite numeros de enteros';
                    $_SESSION['message_type']='danger';
                   header("Location: ../views/Expedientes/expedientes.php");
                }else{
                     if (strlen($cui)<11||strlen($cui)>11){
                        $_SESSION['message']='CUI no valido Solo se permiten numeros de 11 cifras';
                        $_SESSION['message_type']='danger';
                        header("Location: ../views/Expedientes/expedientes.php");
                     }
                }
            }
            
        public function val_tipo_sangre($indice){
            //echo ($indice);
            if($indice != 0 ){
                switch ($indice) {
                    case '1':
                        # code...
                        return "A+";
                        break;
                    case '2':
                        return "A-";
                        break;
                    case '3':
                        # code...
                        return "B+";
                        break;
                    case '4':
                        return "B-";
                        break;
                    case '5':
                        # code...
                        return "O+";
                        break;
                    case '6':
                        return "O-";
                        break;
                    case '7':
                        # code...
                        return "AB+";
                        break;
                    case '8':
                        return "AB-";
                        break;
                }
            }else{
                $_SESSION['message']='Elija Un Tipo De Sangre Campo Obligatorio';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
            }
        }
        public function val_sexo($indice_Sx){
            if($indice_Sx!=0){
                switch ($indice_Sx) {
                    case '1':
                        return "Masculino";
                        break;
                    
                    case '2':
                        return "Femenino";
                        break;
               }
            }else{
                $_SESSION['message']='Elija El Sexo Campo obligatorio';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
            }
        }
        
        //funcio que genera el codigo del Expediente
        public function get_Num_Expediente($num_expediente){
            $codigo_Exp= "";
            $fecha = getdate();
            $dia = $fecha["mday"];
            $mes = $fecha["wday"];
            $año = $fecha["year"];
            
                while($resp = mysqli_fetch_array($num_expediente)){
                    $codigo_Exp = $resp['No_expediente'];
                }
                if($codigo_Exp!=""){
                    (int)$primer_digito = substr($codigo_Exp,0,4);
                    $nuevo_primer = ($primer_digito+1);
                    (int)$ultimo_digito=substr($codigo_Exp,14,17);
                    $nuevo_ultimo=($ultimo_digito+1);
                    $codigo_nuevo = $nuevo_primer."-".$dia."-".$mes."-".$año."-".$nuevo_ultimo;    
                    return $codigo_nuevo;
                }else{
                    $codigo_nuevo="1000"."-".$dia."-".$mes."-".$año."-"."1000000";
                    return  $codigo_nuevo;
                }
                
        }
        public function val_direccion($direccion){
            $valida = $direccion;
            $exp_direc = "/^[a-z0-9-.]+$/i";//valida que la direccion sea de tipo alfa nuemrico tambien asepta los caracteres guion("-") y el punto (".")
            $cadena = str_replace(" ","",$direccion);
            $val = preg_match($exp_direc,$cadena,$conside);
            
            if (!$val){
                $_SESSION['message']='Direccion no valida solo se permite letras, numeros, guion , punto';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
            }else {
                //echo ("direccion correcta");
                if(strlen($direccion)>200){
                    $_SESSION['message']='Direccion invalida solo se permite 200 caracteres';
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Expedientes/expedientes.php");
                }else{   
                return $valida;
                }
            }
         
        }
        public function estado_sivil($sivil){
            $exp_sivil = "/^[a-z]{20}+$/i";
            $val = preg_match($exp_sivil,$sivil);
            if(!$val){

            }

        }
        public function val_edad($edad){
            $valido = $edad;
            $exp_edad = "/^[0-9]{1,3}+$/";
            $val = preg_match($exp_edad,$edad);
            if(!$val){
                $_SESSION['message']='Edad no valida';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
            }else{
                $ed = (int)$edad;
                if($ed>110){
                    $_SESSION['message']='Edad no valida';
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Expedientes/expedientes.php");
                }else{
                    return ($valido);
                }
                    
            }

        }
        public function val_nit($nit){
            $valido = $nit;
            $exp_nit = "/^[0-9-]{13}+$/";
            $val = preg_match($exp_nit,$nit);
            if(!$val){
                $_SESSION['message']='nit no valido debe de cumplir la siguente estructura 99999999999-9';
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Expedientes/expedientes.php");
                   
            }else{
                if(strlen($nit)>13||strlen($nit<13)){
                    $_SESSION['message']='nit no valido demasiado caracteres';
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Expedientes/expedientes.php");
                }else{
                    return $valido;
                }
            }
        }
    
        public function val_Descripcion($descripcion){
            $valido = $descripcion;
            if(strlen($direccion>400)){
                $_SESSION['message']='Descripcion invalida solo se permite 400 caracteres';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
            }else{
                return $valido;
            }

        }
    }
?>