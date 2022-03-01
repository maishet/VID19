<?php
include('../php/config.php');
session_start();

//if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$sintomas = $_POST['symptoms'];
	$fecha = $_POST['datepicker1'];
	$fecha = date('m-d-Y', strtotime($fecha));
	$oxigeno = $_POST['saturacion'];
	$doctor = $_POST['doctor'];
	$hora = $_POST['time'];

	$query = $connection->prepare("SELECT * FROM files WHERE fecha=:fecha");
	$query->bindParam("fecha", $fecha, PDO::PARAM_STR);
	$query->execute();

	if ($query->rowCount() > 0) {
		echo'
		<script>
			alert("Fecha ya registrada elige otro dia");
			window.location = "index.php";
		</script>  
	';
	exit();
	}

	$query = $connection->prepare("SELECT * FROM files WHERE hora=:hora");
	$query->bindParam("hora", $hora, PDO::PARAM_STR);
	$query->execute();

	if ($query->rowCount() > 0) {
		echo'
		<script>
			alert("Hora ya escogida, elige otra");
			window.location = "index.php";
		</script>  
	';
	exit();
	}

	if ($query->rowCount() == 0) {
		$query = $connection->prepare("INSERT INTO files(paciente,number,email,sintomas,saturacion,doctor,fecha,hora) 
										VALUES (:name,:number,:email,:sintomas,:oxigeno,:doctor,:fecha,:hora)");
		$query->bindParam("name", $name, PDO::PARAM_STR);
		$query->bindParam("number", $number, PDO::PARAM_STR);
		$query->bindParam("email", $email, PDO::PARAM_STR);
		$query->bindParam("sintomas", $sintomas, PDO::PARAM_STR);
		$query->bindParam("oxigeno", $oxigeno, PDO::PARAM_STR);
		$query->bindParam("doctor", $doctor, PDO::PARAM_STR);
		$query->bindParam("fecha", $fecha, PDO::PARAM_STR);
		$query->bindParam("hora", $hora, PDO::PARAM_STR);
		$result = $query->execute();

		if($result){
			?>
			<div class='col-md-12' style="color:green">
					Bien hecho! la cita médica ha sido realiza correctamente.
			</div>
			<?php
		}else{
			?>
			<div class='col-md-12' style="color:red">
				Error no se pudo realizar la cita médica.
			</div>	
			<?php
		}
	}
//}	
?>