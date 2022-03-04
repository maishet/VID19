<?php
    
    include_once 'config.php';
    session_start();

    if(isset($_SESSION['user'])){
        
        session_destroy();

        header("location: ../index.php");
        
    }else{
        //no existe la sesion
        header("location: ../index.php");
        
    }

?>