<?php 
    require 'connect.php';

    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);

        $pass = $_POST['newpass'];
        $hashed = hash('sha512', $pass);
        $uName = $_GET['account'];

        echo $pass;
        echo $hashed;
        echo $uName;

        $sql = mysqli_query($connection,"UPDATE users SET password = '$hashed' WHERE userName = '$uName';");

        if($sql){
            echo "Change password successfull !";
        }
        else{
            echo "Error";
        }

?>