<?php
   class validar {
        
          //funcion para validar el nombre del paciente
          public function val_nombre($nombre){
            $exp_nombre ="/^[a-z ]+$/i";//exprecion regular que aepta solo letras a asta la z 
            $val = preg_match($exp_nombre,$nombre,$conside); //fucncion preg_mach compara la cadena con la exprecion regular
            if(!$val){
                return false;
            }
            return true;
        }
        
        //funcion para validar el apellido del paciente
        public function val_apellido($apellido){
            $exp_nombre ="/^[a-z ]+$/i";
            $val = preg_match($exp_nombre,$apellido,$conside);
                if(!$val){
                    return FALSE;
                    //echo("apellido no valido");
                }
                return TRUE;
            }

        public function val_Cui($cui){
                $exp_cui ="/^[0-9]+$/";
                $val = preg_match($exp_cui,$cui,$res);

                if(!$val){
                    return false;
                }else{
                     if (strlen($cui)<13||strlen($cui)>13){
                        return false;
                     }
                }
                return true;
            }
            
        public function val_tipo_sangre($indice){
            //echo ($indice);
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
                    case '9':
                        return "NA";
                        break;    
                }
        }

        public function val_sexo($indice_Sx){
            
                switch ($indice_Sx) {
                    case '1':
                        return "Masculino";
                        break;
                    
                    case '2':
                        return "Femenino";
                        break;
            
            }
        }
        
        //funcio que genera el codigo del Expediente
        public function get_Num_Expediente($num_expediente){
            //$codigo_Exp= "";
            $fecha = getdate();
            $dia = $fecha["mday"];
            $mes = $fecha["mon"];
            $año = $fecha["year"];
            $año_=substr($año,2);
           
            
                while($resp = mysqli_fetch_array($num_expediente)){
                    $codigo_Exp = $resp['NUM_EXPEDIENTE'];
                }
                if($codigo_Exp!=""){
                    (int)$primer_digito = substr($codigo_Exp,0,4);
                    $nuevo_primer = ($primer_digito+1);

                    //(int)$ultimo_digito=substr($codigo_Exp,14,17);
                    (int)$ultimo_digito=substr($codigo_Exp,-7);
                    $nuevo_ultimo=($ultimo_digito+1);
                    $codigo_nuevo = $nuevo_primer."-".$dia."-".$mes."-".$año_."-".$nuevo_ultimo;    
                    return $codigo_nuevo;
                }else{
                    $codigo_nuevo="1000"."-".$dia."-".$mes."-".$año_."-"."1000000";
                    return  $codigo_nuevo;
                }
                
        }
        public function val_direccion($direccion){
            $valida = $direccion;
            $exp_direc = "/^[a-z0-9-.]+$/i";//valida que la direccion sea de tipo alfa nuemrico tambien asepta los caracteres guion("-") y el punto (".")
            $cadena = str_replace(" ","",$direccion);//elimina los espacios en blaco
            $val = preg_match($exp_direc,$cadena,$conside);
            
            if (!$val){
                return false;
            }else {
                //echo ("direccion correcta");
                if(strlen($direccion)>200){
                    return false;
                }else{   
                return true;
                }
            }
         
        }
        public function estado_sivil($sivil){
            switch ($sivil){
                case '1':
                    return "Soltero";
                    break;
                case '2' :
                    return "Casado";
                    break;
            }

        }
        public function val_edad($edad){
            $valido = $edad;
            $exp_edad = "/^[0-9]{1,3}+$/";
            $val = preg_match($exp_edad,$edad);
            if(!$val){
                return false;
            }else{
                $ed = (int)$edad;
                if($ed>110){
                    return false;
                }else{
                    return true;
                }
                    
            }

        }
        public function val_nit($nit){
            $valido = $nit;
            $exp_nit = "/^[0-9-]{13}+$/";
            $val = preg_match($exp_nit,$nit);
            if(!$val){
                return false;
                   
            }else{
                if(strlen($nit)>13||strlen($nit<13)){
                   return false;
                }else{
                    return true;
                }
            }
        }
    
        public function val_Descripcion($descripcion){
            
            if(strlen($descripcion)<10||strlen($descripcion)>400){
                return false;
            }else{
                return true;
            }
            

        }
        public function get_id($id){
            $id_paciente="";
            while($resp = mysqli_fetch_array($id)){
                $id_paciente = $resp['ID_PACIENTE'];
            }
            return $id_paciente;
        }
        
    }
?>