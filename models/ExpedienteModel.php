<?php
 
    include ("../config/databases.php");
    require ("../controllers/C_Expediente.php");
    $modelExp = new validar;
  if (isset($_POST['Crear'])){  

    $consulta = "SELECT  * from expedientes order by id_expediente desc limit 1";
    $res = mysqli_query($conn,$consulta);
    $codigo=$modelExp->get_Num_Expediente($res); 
      $nit = $modelExp->val_nit($_POST['nit']);
      $Edad = $modelExp->val_edad((int)$_POST['Edad']);
      $direccion =$modelExp ->val_direccion($_POST['direccion']);
       $Sexo = $modelExp->val_sexo( $_POST['Sexo']);
        $Tsangre = $modelExp->val_tipo_sangre($_POST['Tsangre']);
        $cui = (int)$_POST['cui'];
        $modelExp->val_Cui($cui);
        $apellido = $_POST['apellido'];
        $modelExp->val_apellido($apellido);
        $nombre = $_POST['nombre'];
        $modelExp->val_nombre($nombre);
 
        //esto no sierve :v 
        $cui = (int)$_POST['cui'];
        $Tsangre = "A+"; //$_POST['Tsangre'];
        $Sexo = "M"; //$_POST['Sexo'];
        $direccion = $_POST['direccion'];
        $Edad = (int)$_POST['Edad'];
        $Estado_civil = $_POST['Estado_civil'];
        $nit = $_POST['nit'];
        $Descripcion = $_POST['Descripcion'];        
        //esto si sirve
        $query =" INSERT  INTO expedientes (nombre_paciente ,apellido_paciente ,cui 
        ,tipo_sangre ,sexo ,direccion 
        ,edad ,estado_civil ,decripcion  ) VALUES(' $nombre',' $apellido','$val','$Tsangre+','$Sexo','$direccion',
        $ed,'$Estado_civil','$Descripcion')";
        
        
        $resultado = mysqli_query($conn,$query);
        if(!$resultado){
            die(mysqli_error($conn));
        }
        $_SESSION['message']='Expediente Creado';
        $_SESSION['message_type']='success';
        header("Location: ../views/Expedientes/expedientes.php");
    }

?>