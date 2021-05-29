<?php

class validar_consulta
{
    //funcion que validad que el codigo de solicitud ingresada por el usuario en la vista consulta de solicitudes
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
    //funcion que valida que el numero de expediente  expediente tenga la logitud correcta
    public function v_num_exp($dato)
    {
        $long = strlen($dato);

        if ($long < 19 || $long > 24 || $dato == "") {
            return false;
        } else {
            return true;
        }
    }
    //funcion que valida la longitud de numero del nit 
    public function v_num_nit($dato)
    {  
        if ($dato != "") {
            //echo strlen($dato);
            if (strlen($dato) <= 11) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //funcion que valida es estado de la solicitud 
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
    //funcion que genera un pdf listo para imprimier la informacion 
    public function imprimir_consulta($cod_solicitud,$num_expediente,$num_nit,$tipo_solcitud,$estado_sol
    ,$usuario_asig,$fecha_creacion,$fecha_final,$cant_muestra,$cant_items){
        require ('../config/fpdf183/fpdf.php');//requiere la libreria fpdf.php para su funcionamiento
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,5,' CONSULTA DE SOLICITUD',0,0,'C');
        $pdf->ln(20);
        $pdf->Cell(40,10,'Codigo Del Solicitud: '.$cod_solicitud);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Numero de expediente: '.$num_expediente);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Numero de nit: '.$num_nit);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Tipo de solicitud: '.$tipo_solcitud);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Estado de la solicitud: '.$estado_sol);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Usuario de asignacion: '.$usuario_asig);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Fecha de Creacion: '.$fecha_creacion);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Fecha de vencimiento: '.$fecha_final);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Cantidad de muestra: '.$cant_muestra);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Cantidad de items asociados: '.$cant_items);
        $pdf->Output();
    }
    //funcion que genera un archivo exel con la informacion solicitada
    public function crear_excel($cod_solicitud){    
        require ("../config/databases.php");
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment; filename="Excel.xls"');
          header('Cache-Control: max-age=0');
          header('Expires: 0');
          echo '<table border=1>';
          echo     '<tr>' ;
          echo    '<th colspan=4> Reporte Muestra medica </th>';
          echo    '</tr>'  ; 
          echo    '<tr>
                      <th>Codigo de solicitud</th>
                      <th>Numero de expediente</th>
                      <th>Numero de nit</th>
                      <th>Tipo de solicitud</th>
                      <th>Esdato de solicitud</th>
                      <th>Usuario de asignacion</th>
                      <th>Fecha de creacion</th>
                      <th>Fecha de vencimiento</th>
                      <th>cantidad de muentra</th>
                      <th>Cantidad de items asociados</th>
                  </tr>';
          
          $codigo = "SELECT S.COD_SOLICITUD,EX.NUM_EXPEDIENTE,P.NIT,S.TIPO_SOLICITUD,P.NOMBRE ,S.ESTADO_SOLICITUD, 
          S.FECHA_SOLICITUD_INICIAL,MM.cantidad_muestra,COUNT(A.id_items),
          DATE_ADD(S.FECHA_SOLICITUD_INICIAL ,INTERVAL 30 DAY) as fecha_f
          FROM SOLICITUD S 
          INNER JOIN EXPEDIENTE EX ON EX.ID_EXPEDIENTE = S.ID_EXPEDIENTE 
          INNER JOIN PACIENTE P ON P.ID_PACIENTE = EX.ID_PACIENTE 
          INNER JOIN MUESTRAS_MEDICAS MM ON MM.id_solicitud
          INNER JOIN ASOCIAR A ON A.id_muestra = MM.id_muestra
          WHERE COD_SOLICITUD = '$cod_solicitud' ";   
              $res = mysqli_query($conn,$codigo);
              while($rows = mysqli_fetch_array($res) ){
                  echo '<tr>';
                  echo '<th>'.$rows['COD_SOLICITUD'].'</th>';
                  echo '<th>'.$rows['NUM_EXPEDIENTE'].'</th>';
                  echo '<th>'.$rows['NIT'].'</th>';
                  echo '<th>'.$rows['TIPO_SOLICITUD'].'</th>';
                  echo '<th>'.$rows['ESTADO_SOLICITUD'].'</th>';
                  echo '<th>'.$rows['NOMBRE'].'</th>';
                  echo '<th>'.$rows['FECHA_SOLICITUD_INICIAL'].'</th>';
                  echo '<th>'.$rows['fecha_f'].'</th>';
                  echo '<th>'.$rows['cantidad_muestra'].'</th>';
                  echo '<th>'.$rows['COUNT(A.id_items)'].'</th>';
                  echo '<tr>';

              }
    }
}
