<?php
include_once '../../php/config.php';

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$password = md5($password);
$rol = (isset($_POST['role'])) ? $_POST['role'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO users (username, email, password, role) VALUES('$username', '$email', '$password', '$rol') ";			
        $resultado = $connection->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE users SET username='$username', email='$email', password='$password', role='$rol' WHERE id='$user_id' ";		
        $resultado = $connection->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM users WHERE id='$user_id' ";       
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM users WHERE id ='$user_id' ";		
        $resultado = $connection->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM users";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    default: break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
