<?php
include_once '../../php/config.php';

$title = (isset($_POST['title'])) ? $_POST['title'] : '';
$meet = (isset($_POST['meet'])) ? $_POST['meet'] : '';
$url = (isset($_POST['url'])) ? $_POST['url'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO receta (title, meet, url) VALUES('$title', '$meet', '$url') ";			
        $resultado = $connection->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM receta ORDER BY id DESC LIMIT 1";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE receta SET title='$title', meet='$meet', url='$url' WHERE id='$user_id' ";		
        $resultado = $connection->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM receta WHERE id='$user_id' ";       
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM receta WHERE id ='$user_id' ";		
        $resultado = $connection->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM receta";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    default: break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
