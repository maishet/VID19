<?php

session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
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

        <link rel="stylesheet" href="../css/styles.css"> <!-- LO PUEDES CAMBIAR A "../css/styles.css" -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>

    <body>
    <!-- Menu de Navegacion -->
    <header id="header">
        <nav class="menu">
            <div class="logo-box">
                <h1><a href="index.php" style="font-size: 30px;">Vid19- <?php echo $role?> </a></h1>
                <span class="btn-menu"><em class="fas fa-bars"></em></span>
                <!-- Icono de barra de menu -->
            </div>
            <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">  -->
                <img class="rounded-circle" src= <?php echo $photo?> height="50" alt="img-user">
            </a>

            <div class="list-container">
                <ul class="lists">
                    <li><a href="index.php" class="activo">Doctor(a) <?php echo $user?></a></li>
                    <li><a href="darReceta.php">Dar receta</a></li>
                    <li><a href="../php/cerrar_login_usuario.php">Cerrar sesion</a></li>
                </ul>
            </div>
        </nav>
        <!-- Imagen Header -->

    </header>

    <?php
        include('../php/config.php');
        $consulta = "SELECT * FROM receta";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        $consult = "SELECT id, username, email, password, role FROM users";
        $result = $connection->prepare($consult);
        $result->execute();
        $data1=$result->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!--  -->
    <br> <br>
    <br> <br>
    <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                <p></p>
                    <h1>Subir archivo de receta médica</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Nuevo
                    </button>

                    <table class="table mt-2">
                        <caption>Recetas Médicas</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $val) { ?>
                                <tr>
                                    <td><?php echo $val['id'] ?> </td>
                                    <td><?php echo $val['title'] ?></td>
                                    <td><?php echo $val['meet'] ?></td>
                                    <td>
                                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver archivo modal</button>
                                        <a class="btn btn-primary" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/VID19/doctor/' . $val['url']; ?>" >Ver archivo en página</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <br> <br>

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <br> <br>
            <br> <br>
                <div class="modal-content">
                    <div class="modal-header">
                    <br> <br>
                        <h5 class="modal-title" id="exampleModalLabel"><br> <br> Nueva receta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="form1">
                            <div class="form-group">
                                <label for="title">Paciente</label>
                                <select class="form-control" name="title" required>
                                <?php
                                    //if($data['role'] == "doctor")                            
                                        foreach($data1 as $data) {
                                            if($data['role'] == "paciente"){                                                    
                                ?>
                                <option><?php echo $data['username'] ?></option>
                                    <?php
                                            }                            
                                        }
                                    ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="description">Archivo PDF</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="onSubmitForm()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <br> <br>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver receta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px" title="iframePDF"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
                            function onSubmitForm() {
                                var frm = document.getElementById('form1');
                                var data = new FormData(frm);
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4) {
                                        var msg = xhttp.responseText;
                                        if (msg == 'exitoso') {
                                            alert(msg);
                                            $('#exampleModal').modal('hide')
                                        } else {
                                            alert(msg);
                                        }

                                    }
                                };
                                xhttp.open("POST", "upload.php", true);
                                xhttp.send(data);
                                $('#form1').trigger('reset');
                            }
                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/VID19/doctor/'; ?>'+url);
                            }
        </script>
    <!--  -->
    <main>
        <div class="footer-text">
        <p>&copy; Vid 19 - 2021 | Todos los derechos reservados.</p>
        </div>
    </main>

    </body>
</html>