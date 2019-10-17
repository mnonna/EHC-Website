<?php
    require 'connect.php';

    if(!isset($_GET['token']) && !isset($_GET['email'])){
        header('Location: log_in_form.php');
        $_SESSION['verify_error'] = '<span style="color:white">Cannot get data</span>';
        exit();
    }
    else{
        $connection = mysqli_connect($host, $db_user, $db_password, $db_name);

        $token = $_GET['token'];
        $email = $_GET['email'];

        print_r($token);
        print_r($email);

        $checkUser = "SELECT userID FROM users WHERE userName='$email' AND userToken='$token' AND isConfirmed=0;";
        $checkIfUserConfirmed = "SELECT userID FROM users WHERE userName='$email' AND userToken='$token' AND isConfirmed=1;";

        if(mysqli_query($connection,$checkUser)->num_rows > 0){
            $update = mysqli_query($connection,"UPDATE users SET isConfirmed=1, userToken='' WHERE userName='$email';");

            if(mysqli_query($connection,$update)){
                $_SESSION['verify_ok'] = '<span style="color:white">Account has been verified, you can now log in !</span>';
                mysqli_close($connection);
                header('Location: log_in_form.php');
            }
            else{
                mysqli_close($connection);
                header('Location: log_in_form.php');
            }
        }
        else if(mysqli_query($connection,$checkIfUserConfirmed)->num_rows > 0){
            $_SESSION['verify_ok'] = '<span style="color:white">Account has been already verified, you can now log in !</span>';
            mysqli_close($connection);
            header('Location: log_in_form.php');
        }
    }
?>