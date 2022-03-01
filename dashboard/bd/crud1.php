<?php
include_once '../../php/config.php';

$paciente = (isset($_POST['paciente'])) ? $_POST['paciente'] : '';
$number = (isset($_POST['number'])) ? $_POST['number'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$sintomas = (isset($_POST['sintomas'])) ? $_POST['sintomas'] : '';
$saturacion = (isset($_POST['saturacion'])) ? $_POST['saturacion'] : '';
$doctor = (isset($_POST['doctor'])) ? $_POST['doctor'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$hora = (isset($_POST['hora'])) ? $_POST['hora'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO files (paciente, number, email, sintomas, saturacion, doctor, fecha, hora) 
                VALUES('$paciente', '$number', '$email', '$sintomas', '$saturacion', '$doctor', '$fecha', '$hora') ";			
        $resultado = $connection->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM files ORDER BY id DESC LIMIT 1";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE files SET paciente='$paciente', number='$number', email='$email', sintomas='$sintomas', saturacion='$saturacion', doctor='$doctor', fecha='$fecha', hora='$hora' WHERE id='$user_id' ";		
        $resultado = $connection->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM files WHERE id='$user_id' ";       
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM files WHERE id ='$user_id' ";		
        $resultado = $connection->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM files";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    default: break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
