<?php
 
    include ("../config/databases.php");
    require ("../controllers/C_Expediente.php");
    $modelExp = new validar;
  if (isset($_POST['Crear'])){  
    //creamos paciente 
   $Descripcion = $modelExp->val_Descripcion($_POST['Descripcion']);
      $nit = $modelExp->val_nit($_POST['nit']);
      $Estado_civil = $_POST['Estado_civil'];
      $Edad = $modelExp->val_edad((int)$_POST['Edad']);
      $direccion =$modelExp ->val_direccion($_POST['direccion']);
      $Sexo = $modelExp->val_sexo( $_POST['Sexo']);
      $Tsangre = $modelExp->val_tipo_sangre($_POST['Tsangre']);
        $cui = $modelExp->val_Cui((int)$_POST['cui']);
        $apellido =  $modelExp->val_apellido($_POST['apellido']);
        
        $nombre = $modelExp->val_nombre($_POST['nombre']);
    
        $query ="INSERT  INTO PACIENTE (NOMBRE,APELLIDO,CUI,TIPO_SANGRE,SEXO,DERECCION,EDAD,NIT,ESTADO_CIVIL) 
        VALUES('$nombre','$apellido','$cui','$Tsangre','$Sexo','$Descripcion',$Edad,'$nit','$Estado_civil')";
        $resultado = mysqli_query($conn,$query);
        if(!$resultado){
            die(mysqli_error($conn));
        }
        
        //creamos expediente
        
        $consulta_expediente = "SELECT  NO_EXP from EXPEDIENTES order by NO_EXP desc limit 1";
        $res = mysqli_query($conn,$consulta_expediente);//ontengo el ultimo numero de expediente creado 
        $num_Expediente=$modelExp->get_Num_Expediente($res);


        $get_id_pacinet="SELECT ID_PACIENTE FROM PACIENTE order bY ID_PACIENTE desc limit 1";
        $result = mysqli_query($conn,$get_id_pacinet);
        if(!$result){
            die(mysqli_error($conn));
        }
         (int)$id =$modelExp-> get_id($result);
         echo($id);
        
        $new_exp= "INSERT INTO EXPEDIENTES (NO_EXP,Descripcion,ID_PACIENTE)
         VALUES('$num_Expediente','$Descripcion',$id)";
        $resultado = mysqli_query($conn,$new_exp);
        if(!$resultado){
            die(mysqli_error($conn));
        }
        
        $_SESSION['message']='EXPEDIENTE CREADO';
        $_SESSION['message_type']='success';
        header("Location: ../views/Expedientes/expedientes.php");

    }

?>