<?php
 
include('config.php');
//session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = md5($_POST['password']);
 
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo'
        <script>
            alert("Correo ya registrado");
            window.location = "../login.php";
        </script>  
    ';
    exit();
    }

    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo'
        <script>
            alert("usuario ya registrado");
            window.location = "../login.php";
        </script>  
    ';
    exit();
    }

 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,email,password) VALUES (:username,:email,:password_hash)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '
            <script>
                alert("usuario registrado");
                window.location = "../login.php";
            </script>    
        ';
        } else {
            echo '
            <script>
                alert("Intentalo de nuevo, usuario no registrado");
                window.location = "../login.php";
            </script>    
        ';
        }
    }
}
 
?>