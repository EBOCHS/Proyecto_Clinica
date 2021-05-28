<?php
    class validar_usuario_nuevo{
        
        //funcion para validar el nombre del paciente
    public function val_nombre($nombre)
    {
        $exp_nombre = "/^[a-z ]+$/i"; //exprecion regular que aepta solo letras a asta la z 
        $val = preg_match($exp_nombre, $nombre, $conside); //fucncion preg_mach compara la cadena con la exprecion regular retorna true si encuentra coincidencia o false si no lo hace

        if (!$val) {
            return false;
        }
        return true;
    }

    //funcion para validar el apellido del paciente
    public function val_apellido($apellido)
    {
        $exp_nombre = "/^[a-z ]+$/i";
        $val = preg_match($exp_nombre, $apellido, $conside);
        if (!$val) {
            return FALSE;
            //echo("apellido no valido");
        }
        return TRUE;
    }

    //funcion para validar el cui ingresado por el usuario 
    public function val_Cui($cui)
    {
        $exp_cui = "/^[0-9]+$/";
        $val = preg_match($exp_cui, $cui, $res);

        if (!$val) {
            return false;
        } else {
            if (strlen($cui) < 13 || strlen($cui) > 13) { //la funcion strlen() retorna la cantidad de caracteres de una cadena de texto
                return false;
            }
        }
        return true;
    }
    public function val_pass($pass){
        if(strlen($pass)<6||strlen($pass)>10){
            return false;
        }else{
            return true;
        }
        
    }
    public function val_tel($telefono){
        if (strlen($telefono)!=8){
            return false;
        }else{
            return true;
        }

    }


    }
?>