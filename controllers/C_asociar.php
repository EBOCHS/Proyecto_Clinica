<?php
class asociar{
    public function val_codigo_muestra($codigo){
       if($codigo!=""){
            if(strlen($codigo)>=15){
                return true;
            }else{
                return false;
            }
            
       }else{
           return false;
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
            return false;
        }
        //return "codigo: ".$codigo_muestra." tipo_muestra: ".$tipo_muestra;
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
          return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '2' or id_items='3' or id_items = '4'";
        }else if($item1=="on" && $item2 =="on" && $item3=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '2' or id_items='3'";
        }else if($item1=="on" && $item3 =="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '3' or id_items='4'";
        }else if($item1=="on" && $item2 =="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '2' or id_items='4'";
        }else if($item2=="on" && $item3 =="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '2'  or id_items = '3' or id_items='4'";
        }else if($item1=="on" && $item2 =="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '2'";
        }else if($item1=="on" && $item3 =="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '3'";
        }else if($item1=="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '1'  or id_items = '4'";
        }else if($item2=="on" && $item3=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '2'  or id_items = '3'";
        }else if($item2=="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '2'  or id_items = '4'";
        }else if($item3=="on" && $item4=="on"){
            return  "DELETE FROM ASOCIAR  WHERE  id_muestra = '$id_muestra'  AND id_items = '3'  or id_items = '4'";
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
}

?>