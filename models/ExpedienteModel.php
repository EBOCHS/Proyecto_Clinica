<?php
    require ("../controllers/C_Expediente.php");
    include ("../config/databases.php");
    $modelExp = new validar;
if (isset($_POST['Crear'])){ 
    //echo ('hola mundo'); 
   
    //obtenemos los datos del formulario del expediente creamos el modelo de expediente
    $nombre = $_POST['nombre'];
    $val_nombre=$modelExp->val_nombre($nombre);
    $apellido =  $_POST['apellido'];
    $cui = (int)$_POST['cui'];
    $val_cui=$modelExp->val_Cui($cui);
    $Tsangre =$_POST['Tsangre'];
    $val_tsangre = $modelExp->val_tipo_sangre($Tsangre);
    $Sexo = $_POST['sexo'];
    $val_sexo = $modelExp->val_sexo($Sexo);
    $direccion =$_POST['Direccion'];
    $val_direccion = $modelExp ->val_direccion($direccion);
    $Edad = (int)$_POST['edad'];
    $val_edad = $modelExp->val_edad($Edad);
    $Estado_civil = $_POST['Civil'];
    $val_estado_civil = $modelExp->estado_sivil($Estado_civil);
    $nit = $_POST['nit'];
    $val_nit=$modelExp->val_nit($nit);
    $Descripcion = $_POST['descripcion'];
    $val_descripcion =$modelExp->val_Descripcion($Descripcion); 
    $val_apellido = $modelExp->val_apellido($apellido);
    //echo "sexo: ".$_POST['sexo']." civil: ".$_POST['Civil'] ;

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['cui'] = $cui;
    $_SESSION['direccion'] = $direccion;
    $_SESSION['edad'] = $Edad;
    $_SESSION['nit'] = $nit;
    $_SESSION['descripcion'] = $Descripcion;
    //validamos que todo los datos esten correctos 
    if($val_nombre==true){
        if($val_apellido==true){
            if($val_cui==true){
                if($val_edad==true){
                    if($Tsangre!=0){
                        if($val_nit==true){
                            if($val_direccion==true){
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
                                        echo 'EXPEDIENTE CREADO EL CODIGO DEL EXPEDIENTE ES: '.$num_Expediente;  
                                        $_SESSION['message'] = 'EXPEDIENTE CREADO CON EXITO
                                        El Numero De Expediente Es: '.$num_Expediente;
                                        $_SESSION['message_type'] = 'success';
                                        header("Location: ../views/Expedientes/expediente.php");                                      
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
                                    echo 'EXPEDIENTE CREADO EL CODIGO DEL EXPEDIENTE ES: '.$num_Expediente;
                                    $_SESSION['message'] = 'EXPEDIENTE CREADO CON EXITO
                                                            El Numero De Expediente Es: '.$num_Expediente;
                                    $_SESSION['message_type'] = 'danger';
                                    header("Location: ../views/Expedientes/expediente.php");
                                }


                                }else{
                                    echo "ingrese una descripcion: ";
                                    $_SESSION['message'] = 'Ingrese Una Descripcion';
                                    $_SESSION['message_type'] = 'danger';
                                    header("Location: ../views/Expedientes/expediente.php");
                                }
                            }else{
                                echo "ingrese su direccion";
                                $_SESSION['message'] = 'INgrese SU DIreccion';
                                $_SESSION['message_type'] = 'danger';
                                header("Location: ../views/Expedientes/expediente.php");
                            }
                        }else{
                            echo "Nit no valido";
                            $_SESSION['message'] = 'NIT No Valido';
                            $_SESSION['message_type'] = 'danger';
                            header("Location: ../views/Expedientes/expediente.php");
                        }
                        
                    }else{
                        echo"ELija un tipo de sangre";
                        $_SESSION['message'] = 'Elija Un Tipo de Sangre';
                        $_SESSION['message_type'] = 'danger';
                        header("Location: ../views/Expedientes/expediente.php");
                    }
                }else{
                    echo "edad no valido";
                    $_SESSION['message'] = 'Edad no valido solo se permite de 18 asta 99 años';
                    $_SESSION['message_type'] = 'danger';
                    header("Location: ../views/Expedientes/expediente.php");
                }
            }else{
                $_SESSION['message'] = 'CUI No valido';
                $_SESSION['message_type'] = 'danger';
                header("Location: ../views/Expedientes/expediente.php");
            }
        }else{
            $_SESSION['message'] = 'Apellido no valido';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../views/Expedientes/expediente.php");
        }
    }else{
        //echo("nombre no valido" );
        $_SESSION['message'] = 'nombre no valido';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../views/Expedientes/expediente.php");
            
    }
    /*
    if($val_nombre==true){
        if($val_apellido==true){
            if($val_cui==true){
                if($Tsangre!=0){
                    if($Sexo!=0){
                        if($val_direccion==true){
                            if($val_edad==true){
                                if($Estado_civil!=0){
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
    
                                        asta aqui}else{
                                            echo "descripcion no valida";
                                            
                                        }
                                    }else{
                                        echo "NIT no valido";
                                    }

                                }else{
                                    echo "Seleccione su estado civil";

                                }
                                
                            }else{
                                echo "Edad no valida solo se permite de 18 a 99 años";
                            }
                        }else{
                            echo "Ingrese la direccion";

                        }
                }else{
                    echo "Elija el sexo";
                }

                }else{
                   echo "elija un tipo de sangre";
                    
                }
            }else{
                echo "CUI no valido";
            }
            
        }else{
            echo "apellido no valido";
        }
    }else{
        echo "Nombre no valido";
    }*/

}

 if(isset($_POST['cancelar'])){
       header("Location: ../views/inicio/index.php");
       usert( $_SESSION['message']);
}
if(isset($_POST['Inicio'])){
    header("Location: ../views/inicio/index.php");
    usert( $_SESSION['message']);

}

?>