<?php
    require 'connect.php';

    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);

        $floor = $_POST['floor'];
        $label = $_POST['label'];
        $dayPrice = $_POST['price'];
        $cap = $_POST['cap'];
        $desc = $_POST['desc'];


        $sql = mysqli_query($connection,"CALL procedureAddRoom('$floor','$label','$dayPrice','$desc','$cap');");
        
        if($sql){
            echo "Success";
            mysqli_close($connection);
        }
        else{
            echo "Error";
            mysqli_close($connection);
        }
?>