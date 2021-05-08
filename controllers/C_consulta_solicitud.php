<?php

class validar_consulta
{

    public function v_Codigo_solicitud($dato)
    {

        $guion2 = strpos($dato, "-", 3);
        $guion1 = strpos($dato, "-");

        if ($dato == "" || strlen($dato) < 15 || strlen($dato) > 17 || $guion1 !== 2) {
            return false;
        } else {
            if ($guion2 == 10 || 9 || 11) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function v_num_exp($dato)
    {
        $long = strlen($dato);

        if ($long < 19 || $long > 24 || $dato == "") {
            return false;
        } else {
            return true;
        }
    }

    public function v_num_nit($dato)
    {
        if ($dato != "") {
            if (strlen($dato <= 11)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function v_estado_solicitud($dato)
    {
        if ($dato != "") {
            if ($dato == "creado" || "asignado" || "analisis" || "espera" || "enviado") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
