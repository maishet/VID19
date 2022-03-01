<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.html');
    exit;
} else {
    // Show users the page!
    $user = $_SESSION['user'];
    $role = $_SESSION['user_rol'];
    $photo = $_SESSION['photo'];
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>vid 19 - <?php echo $role?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="../img/pestana.png"> <!-- imagen q sale en la pestaña -->

        <link rel="stylesheet" href="../css/default.css"> <!-- LO PUEDES CAMBIAR A "../css/styles.css" -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>
    <body>
    <!-- Menu de Navegacion -->
    <header id="header">
    <nav class="menu">
    <div class="logo-box">
       <h1><a href="index.php">Vid19-<?php echo $role?></a></h1>
       <span class="btn-menu"><em class="fas fa-bars"></em></span> <!-- Icono de barra de menu -->
     </div>
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">  -->
                <img class="img-profile rounded-circle" src= <?php echo $photo?> height="50" alt="img-profile rounded-circle"> 
     </a> 
     <div class="list-container">
        <ul class="lists">
            <li><a href="index.php" class="activo"><?php echo $user?></a></li>
            <li><a href="recomendaciones.php">Recomendaciones</a></li>
            <li><a href="locales.php">Buscar centros de oxígeno</a></li>
            <li><a href="misCitas.php">Mis citas</a></li>
            <li><a href="misRecetas.php">Mis recetas</a></li>
            <li><a href="../php/cerrar_login_usuario.php">Cerrar sesion</a></li>
        </ul>
     </div>
    </nav>
    <!-- Imagen Header -->
    <div class="img-header">
      <div class="texto-info"> 
        <div class="map-oxigeno">  
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1gF2RY8n5StvqMhBo-AfYFqUag4RvkwLv" width=100% height="740" title="Centros de Oxígeno"></iframe>
        </div>
      </div>     
        
    </div>
    </header>

    <!--  -->
    
    
    <main>

    <!-- footer -->
        <div class="footer-text">
        <p>&copy; Vid19 - 2021 | Todos los derechos reservados.</p>
        </div>
    </main>


            <script src="../js/script.js"></script>
            <script src="../js/app.js"></script>
    </body>
</html>