<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
    //$account = $query->fetch(PDO::FETCH_OBJ);
 
    if (!$result) {
        echo'
        <script>
            alert("Usuario no existe");
            window.location = "../login.php";
        </script>  
    ';
    exit();
    } else {
        if (md5($password) == $result['password']){    //verifica en la base de datosif (password_verify($_POST['password'], $account->password))
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user'] = $result['username'];
            $_SESSION['user_email'] = $result['email'];
            $_SESSION['user_rol'] = $result['role'];           //tipo de usuario
            $_SESSION['photo'] = $result['photo'];

            //$this->response["status"] = true;

            if($_SESSION['user_rol'] == "paciente")
                header("location: ../paciente/index.php");
            if($_SESSION['user_rol'] == "doctor")
                header("location: ../doctor/index.php");    
            if($_SESSION['user_rol'] == "admin")
                header("location: ../dashboard/index.php");

            //header("location: ../package/index.php");
            exit();
            //echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            ////////////////////////////////////////

            //////////////////////////////////////////////    
            //echo '<p class="error">Username password combination is wrong!</p>';
            echo'
            <script>
                alert("verifique los datos");
                window.location = "../login.php";
            </script>  
            ';
            exit();
        }
    }
}
 
?>