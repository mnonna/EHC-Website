<?php
    session_start();
    define('TIMEZONE', 'Europe/Warsaw');
    
    require 'connect.php';

    if(isset($_POST['action']))
    {    
        if(isset($_POST['roomLabel'])){
        $rLabel = $_POST['roomLabel'];
        echo $rLabel;
        }
        
        $id = $_SESSION['id'];
    
        $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
        $get_staff_mail = mysqli_query($connection, "SELECT userEmail FROM users WHERE userID = '$id';");
        
        if($get_staff_mail){
            while ($row = $get_staff_mail->fetch_assoc()){
                $curStaffEmail = $row['userEmail'];
            }
        }
        
        $sql = mysqli_query($connection,"CALL updateRoomLastCleaning('$rLabel','$curStaffEmail')");
        
        if($sql){
            $success = "Room $rLabel cleaned !";
            echo $success;
        }
    
    mysqli_close($connection);
       
    }

?>