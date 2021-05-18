<?php
 class consulta_muestra{
   public function val_dato_condicion($condicion,$dato_busqueda){
        switch($condicion){
            case "cod_expediente":
                if( strlen($dato_busqueda)>19){
                    return true;
                }else{
                    return 0;
                }
                
                break;
            case "cod_muestra":
                return true;
                break;
            case "cod_solicitud":
                if( strlen($dato_busqueda)>19){
                    return true;
                }else{
                    return 0;
                }
                break ;
            case "nit": 
                return true;
                break;

            default :false;  
        }
   }
   
   public function val_dato_busqueda($dato){
        
   }
 }
?>