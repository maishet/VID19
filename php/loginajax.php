<?php 
  
    include('config.php');
    session_start();

    $username = (isset($_POST['userinicio'])) ? $_POST['userinicio'] : '';
    $password = (isset($_POST['passinicio'])) ? $_POST['passinicio'] : '';

    $pass = md5($password);

    $query = $connection->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->bindParam("password", $pass, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo 'null';
        $_SESSION['user_id'] = null;
        exit();
    }else {     
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user'] = $result['username'];
            $_SESSION['user_email'] = $result['email'];
            $_SESSION['user_rol'] = $result['role'];           //tipo de usuario
            $_SESSION['photo'] = $result['photo'];


            if($_SESSION['user_rol'] == "paciente")
                echo 'paciente';
            if($_SESSION['user_rol'] == "doctor")
                echo 'medico';  
            if($_SESSION['user_rol'] == "admin")
                echo 'admin';
            exit();

    }

    //print json_encode($res);
    exit();

?>