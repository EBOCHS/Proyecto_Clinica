<?php 
    include("../config/databases.php");
    if (isset($_POST['asignar'])){
        //cantidad de usuarios analistas
        $query="SELECT COUNT(ID_ROL_USUARIO ) FROM USUARIO u 
        WHERE ID_ROL_USUARIO = '4'";
        
        //id de los analistas 
        $id_analista= "SELECT  ID_USUARIO FROM USUARIO u 
        inner join ROL_USUARIO r  on r.ID_ROL_USUARIO = u.ID_ROL_USUARIO 
        WHERE DESCRIPCION='analista'";
        $res = mysqli_query($conn,$id_analista);

    
        //cantidad de solicitudes de cada analista
        $pila = new SplStack();
        while($row=mysqli_fetch_array( $res)){
            $id = $row['ID_USUARIO'];
            $cantidad="SELECT COUNT(*) FROM SOLICITUDES_ASIGNADAS
            WHERE ID_USUARIO='$id'";
            $resp=mysqli_query($conn,$cantidad);
            $pila -> push($resp);
        }

        while($pilas ->valid() ){
            echo $pila->current(), PHP_EOL;
            $pila->next();
        }
        

    }

?>