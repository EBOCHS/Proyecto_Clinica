<?php
class asociar{
    public function val_codigo_muestra($codigo){
       if($codigo!=""){
            if(strlen($codigo)>=15){
                return true;
            }else{
                return false;
            }
            
       }else{
           return false;
       }
    }
    public function val_consulta($datos){
        
        while($rows = mysqli_fetch_array($datos)){
            $resultado = $rows['COUNT(*)'];
        }
        if($resultado==1){
            return true;
        }
        else{
            return false;
        }
        //return "codigo: ".$codigo_muestra." tipo_muestra: ".$tipo_muestra;


    }
}
?>