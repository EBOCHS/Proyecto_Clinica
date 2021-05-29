<?php
 class consulta_muestra{
     //funcion para ver que tipo de consilta se hace en la vista consulta de muestras medicas
   public function val_dato_condicion($condicion,$dato_busqueda){
        switch($condicion){
            case "NUM_EXPEDIENTE":
                if( strlen($dato_busqueda)>19){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  NUM_EXPEDIENTE= '$dato_busqueda' AND mm.estado='creado'";
                        return $query;
                }else{
                    unset( $_SESSION['rows']);
                    $_SESSION['message']="CODIGO DE EXPEDIENTE Incorrecto";
                    return false;
                }
                
                break;
            case "codigo_muestra":
                if( strlen($dato_busqueda)>10){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  codigo_muestra= '$dato_busqueda' AND mm.estado='creado'";
                    return $query;
                }else{
                    unset( $_SESSION['rows']);
                    $_SESSION['message']="Codigo De Muestra Incorrecto";
                    return false;
                }
                break;
            case "COD_SOLICITUD":
                if( strlen($dato_busqueda)>10){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE  where COD_SOLICITUD= '$dato_busqueda' AND mm.estado='creado'";
                    return $query;
                }else{
                    unset( $_SESSION['rows']);
                    $_SESSION['message']="Codigo De Solicitud Incorrecto";
                    return false;
                }
                break ;
            case "NIT": 
                if( strlen($dato_busqueda)>4){
                    $query="
                    SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  NIT= '$dato_busqueda' AND mm.estado='creado'";
                    return $query;
                }else{
                    unset( $_SESSION['rows']);
                    $_SESSION['message']="Numero de nit Incorrecto";
                    return false;
                }
                break;

            default : 
            unset( $_SESSION['rows']);
            $_SESSION['message']="Ingrese un filtro de busqueda";
            return false ;  
        }
   }
   //funcion que genera el reporte de la informacion en pdf
   public function pdf($condicion,$dato_busqueda){
    require ('../config/fpdf183/fpdf.php');
    require ("../config/databases.php");
    $pdf = new FPDF();
    $pdf ->AliasNbPages();
    $pdf->AddPage();
    $pdf-> SetFont('Arial','B',10);
    $pdf->Cell(0,5,'Consulta De MUESTRA',0,0,'C');
    $pdf->ln(20);
    $pdf->Cell(35,8,'codigo_muestra',1,0,'C',0);
    $pdf->Cell(35,8,'tipo_muestra',1,0,'C',0);
    $pdf->Cell(35,8,'COD_SOLICITUD',1,0,'C',0);
    $pdf->Cell(37,8,'NUM_EXPEDIENTE',1,0,'C',0);
    $pdf->Cell(35,8,'FECHA_CREACION',1,0,'C',0);
    $pdf->ln(8);
    $query="SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                    INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                    INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                    inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  $condicion= '$dato_busqueda'";
    $res =mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($res)){
        $pdf->Cell(35,8,$row['codigo_muestra'],1,0,'C',0);
        $pdf->Cell(35,8,$row['tipo_muestra'],1,0,'C',0);
        $pdf->Cell(35,8,$row['COD_SOLICITUD'],1,0,'C',0);
        $pdf->Cell(37,8,$row['NUM_EXPEDIENTE'],1,0,'C',0);
        $pdf->Cell(35,8,$row['FECHA_CREACION'],1,0,'C',0);
        $pdf->ln(8);
    }
    
    $pdf->Output();
   }
   //funcion que genera el un exel con la informacion que es solicitada 
   public function exel ($condicion,$dato_busqueda){
    require ("../config/databases.php");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Excel.xls"');
        header('Cache-Control: max-age=0');
        header('Expires: 0');
        echo '<table border=1>';
        echo     '<tr>' ;
        echo    '<th colspan=4> Reporte Solicitudes de muestras </th>';
        echo    '</tr>'  ; 
        echo    '<tr>
                    <th>CODIGO DE MUESTRA</th>
                    <th>tipo_muestra</th>
                    <th>COD_SOLICITUD</th>
                    <th>NUM_EXPEDIENTE</th>
                    <th>presentacion_muestra</th>
                    <th>estado</th>
                    <th>FECHA_CREACION</th>
                </tr>';
                $tabla="SELECT  mm.codigo_muestra,mm.tipo_muestra,so.COD_SOLICITUD,e.NUM_EXPEDIENTE,mm.presentacion_muestra,mm.estado,mm.FECHA_CREACION FROM EXPEDIENTE e 
                INNER JOIN SOLICITUD so ON e.ID_EXPEDIENTE = so.ID_EXPEDIENTE 
                INNER  join MUESTRAS_MEDICAS  mm on mm.id_solicitud = so.ID_SOLICITUD
                inner join  PACIENTE p on p.ID_PACIENTE =e.ID_PACIENTE where  $condicion= '$dato_busqueda' ";
                $res = mysqli_query($conn,$tabla);
                while($row=mysqli_fetch_array($res) ){
                    echo '<tr>';
                    echo '<td>'.$row['codigo_muestra'].'<td>';
                    echo '<td>'.$row['tipo_muestra'].'<td>';
                    echo '<td>'.$row['COD_SOLICITUD'].'<td>';
                    echo '<td>'.$row['NUM_EXPEDIENTE'].'<td>';
                    echo '<td>'.$row['presentacion_muestra'].'<td>';
                    echo '<td>'.$row['estado'].'<td>';
                    echo '<td>'.$row['FECHA_CREACION'].'<td>';
                    echo '<tr>';                
                }
   }
   
 }
?>