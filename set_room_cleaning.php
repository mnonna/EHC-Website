<?php
    require 'connect.php';

    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
    $sql = mysqli_query($connection,"UPDATE room SET isCleaningNeeded = 1;");
    
    
    if($sql)
    {
        mysqli_close($connection);
        header("Location: rooms_show.php");
    }
    else{
        mysqli_close($connection);
        $_SESSION['room_cl_update_error']='<span style="color:white">Room update failed !</span>';
        header("Location: rooms_show.php");
    }
    
?>