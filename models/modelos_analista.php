<?php
require ('../controllers/C_analistas.php');
require ('../config/databases.php');




    //creamos el modelo de un usuario con los datos de la vista matenimiento de analistas
    $nombre_us = $_POST['nombres'];
    $contraseña = $_POST['pass'];
    $apellido = $_POST['apellidos'];
    $telefono = $_POST['telefonos'];
    $correo= $_POST['mail'];
    $cui = $_POST['cui'];
    $rol_us = $_POST['rol'];
    $ID_USER= $_POST['ID_USR'];

    //creamos un nuevo objeto de la clase C_analistas.php
    $C_analistas = new validar_usuario_nuevo; 
    //validamos los datos ingresados que sean correctos y que cumplan con la estructura permitida
    if($C_analistas->val_nombre($nombre_us)){
        if($C_analistas->val_apellido($apellido)){
            if($C_analistas->val_pass($contraseña)){
                if($C_analistas->val_tel($telefono)){
                    if ($C_analistas->val_Cui($cui)){
                        if($rol_us!=""){
                            if(isset($_POST['Crear'])){
                                $query ="INSERT INTO PACIENTE (NOMBRE,APELLIDO,CUI,SEXO,DERECCION,EDAD,NIT,ESTADO_CIVIL,TELEFONO,EMAIL,TIPO_SANGRE) 
                                VALUES ('$nombre_us','$apellido','$cui','NA','NA',0,'NA','NA','$telefono','$correo','NA') ";
                                $res = mysqli_query($conn,$query);
                                if(!$res){
                                    die(mysqli_error($conn));
                                }

                                $buscar_id = "SELECT ID_PACIENTE FROM PACIENTE  WHERE CUI = '$cui'";
                                $resp = mysqli_query($conn,$buscar_id);
                                
                                $b_id = mysqli_fetch_array($resp);    
                                $id_usuario = $b_id['ID_PACIENTE'];
                                
                               //insertar usuario nuevo
                               $insert_user = "INSERT INTO USUARIO (ALIAS,PASSWD,ID_PACIENTE,ID_ROL_USUARIO,ESTADO)
                               VALUES ('$nombre_us','$contraseña','$id_usuario','$rol_us','ACTIVO') ";
                               $re = mysqli_query($conn,$insert_user);
                               if(!$re){
                                die(mysqli_error($conn));
                                }
                                $_SESSION['message'] = 'Usuario Creado Correctamente';
                                $_SESSION['message_type'] = 'green';
                                header("Location: ../views/mantenimiento_analistas/crud.php");

                            }

                            if(isset($_POST['Editar'])){
                                echo "id a acrualizar ".$ID_USER;
                                $query_p = "UPDATE PACIENTE  SET NOMBRE = '$nombre_us',APELLIDO=' $apellido',TELEFONO='$telefono',EMAIL='$correo' WHERE ID_PACIENTE = '$ID_USER';";
                                $p=mysqli_query($conn,$query_p);
                                $query_u ="UPDATE  USUARIO set ALIAS='$nombre_us',PASSWD ='$contraseña',ID_ROL_USUARIO='$rol_us' WHERE  ID_PACIENTE ='$ID_USER' ";
                                $u=mysqli_query($conn,$query_u);
                                if(!$p){
                                    die(mysqli_error($conn));   
                                }
                                if(!$u){
                                    die(mysqli_error($conn)); 
                                }
                                $_SESSION['message'] = 'Actualizado Correctamente';
                                $_SESSION['message_type'] = 'green';
                                header("Location: ../views/mantenimiento_analistas/crud.php");

                            }
                        }else {
                            $_SESSION['message'] = 'Elija un Rol para el usuario';
                            $_SESSION['message_type'] = 'green';
                            header("Location: ../views/mantenimiento_analistas/crud.php");
        
                        }
                    }else{
                        $_SESSION['message'] = 'Numero Cui no valido';
                        $_SESSION['message_type'] = 'green';
                        header("Location: ../views/mantenimiento_analistas/crud.php");
    
                    }
                }else{
                    $_SESSION['message'] = 'Numero de telefono no valido';
                    $_SESSION['message_type'] = 'green';
                    header("Location: ../views/mantenimiento_analistas/crud.php");

                }
            }else{
                $_SESSION['message'] = 'Contraseña no valida';
                $_SESSION['message_type'] = 'green';
                header("Location: ../views/mantenimiento_analistas/crud.php");

            }
        }
    }else{
        $_SESSION['message'] = 'Nombre no valido';
        $_SESSION['message_type'] = 'red';
        header("Location: ../views/mantenimiento_analistas/crud.php");
    }
   
 



?>