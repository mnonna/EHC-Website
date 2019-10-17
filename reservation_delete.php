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

$connection = mysqli_connect($host, $db_user, $db_password, $db_name);

if($connection){
    if(isset($_POST['rid']) && isset($_POST['rlabel'])){
        $resID = $_POST['rid'];
        $label = $_POST['rlabel'];

        $deleteRes = mysqli_query($connection,"DELETE FROM reservation WHERE reservation.resID = '$resID';");
    
        if($deleteRes){
            echo "Usunięto rezerwację o id= "."$resID";
        }
        else{
            echo "Błąd podczas usuwania";
        }

        $setRoomState = mysqli_query($connection,"CALL procedureSetValidRoomState('$label');");

        if($setRoomState){
            echo "Przeprowadzono nadzór stanu pokoju "."$label";
        }
        else{
            echo "Błąd podczas nadzoru";
        }
    }
}
else
{
    echo "Error: ".$connection->connect_errno;
}


?>