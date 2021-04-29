<?php

class validar_solicitud
{

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
    public function get_numero_solicitud($numero_solicitud)
    {
        while ($resp = mysqli_fetch_array($numero_solicitud)) {
            $codigo_solicitud = $resp['COD_SOLICITUD'];
        }
        (int)$numero = substr($codigo_solicitud, -5);
        $numero_valido = ($numero + 1);
        return $numero_valido;
    }

    /* public function get_dia($numero_solicitud)
    {
        while ($resp = mysqli_fetch_array($numero_solicitud)) {
            $codigo_solicitud = $resp['COD_SOLICITUD'];
        }
        $dia = substr($codigo_solicitud, -8, 2);
        return $dia;
    }*/
}
