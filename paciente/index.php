<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
    exit;
} else {
    // Show users the page!
    $user = $_SESSION['user'];
    $role = $_SESSION['user_rol'];
    $email = $_SESSION['user_email'];
    $photo = $_SESSION['photo'];
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>vid 19 - <?php echo $role?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="../img/pestana.png"> <!-- imagen q sale en la pestaña -->

        <link rel="stylesheet" href="../css/default.css"> <!-- LO PUEDES CAMBIAR A "../css/styles.css" -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


        <!--form de cita  -->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!--fonts--> 
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<!--//fonts--> 
        <!--//fonts--> 

    </head>
    <body>
    <!-- header -->
    <?php include 'header.php'; ?>

    <!-- CITASSSSSSSSSSSSSSSSSSSSSSSSS -->

    <?php
        include_once '../php/config.php';
        //$objeto = new Conexion();
        //$conexion = $objeto->Conectar();

        $consulta = "SELECT id, username, email, password, role FROM users";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h1>Reserva de cita médica </h1>
    <div class="bg-agile">
	<div class="book-appointment">
	<h2>Hacer una cita</h2>
				
			<form action="registrarCita.php" method="post" name="appointment" id="appointment">
			<div id="resultados_ajax" class="gaps"></div>
			<div class="left-agileits-w3layouts same">
			
			<div class="gaps">
				<p>Usuario</p>
					<input type="text" name="name" placeholder="" value="<?php echo $user?>" required=""/>
			</div>	
				<div class="gaps">	
				<p>Número de teléfono</p>
					<input type="text" name="number" placeholder="xxx-xxx-xxx" required=""/>
				</div>
				<div class="gaps">
				<p>Correo</p>
						<input type="email" name="email" placeholder="" value="<?php echo $email?>" required="" />
				</div>	
				<div class="gaps">
				<p>Enlace meet</p>
						<input type="text" name="symptoms" placeholder="" required="" >
				</div>
			</div>
			<div class="right-agileinfo same">
			<div class="gaps">
				<p>Seleccionar fecha</p>		
						<input  id="datepicker1" name="datepicker1" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
			</div>
			<div class="gaps">
				<p>Saturación de oxígeno</p>	
					<input name="saturacion" type="number" min="90" max="100" step="0.5" value=95>
			</div>
			<div class="gaps">
				<p>Seleccione el Doctor</p>	
					<select class="form-control" name="doctor" required>
                        <?php
                            //if($data['role'] == "doctor")                            
                                foreach($data as $dat) {
                                    if($dat['role'] == "doctor"){                                                    
                        ?>
						<option>Doctor(a) <?php echo $dat['username'] ?></option>
                            <?php
                                    }                            
                                }
                            ?>
					</select>
			</div>
			<div class="gaps">
				<p>Hora</p>		
					<input type="text" id="timepicker" name="time" class="timepicker form-control" value="">	
			</div>
			</div>
			<div class="clear"></div>
						  <input type="submit" value="Realizar cita">
			</form>
		</div>
   </div>
   <!--copyright-->
			<div class="copy w3ls">
		       <p>&copy; Vid19 - 2021 | Todos los derechos reservados.</p>
	        </div>
		<!--//copyright-->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
						  
				  </script>
			<!-- //Calendar -->
			<script>
				$( "#appointment" ).submit(function( event ) {
				  var parametros = $(this).serialize();
				  $.ajax({
						type: "POST",
						url: "registrarCita.php",
						data: parametros,
						 beforeSend: function(objeto){
							$("#resultados_ajax").html("Enviando...");
						  },
						success: function(datos){
							$("#resultados_ajax").html(datos);
						}
				});
			
				  event.preventDefault();
				});
			</script>	


            <!-- <script src="../js/script.js"></script> -->
            <!-- <script src="../js/app.js"></script> -->

        <?php
            include 'botwsp.html';
        ?>
    </body>

</html>