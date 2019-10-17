<?php

session_start();

if ((!isset($_POST['u_email'])) || (!isset($_POST['u_pass'])))
{
    header('Location: log_in_form.php');
    exit();
}

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $login = mysqli_real_escape_string($polaczenie,$_POST['u_email']);
    $haslo = mysqli_real_escape_string($polaczenie,$_POST['u_pass']);
    
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    
    if ($rezultat = @$polaczenie->query(sprintf("SELECT * FROM users WHERE userName='$login'")))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
            //$_SESSION['logged'] = true;
            $wiersz = $rezultat->fetch_assoc();
            $_SESSION['id'] = $wiersz['userID'];
            $_SESSION['user'] = $wiersz['userName'];
            $_SESSION['email'] = $wiersz['userEmail'];
            $_SESSION['permission'] = $wiersz['permissionGiven'];
        
            echo $haslo."</br>";
            
            $hash_512 = hash('sha512', $_POST['u_pass']);
            
            echo $hash_512."</br>";
            
            $row_hashed_password = $wiersz['password'];
            
            
            if($hash_512 == $row_hashed_password){
                if($wiersz['isConfirmed']==0){
                    $_SESSION['notConfirmed'] = '<span style="color:white">Please verify your account !</span>';
                    header('Location: log_in_form.php');
                    exit();
                }

                else{
                    $_SESSION['logged'] = true;
                    unset($_SESSION['error']);
                    unset($_SESSION['wrong_password']);
                    $rezultat->free_result();
                    header('Location: index.php'); //znaleziono u�ytkownika - przejd� do strony g��wnej serwisu (powitalnej)
                    exit();
                }
            }
            else{
                $_SESSION['wrong_password']='<span style="color:white">Wrong password !</span>';
                header('Location: log_in_form.php');
            }
            
        } 
        else {
            //echo  $ilu_userow;
            $_SESSION['error'] = '<span style="color:white">Following data are invalid. Please log in again!</span>';
            header('Location: log_in_form.php');    //nie znaleziono u�ytkownika - zosta� w formularzu i wyswietl komunikat
            
        }
        
    }
    
    $polaczenie->close();
}

?>