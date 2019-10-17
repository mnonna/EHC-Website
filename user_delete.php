<?php
session_start();
require_once "connect.php";

if(!(isset($_SESSION['logged'])))
{
    header('Location: log_in_form.php');
    exit();
}

if($_SESSION['permission']!=1)
{
    $_SESSION['user_delete_perm_error'] = '<span style="color:red"> You don\'t have permissions to delete users ! </span>';
    header("Location: staff.php");
    exit();
}

if($_SESSION['id']==$_POST['uid']){
    $_SESSION['user_self_delete_error'] = '<span style="color:red"> You can\'t delete yourself ! </span>';
    header("Location: staff.php");
    exit();
}

$connection = @new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno != 0)
{
    echo "Error: ".$connection->connect_errno;
}
else{

    if(isset($_POST['user_delete'])){
    
    $id = $_POST['uid'];
    
    $sql = "DELETE FROM users WHERE userID='$id'";
    
        if(mysqli_query($connection, $sql))
        {
            echo "User deleted";
        }
        else{
            echo "error";
        }
    }
    mysqli_close($connection);
    
    header("Location: staff.php");

}