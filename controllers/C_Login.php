<?php
class Validar_login{
    public function val_usuario($usuario){
        if(empty($usuario)!=0){
            return true;
        }else{
            return false;
        }
    }
    public function val_password($pasword){
        if(empty($pasword)!=0){
            return true;
        }else{
            return false;
        }
    }

}
?>