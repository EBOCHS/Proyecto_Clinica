<?php
//clase para las validaciones de 
class validar_solicitud
{
    // funcion para retornar el tipo de usuario interno o externo
    public function val_tipo_usr($t_usr)
    {
        if ($t_usr == 'IN') {
            return true;
        }

        if ($t_usr == 'EX') {
            return true;
        } else {
            return false;
        }
    }
    // funcion para retornar el tipo de solicitud
    public function val_tipo_solicitud($t_solicitud)
    {
        if ($t_solicitud == 'MM') {
            return true;
        }

        if ($t_solicitud == 'LQ') {
            return true;
        } else {
            return false;
        }
    }
    //funcion  para ladiar la descripcion que no sea mayor a 2000 caracteres
    public function val_descripcion($descripcion)
    {
        if ($descripcion != "") {
            if (strlen($descripcion < 2000)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //funcion para validad el numero de expediente que el usuario ingresa a la vista
    public function val_expediente($No_expediente)
    {
        if ($No_expediente != "") {
            if (strlen($No_expediente >= 15)) {
                return true;
            }
        } else {
            return false;
        }
    }
    //funcion para obtener la fecha del sistema
    public function fecha()
    {
        $fecha = getdate();

        $año = $fecha['year'];
        $mes = $fecha['mon'];
        $dia = $fecha['mday'];
        $fecha_valida = $año . $mes . $dia;
        return $fecha_valida;
        //return $dia;
    }
    //funcion para obtener el numero de solicitud 
    public function get_numero_solicitud($numero_solicitud)
    {

        if ($numero_solicitud != "") {
            while ($resp = mysqli_fetch_array($numero_solicitud)) {
                $codigo_solicitud = $resp['COD_SOLICITUD'];
            }
            (int)$numero = substr($codigo_solicitud, -5);
            $numero_valido = ($numero + 1);
            return $numero_valido;
        } else {
            return "10000";
        }
    }
    //funcion para validar la estructura del cui ingresado por el usuario
    public function val_Cui($cui)
    {
        $exp_cui = "/^[0-9]+$/";
        $val = preg_match($exp_cui, $cui, $res);

        if (!$val) {
            return false;
        } else {
            if (strlen($cui) < 13 || strlen($cui) > 13) {
                return false;
            }
        }
        return true;
    }
}
