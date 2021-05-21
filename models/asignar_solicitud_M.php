<?php 
    
    if (isset($_POST['asignar'])){
        //cantidad de usuarios analistas
        $query="SELECT COUNT(ID_ROL_USUARIO ) FROM USUARIO u 
        WHERE ID_ROL_USUARIO = '4'";
        

    }

?>