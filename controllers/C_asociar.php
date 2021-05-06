<?php
class asociar{
    public function val_codigo_muestra($codigo){
    
            if(strlen($codigo)>=14){
                    return true;
                }else{
                    return 0;
            }
        
    }
    public function val_consulta($datos){
        
        while($rows = mysqli_fetch_array($datos)){
            $resultado = $rows['COUNT(*)'];
        }
        if($resultado==1){
            return true;
        }
        else{
            return 0;
        }
    }
    public function asociar_item($item1,$item2,$item3,$item4,$id_muestra){
        if($item1=="on" && $item2 =="on" && $item3=="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,2), ($id_muestra,3), ($id_muestra,4)";
        }else if($item1=="on" && $item2 =="on" && $item3=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,2), ($id_muestra,3)";
        }else if($item1=="on" && $item3 =="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,3), ($id_muestra,4)";
        }else if($item1=="on" && $item2 =="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,2), ($id_muestra,4)";
        }else if($item2=="on" && $item3 =="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,2), ($id_muestra,3),($id_muestra,4)";
        }else if($item1=="on" && $item2 =="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,2)";
        }else if($item1=="on" && $item3 =="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,3)";
        }else if($item1=="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1), ($id_muestra,4)";
        }else if($item2=="on" && $item3=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,2), ($id_muestra,3)";
        }else if($item2=="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,2), ($id_muestra,4)";
        }else if($item3=="on" && $item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,3), ($id_muestra,4)";
        }else if($item1=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,1)";
        }else if($item2=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,2)";
        }else if($item3=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,3)";
        }else if($item4=="on"){
            return "INSERT INTO ASOCIAR (id_muestra,id_items) VALUES ($id_muestra,4)";
        }
    }
    public function desacociar_item($item1,$item2,$item3,$item4,$id_muestra){
        
        if($item1=="on" && $item2 =="on" && $item3=="on" && $item4=="on"){
          return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','2','3','4')";
        }else if($item1=="on" && $item2 =="on" && $item3=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','2','3')";
        }else if($item1=="on" && $item3 =="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','3','4')";
        }else if($item1=="on" && $item2 =="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','2','4')";
        }else if($item2=="on" && $item3 =="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('2','3','4')";
        }else if($item1=="on" && $item2 =="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','2')";
        }else if($item1=="on" && $item3 =="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','3')";
        }else if($item1=="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('1','4')";
        }else if($item2=="on" && $item3=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('2','3')";
        }else if($item2=="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('2','4')";
        }else if($item3=="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items IN ('3','4')";
        }else if($item1=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'";
        }else if($item2=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '2'";
        }else if($item3=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '3'";
        }else if($item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '4'";
        }

    }

    public function generar_QR($contenido){
       
        require ("../config/qr/phpqrcode/qrlib.php");
        $dir = 'temp/';
        if (!file_exists($dir)){
            mkdir($dir);
        }
        $nombre_qr= $dir.'test.png';
        $tamanio = 4;
        $level = 'M';
        $framesize = 3;
        QRcode :: png($contenido,$nombre_qr,$level,$tamanio,$framesize);
        return $nombre_qr;
    }
    public function imprimir_Etiqueta($cod_muestra,$cod_exp,$cod_solicitud,$qr,$cod_etiqueta){
        require ('../config/fpdf183/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,5,'ETIQUETA DE MUESTRA',0,0,'C');
        $pdf->ln(20);
        $pdf->Cell(40,10,'Codigo Del Expediente: '.$cod_exp);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Codigo De muestra: '.$cod_muestra);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Codigo De Solicitud: '.$cod_solicitud);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Codigo De Etiqueta: '.$cod_etiqueta);
        $pdf->ln(20);
        $pdf->Cell(40,10,'Codigo QR: ');
        $pdf -> Image($qr,30,120,40,40,'png');
        $pdf->Output();
    }

    public function get_cod_etiqueta($fecha){
        $random = rand(1, 4);
        $num = rand(10000,99999);
        $año = substr($fecha,0,4);
        $mes = substr($fecha,5,2);
        $dia = substr($fecha,-2);
        switch($random){
            case 1 :
                $letra = 'SM';
                $num_etiqueta = $letra."-".$año.$mes.$dia."-".$num;
                return $num_etiqueta;

                break;
            case 2 :
                $letra = 'FP';
                $num_etiqueta = $letra."-".$año.$mes.$dia."-".$num;
                return $num_etiqueta;
                break;
            case 3 :
                $letra = 'ET';
                $num_etiqueta = $letra."-".$año.$mes.$dia."-".$num;
                return $num_etiqueta;
                break;
            case 4 :
                $letra = 'HO';
                $num_etiqueta = $letra."-".$año.$mes.$dia."-".$num;
                return $num_etiqueta;
                break;
        }
    }
    public function crear_excel($cod_muestra){    
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
                    <th>CODIGO DE MUESTRA</th>
                    <th>CANTIDAD DE ITEMS</th>
                    <th>CARACTERISTICAS</th>
                </tr>';
        
        $codigo = "SELECT codigo_muestra FROM MUESTRAS_MEDICAS WHERE id_muestra = '$cod_muestra'";   
            $res = mysqli_query($conn,$codigo);
            while($rows = mysqli_fetch_array($res) ){
                echo '<tr>';
                echo '<th>'.$rows['codigo_muestra'].'</th>';
            }
        $cantidad = "SELECT COUNT(*) FROM ASOCIAR WHERE id_muestra = '$cod_muestra'";
        $res1= mysqli_query($conn,$cantidad);
        while($row = mysqli_fetch_array($res1) ){
            echo '<th>'.$row['COUNT(*)'].'</th>';
        }
        $descipcion = "SELECT IT.DESCRIPCION FROM ASOCIAR A
        INNER JOIN ITEMS IT ON A.id_items = IT.ID 
        WHERE id_muestra = '$cod_muestra'";
         $res2 = mysqli_query($conn,$descipcion);
         while($ro = mysqli_fetch_array($res2) ){
             echo '<th>'.$ro['DESCRIPCION'].'</th>';
             
         }
         echo '</tr>';
    }
    public function eliminar_muestra($id_muestra){
        $eliminar = "DELETE FROM MUESTRAS_MEDICAS WHERE id_muestra = '$id_muestra'";
        return $eliminar;
    }

}

?>