<?php
//clase para validar informacion que es ingresado en la vista creacion expedientes
class validar
{

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

    //funcion para retornar el tipo de sangre segun lo seleccionado por el usuario
    public function val_tipo_sangre($indice)
    {
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
    //funcion que retorna el tipo de sexo segun lo seleccionado por el usuario 
    public function val_sexo($indice_Sx)
    {

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
    public function get_Num_Expediente($num_expediente)
    {
        $fecha = getdate();//funcion getdate() obtiene la fecha en un arreglo de datos
        $dia = $fecha["mday"];
        $mes = $fecha["mon"];
        $a??o = $fecha["year"];
        $a??o_ = substr($a??o, 2);


        while ($resp = mysqli_fetch_array($num_expediente)) {
            $codigo_Exp = $resp['NUM_EXPEDIENTE'];
        }
        if ($codigo_Exp != "") {
            (int)$primer_digito = substr($codigo_Exp, 0, 4); //funcion substr() extrae una procion de caracteres de una cadena de texto
            $nuevo_primer = ($primer_digito + 1);
            (int)$ultimo_digito = substr($codigo_Exp, -7);
            $nuevo_ultimo = ($ultimo_digito + 1);
            $codigo_nuevo = $nuevo_primer . "-" . $dia . "-" . $mes . "-" . $a??o_ . "-" . $nuevo_ultimo;
            return $codigo_nuevo;
        } else {
            $codigo_nuevo = "1000" . "-" . $dia . "-" . $mes . "-" . $a??o_ . "-" . "1000000";
            return  $codigo_nuevo;
        }
    }
    public function val_direccion($direccion)
    {
        $valida = $direccion;
        $exp_direc = "/^[a-z0-9-.,]+$/i"; //valida que la direccion sea de tipo alfa nuemrico tambien asepta los caracteres guion("-") y el punto (".")
        $cadena = str_replace(" ", "", $direccion); //elimina los espacios en blaco
        $val = preg_match($exp_direc, $cadena, $conside);

        if (!$val) {
            return false;
        } else {
            if (strlen($direccion) > 200) {
                return false;
            } else {
                return true;
            }
        }
    }
    //funcion que retorna el stado civil
    public function estado_sivil($civil)
    {
        switch ($civil) {
            case '1':
                return "SOLTERO";
                break;

            case '2':
                return "CASADO";
                break;
        }
    }
    //funcion para validad la edad ingresada que no sea mayor a 100 a??os
    public function val_edad($edad)
    {
        $valido = $edad;
        $exp_edad = "/^[0-9]{1,2}+$/";
        $val = preg_match($exp_edad, $edad);
        if (!$val) {
            return false;
        } else {
            $ed = (int)$edad;
            if ($ed>99) {
                return false;
            } else {
                return true;
            }
        }
    }
    //funcion para validad el nit ingresado que no sea menor a 8 caracteres
    public function val_nit($nit)
    {
        $valido = $nit;
        $exp_nit = "/^[0-9A-Z]{4,10}+$/i";
        $val = preg_match($exp_nit, $nit);
        if (!$val) {
            return false;
        } else {
            if (strlen($nit) > 10 || strlen($nit < 10)) {
                return false;
            } else {
                return true;
            }
        }
    }
    //funcion para valida la descripcion que no sea mayor a 400 caracteres
    public function val_Descripcion($descripcion)
    {
        $valido = $descripcion;
        if (strlen($descripcion > 400)||strlen($descripcion)<1) {
            return false;
        } else {
            return true;
        }
    }
    //funcion para obtener el id del paciente creado para relacionarlo con el expediente
    public function get_id($id)
    {
        $id_paciente = "";
        while ($resp = mysqli_fetch_array($id)) {
            $id_paciente = $resp['ID_PACIENTE'];
        }
        return $id_paciente;
    }
}
