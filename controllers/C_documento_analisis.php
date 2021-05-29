<?php
    class crear_documentos{

        public function crear_pdf($cod_solicitud,$estado_solic,$tipo_doc, $nit,$expediente,$cod_muestra,$us_asignacion,$us_creacion,$fecha,$fecha_emision,$conclucion){
            require ('../config/fpdf183/fpdf.php');
            $pdf = new FPDF();
    $pdf ->AliasNbPages();
    $pdf->AddPage();
    $pdf-> SetFont('Arial','B',10);
    $pdf->Cell(0,5,'Documento De MUESTRA',0,0,'C');
    $pdf->ln(20);
    $pdf->Cell(35,8,'Codigo Solicitud',1,0,'C',0);
    $pdf->Cell(35,8,'Estado Solicitud',1,0,'C',0);
    $pdf->Cell(35,8,'NIT',1,0,'C',0);
    $pdf->Cell(37,8,'Numero Expediente',1,0,'C',0);
    $pdf->Cell(35,8,'Codigo muestra',1,0,'C',0);
    $pdf->ln(8);
    $pdf->Cell(35,8,$cod_solicitud,1,0,'C',0);
    $pdf->Cell(35,8,$estado_solic,1,0,'C',0);
    $pdf->Cell(35,8,$nit,1,0,'C',0);
    $pdf->Cell(37,8,$expediente,1,0,'C',0);
    $pdf->Cell(35,8,$cod_muestra,1,0,'C',0);
    $pdf->ln(20);
    $pdf->Cell(35,8,'Usuario Asignacion',1,0,'C',0);
    $pdf->Cell(35,8,'Usuario Creacion',1,0,'C',0);
    $pdf->Cell(35,8,'Fecha Creacion',1,0,'C',0);
    $pdf->Cell(35,8,'Fecha Emision',1,0,'C',0);
    $pdf->Cell(35,8,'Tipo Documento',1,0,'C',0);
    $pdf->ln(8);
    $pdf->Cell(35,8,$us_asignacion,1,0,'C',0);
    $pdf->Cell(35,8,$us_creacion,1,0,'C',0);
    $pdf->Cell(35,8,$fecha,1,0,'C',0);
    $pdf->Cell(35,8,$fecha_emision,1,0,'C',0);
    $pdf->Cell(35,8,$tipo_doc,1,0,'C',0);
    $pdf->ln(20);
    $pdf->Cell(180,8,'Conclicion  ',1,0,'C',0);
    $pdf->ln(8);
    $pdf->Cell(180,8,$conclucion,1,0,'C',0);
    $pdf->Output();
        }

    public function crear_exel($cod_solicitud,$estado_solic,$tipo_doc, $nit,$expediente,$cod_muestra,$us_asignacion,$us_creacion,$fecha,$fecha_emision,$conclucion){
        require ("../config/databases.php");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Excel.xls"');
        header('Cache-Control: max-age=0');
        header('Expires: 0');
        echo '<table border=1>';
        echo     '<tr>' ;
        echo    '<th colspan=4> Documento De MUESTRA </th>';
        echo    '</tr>'  ; 
        echo    '<tr>
                    <th>Codigo Solicitud</th>
                    <th>Estado Solicitud</th>
                    <th>NIT</th>
                    <th>Numero Expediente</th>
                    <th>Codigo muestra</th>
                    <th>Usuario Asignacion</th>
                    <th>Usuario Creacion</th>
                    <th>Fecha Creacion</th>
                    <th>Fecha Emision</th>
                    <th>Tipo Documento</th>
                    <th>Conclucion</th>
                </tr>';

                echo '<tr>';
                    echo '<td>'.$cod_solicitud.'<td>';
                    echo '<td>'.$estado_solic.'<td>';
                    echo '<td>'.$nit.'<td>';
                    echo '<td>'.$expediente.'<td>';
                    echo '<td>'.$cod_muestra.'<td>';
                    echo '<td>'.$us_asignacion.'<td>';
                    echo '<td>'.$us_creacion.'<td>';
                    echo '<td>'.$fecha.'<td>';
                    echo '<td>'.$fecha_emision.'<td>';
                    echo '<td>'.$tipo_doc.'<td>';
                    echo '<td>'.$conclucion.'<td>';
                    echo '<tr>';                
                
  
    }
    }
?>