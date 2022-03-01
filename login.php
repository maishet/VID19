<?php
    
    //if(!session_start()){
        //header('Location: login.html');
        //exit;
    //}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vid 19 | Registrarse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="img/pestana.png"> <!-- imagen q sale en la pestaña -->

    
    <link rel="stylesheet" href="css/stile-login.css">

    <link rel="stylesheet" href="css/default.css">
    

</head>
<body>
    <!-- Menu de Navegacion -->
    <header id="header">
    <nav class="menu">
     <div class="logo-box">
       <h1><a href="index.html">VID 19 </a></h1>
       <span class="btn-menu"><em class="fas fa-bars"></em></span> <!-- Icono de barra de menu -->
     </div>
     
     <div class="list-container">
        <ul class="lists">
            <li><a href="index.html" class="activo">Inicio</a></li>
            <li><a href="nosotros.html">Nosotros</a></li>
            <li><a href="preguntas frecuentes.html">Preguntas Frecuentes</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
        </ul>
     </div>
    </nav>
    </header>
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form method="POST" action="php/login_u.php" name="signup-form" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Usuario" name = "username" required> 
                        <input type="password" placeholder="Contraseña" name = "password" required>
                        <button type="submit" name="login" value="login">Entrar</button>
                    </form>

                    <!--Register-->
                    <form method="POST" action="php/register.php" name="signin-form" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Usuario" name = "username" required>
                        <input type="text" placeholder="Correo Electronico" name = "email" required>
                        <input type="password" placeholder="Contraseña" name = "password" required>
                        <button type="submit" name="register" value="register">Registrarse</button>
                    </form>
                </div>
            </div>

        </main>


        <script src="js/script.js"></script>
</body>
</html>