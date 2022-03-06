<?php
    
    //if(!session_start()){
        //header('Location: login.html');
        //exit;
    //}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>VID-19 | Registrarse</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/stile-login.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/pestana.png">
    <!-- <link rel="icon" href="images/fevicon.png" type="image/gif" /> -->
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
    <!-- Menu de Navegacion -->
    <div class="header_section header_login">

        <?php include 'header.html'; ?>

        <!-- banner section start -->
        <div class="container">
            <div class="about_taital_main">
                <h2 class="about_tag">Registro e Inicio de Sesión</h2>
                <div class="about_menu">
                    <ul>
                        <li><a href="index.html">Inicio</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- banner section end -->
    </div>
        
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

            <!--Formulario de Login y registro action="php/login_u.php" -->
            <div class="contenedor__login-register">
                <!--Login-->
                <form id="iniciosesionlg" method="POST" name="signup-form" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input id="userinicio" type="text" placeholder="Usuario" name = "username">
                    <input id="passinicio" type="password" placeholder="Contraseña" name = "password">
                    <button type="submit" name="login" value="login">Entrar</button>
                </form>

                <!--Register-->
                <form id="registrolg" method="POST" action="php/register.php" name="signin-form" class="formulario__register">
                    <h2>Regístrate</h2>
                    <input id="userregistro" type="text" placeholder="Usuario" name = "username" required>
                    <input id="emailregistro" type="text" placeholder="Correo Electronico" name = "email" required>
                    <input id="passregistro" type="password" placeholder="Contraseña" name = "password" required>
                    <button type="submit" name="register" value="register">Registrarse</button>
                </form>
            </div>
        </div>
    </main>


    <?php include 'footer.html'; ?>
    <script src="js/script.js"></script>
    <script src="js/loginajax.js"></script>
</body>
</html>