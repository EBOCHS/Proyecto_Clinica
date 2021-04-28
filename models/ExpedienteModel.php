<?php
    require ("../controllers/C_Expediente.php");
    include ("../config/databases.php");
    $modelExp = new validar;
if (isset($_POST['Crear'])){  
   
    //obtenemos los datos del formulario del expediente
    $nombre = $_POST['nombre'];
    $val_nombre=$modelExp->val_nombre($nombre);
    $apellido =  $_POST['apellido'];
    $cui = (int)$_POST['cui'];
    $val_cui=$modelExp->val_Cui($cui);
    $Tsangre =$_POST['Tsangre'];
    $val_tsangre = $modelExp->val_tipo_sangre($Tsangre);
    $Sexo = $_POST['Sexo'];
    $val_sexo = $modelExp->val_sexo($Sexo);
    $direccion =$_POST['direccion'];
    $val_direccion = $modelExp ->val_direccion($direccion);
    $Edad = (int)$_POST['Edad'];
    $val_edad = $modelExp->val_edad($Edad);
    $Estado_civil = $_POST['Estado_civil'];
    $nit = $_POST['nit'];
    $val_nit=$modelExp->val_nit($nit);
    $Descripcion = $_POST['Descripcion'];
    $val_descripcion =$modelExp->val_Descripcion($Descripcion); 
    $val_apellido = $modelExp->val_apellido($apellido);

    $_SESSION['nombre'] = $nombre;
    echo ($_SESSION['nombre']);
    $_SESSION['$apellido'] = $apellido;
    //validamos que todo los datos esten correctos 
   
    if($val_nombre==true){
        if($val_apellido==true){
            if($val_cui==true){
                if($Tsangre!=0){
                    if($Sexo!=0){
                        if($val_direccion==true){
                            if($val_edad==true){
                                if($val_nit==true){
                                    if($val_descripcion==true){
                                         //guardamos el paciente en la base de datos
                                        if(!isset($_SESSION['usuario'])){
                                                $query ="INSERT  INTO PACIENTE (NOMBRE,APELLIDO,CUI,TIPO_SANGRE,SEXO,DERECCION,EDAD,NIT,ESTADO_CIVIL) 
                                                VALUES('$nombre','$apellido','$cui','$val_tsangre','$val_sexo','$Descripcion',$Edad,'$nit','$Estado_civil')";
                                                $resultado = mysqli_query($conn,$query);
                                                if(!$resultado){
                                                    die(mysqli_error($conn));
                                                }
                                                //creamos expediente
                                                $consulta_expediente = "SELECT  NUM_EXPEDIENTE from EXPEDIENTE order by NUM_EXPEDIENTE desc limit 1";
                                                $res = mysqli_query($conn,$consulta_expediente);//obtengo el ultimo numero de expediente creado 
                                                $num_Expediente=$modelExp->get_Num_Expediente($res);
                                        
                                                $get_id_pacinet="SELECT ID_PACIENTE FROM PACIENTE order bY ID_PACIENTE desc limit 1";
                                                $result = mysqli_query($conn,$get_id_pacinet);//obtengo la id del paciente nuevo
                                                if(!$result){
                                                    die(mysqli_error($conn));
                                                }
                                                
                                                (int)$id =$modelExp-> get_id($result);//id para la relacion con la tabla expediente y paciente
                                                $new_exp= "INSERT INTO EXPEDIENTE (NUM_EXPEDIENTE,DESCRIPCION,ESTADO,USUARIO_CREACION,ID_PACIENTE)
                                                VALUES('$num_Expediente','$Descripcion','Creado','EXTERNO',$id)";
                                                $resultado = mysqli_query($conn,$new_exp);
                                                if(!$resultado){
                                                    die(mysqli_error($conn));
                                                }
                                                    
                                                $_SESSION['message']='EXPEDIENTE CREADO EL CODIGO DEL EXPEDIENTE ES: '.$num_Expediente;
                                                $_SESSION['message_type']='success';
                                                header("Location: ../views/Expedientes/expedientes.php");
                                        
                                            }
                                            else{
                                                $usuario_creacion =$_SESSION['usuario'];
                                            $query ="INSERT  INTO PACIENTE (NOMBRE,APELLIDO,CUI,TIPO_SANGRE,SEXO,DERECCION,EDAD,NIT,ESTADO_CIVIL) 
                                            VALUES('$nombre','$apellido','$cui','$val_tsangre','$val_sexo','$Descripcion',$Edad,'$nit','$Estado_civil')";
                                            $resultado = mysqli_query($conn,$query);
                                            if(!$resultado){
                                                 die(mysqli_error($conn));
                                            }
                                            //creamos expediente
                                            $consulta_expediente = "SELECT  NUM_EXPEDIENTE from EXPEDIENTE order by NUM_EXPEDIENTE desc limit 1;";
                                            $res = mysqli_query($conn,$consulta_expediente);//obtengo el ultimo numero de expediente creado 
                                            $num_Expediente=$modelExp->get_Num_Expediente($res);
                                    
                                            
                                            $get_id_pacinet="SELECT ID_PACIENTE FROM PACIENTE order bY ID_PACIENTE desc limit 1";
                                            $result = mysqli_query($conn,$get_id_pacinet);//obtengo la id del paciente nuevo
                                            if(!$result){
                                                die(mysqli_error($conn));
                                            }
                                            
                                            (int)$id =$modelExp-> get_id($result);//id para la relacion con la tabla expediente y paciente
                                            $new_exp= "INSERT INTO EXPEDIENTE (NUM_EXPEDIENTE,DESCRIPCION,ESTADO,USUARIO_CREACION,ID_PACIENTE)
                                            VALUES('$num_Expediente','$Descripcion','Creado','$usuario_creacion',$id)";
                                            $resultado = mysqli_query($conn,$new_exp);
                                            if(!$resultado){
                                                die(mysqli_error($conn));
                                            }
                                                
                                            $_SESSION['message']='EXPEDIENTE CREADO EL CODIGO DEL EXPEDIENTE ES: '.$num_Expediente;
                                            $_SESSION['message_type']='success';
                                            header("Location: ../views/Expedientes/expedientes.php");
                                            }

                                    }else{
                                        $_SESSION['message']='Descripcion invalida solo se permite 400 caracteres';
                                        $_SESSION['message_type']='danger';
                                        header("Location: ../views/Expedientes/expedientes.php");
                                    }
                                }else{
                                    $_SESSION['message']='nit no valido debe de cumplir la siguente estructura 99999999999-9';
                                    $_SESSION['message_type']='danger';
                                    header("Location: ../views/Expedientes/expedientes.php");
                  
                                }
                            }else{
                                $_SESSION['message']='Edad no valida solo se permite numeros entre 0 en adelante';
                                $_SESSION['message_type']='danger';
                                header("Location: ../views/Expedientes/expedientes.php");
                            }
                        }else{
                            $_SESSION['message']='Direccion no valida solo se permite letras, numeros, guion , punto y 200 caracteres maximos';
                            $_SESSION['message_type']='danger';
                            header("Location: ../views/Expedientes/expedientes.php");
                        }
                }else{
                    $_SESSION['message']='Elija El Sexo Campo obligatorio';
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Expedientes/expedientes.php");
                }

                }else{
                    $_SESSION['message']='Elija Un Tipo De Sangre Campo Obligatorio';
                    $_SESSION['message_type']='danger';
                    header("Location: ../views/Expedientes/expedientes.php");
                }
            }else{
                $_SESSION['message']='CUI no valido Solo se permite numeros de enteros de 11 cifrass';
                $_SESSION['message_type']='danger';
                header("Location: ../views/Expedientes/expedientes.php");
            }
            
        }else{
            $_SESSION['message']='apellido no valido';
            $_SESSION['message_type']='danger';
           header("Location: ../views/Expedientes/expedientes.php");
        }
    }else{
        $_SESSION['message']='Nombre no valido';
        $_SESSION['message_type']='danger';
       header("Location: ../views/Expedientes/expedientes.php");
       
    }

}else if(isset($_POST['cancelar'])){
       header("Location: ../views/inicio/index.php");
}
?>