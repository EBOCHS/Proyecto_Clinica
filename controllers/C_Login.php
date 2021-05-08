<?php
//clase para la validadcion de login
class Validar_login{
    //funcion para validar el usuario
    public function val_usuario($usuario){
        if(empty($usuario)!=0){//funcion empty() detecta se una cadena no esta vacía
            return true;
        }else{
            return false;
        }
    }
    //validacion del la contraseña
    public function val_password($pasword){
        if(empty($pasword)!=0){
            return true;
        }else{
            return false;
        }
    }

}
?>