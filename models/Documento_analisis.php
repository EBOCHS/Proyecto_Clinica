<?php
include ('../controllers/C_documento_analisis.php');
    if (isset($_POST['pdf'])){
        $cod_solicitud = $_POST['cod_solicitud'];
        $estado_solic = $_POST['estado'];
        $tipo_doc = $_POST['tipo_doc'];
        $nit = $_POST['nit'];
        $expediente =$_POST['expediente'];
        $cod_muestra = $_POST['cod_muestra'];
        $us_asignacion = $_POST['us_asignacion'];
        $us_creacion = $_POST['us_creacion'];
        $fecha = $_POST['fecha'];
        $fecha_emision = $_POST['emision'];
        $conclucion = $_POST['conclusion'];
        
        $objeto = new crear_documentos;

        $objeto->crear_pdf($cod_solicitud,$estado_solic,$tipo_doc, $nit,$expediente,$cod_muestra,$us_asignacion,$us_creacion,$fecha,$fecha_emision,$conclucion);
    }
    if (isset($_POST['exel'])){
        $cod_solicitud = $_POST['cod_solicitud'];
        $estado_solic = $_POST['estado'];
        $tipo_doc = $_POST['tipo_doc'];
        $nit = $_POST['nit'];
        $expediente =$_POST['expediente'];
        $cod_muestra = $_POST['cod_muestra'];
        $us_asignacion = $_POST['us_asignacion'];
        $us_creacion = $_POST['us_creacion'];
        $fecha = $_POST['fecha'];
        $fecha_emision = $_POST['emision'];
        $conclucion = $_POST['conclusion'];
        
        $objeto = new crear_documentos;

        $objeto->crear_exel($cod_solicitud,$estado_solic,$tipo_doc, $nit,$expediente,$cod_muestra,$us_asignacion,$us_creacion,$fecha,$fecha_emision,$conclucion);

    }

?>