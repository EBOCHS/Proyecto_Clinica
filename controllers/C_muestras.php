<?php
class validar_muestra{
    public function val_Tipo_muestra($Tmuestra){
        if($Tmuestra!=0){
            switch($Tmuestra){
                case 1:
                    return "CULTIVO";
                    break;
                case 2 :
                    return "PLAQUETAS"; 
                    break;
                case 3:
                    return "ESES";
                    break;
                case 4:
                    return "ORINA";
                    break;
           }
       }else{
           return false;
       }
    }
    public function val_Presentacion($presentacion){
        if(strlen($presentacion)<10 ||strlen($presentacion)>2000){
            return false;
        }else{
            return $presentacion;
        }
    }
    public function val_cantidad($cantida){
        $exp = "/^[0-9]+$/";
        $val = preg_match($exp,$cantida);
        if(!$val){
            return false;
        }else{
            if(strlen($cantida)>4){
                return false;
            }else{
                return $cantida;
            }
        }
    }
    public function val_medida($medida){
        if($medida!=0){
            switch($medida){
                case 1:
                    return "Mililimetros";
                    break;
                case 2:
                    return "Gramos";
                    break;
                case 3:
                    return "Miligramos";
                    break;
            }
        }else{
            return false;
        }
    }
    public function get_codigo_muestra($cod_muestra){
        $fecha = getdate();
        $dia = $fecha["mday"];
        $mes = $fecha["mon"];
        $año = $fecha["year"];
        $año_=substr($año,2);
       
        while($datos = mysqli_fetch_array($cod_muestra)){
            $codigo_muestra = $datos['codigo_muestra'];
        }
        if($codigo_muestra!=""){
            (int)$primer_digito = substr($codigo_muestra,0,3);
            $num = ((int)$primer_digito+1);

            $codigo_muestra =$num."-".$dia."-".$mes."-".$año_."-".$num;
            return $codigo_muestra;

        }else{
            $codigo_muestra ="100"."-".$dia."-".$mes."-".$año_."-"."100";
            return $codigo_muestra;
        }

    }
    public function val_numExpediente($exp){
        if(strlen($exp)<20 || strlen($exp)>21){
            return false;
        }else{
            return true;
        }
    }

}
?>