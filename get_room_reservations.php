<?php
    require 'connect.php';
    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);

    if(isset($_POST['request'])){
        $roomLabel = $_POST['request'];

        $result = mysqli_query($connection,"SELECT clientID,clientName,clientSurname,clientEmail,
        roomLabel,totalPrice,reservationStart,reservationEnd,reservationStatus,advanceStatus FROM clientsandreservations WHERE roomLabel='".$roomLabel."';");

        $output = "";

        $resStatus = 0;

        while($row=mysqli_fetch_assoc($result)){
            $resStatus = $row['reservationStatus'];
            
            $output .= "<tr>
              <td>".$row['roomLabel']."</td>
              <td>".$row['clientName']."</td>
              <td>".$row['clientSurname']."</td>
              <td>".$row['reservationStart']."</td>
              <td>".$row['reservationEnd']."</td>
              <td>".$row['reservationStatus']."</td>
              <td>".$resStatus."</td>
              <td><form class='delete_r_form' method='POST' action='reservation_delete.php'><input type='hidden' name='uid' value='+id+'>
              <button type='submit' name='user_delete' class='far fa-trash-alt' id='user_delete'></button></form></td>
            </tr>";
        }

        echo $output;
        mysqli_close($connection);
    }

    else{
        mysqli_close($connection);
    }
?>