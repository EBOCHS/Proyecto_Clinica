<?php
 class consulta_muestra{
   public function val_dato_condicion($condicion,$dato_busqueda){
        switch($condicion){
            case "cod_expediente":
                if( strlen($dato_busqueda) ){
                    return true;
                }
                
                break;
            case "cod_muestra":
                return true;
                break;
            case "cod_solicitud":
                return true;
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