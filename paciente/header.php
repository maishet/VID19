
    <header id="header">
        <nav class="menu">
            <div class="logo-box">
                <h1><a href="index.php" style="font-size: 30px;">Vid19- <?php echo $role?> </a></h1>
                <span class="btn-menu"><em class="fas fa-bars"></em></span>
                <!-- Icono de barra de menu -->
            </div>
            <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">  -->
                <img class="rounded-circle" src= <?php echo $photo?> height="50" alt="img-mujer">
            </a>

            <div class="list-container">
                <ul class="lists">
                    <li>
                        <a href="index.php" class="activo">
                            <?php echo $user?>
                        </a>
                    </li>
                    <li><a href="recomendaciones.php">Recomendaciones</a></li>
                    <li><a href="locales.php">Buscar centros de oxígeno</a></li>
                    <li><a href="misCitas.php">Mis citas</a></li>
                    <li><a href="misRecetas.php">Mis recetas</a></li>
                    <li><a href="../php/cerrar_login_usuario.php">Cerrar sesion</a></li>
                </ul>
            </div>
        </nav>
        <!-- Imagen Header -->

    </header>

