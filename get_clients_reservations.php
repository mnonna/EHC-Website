<?php
    require 'connect.php';
    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);

    if(isset($_POST['request'])){
        $clientID = $_POST['request'];

        $result = mysqli_query($connection,"SELECT clientID,clientName,clientSurname,clientEmail,
        roomLabel,totalPrice,reservationID,reservationStart,reservationEnd,reservationStatus,advanceStatus FROM clientsandreservations WHERE clientID='".$clientID."';");

        $output = "";

        $resStatus = 0;

        while($row=mysqli_fetch_assoc($result)){
            $resStatus = $row['reservationStatus'];
            
            $output .= "<tr>
              <td>".$row['clientName']."</td>
              <td>".$row['clientSurname']."</td>
              <td>".$row['roomLabel']."</td>
              <td>".$row['reservationStart']."</td>
              <td>".$row['reservationEnd']."</td>
              <td>".$row['reservationStatus']."</td>
              <td>".$resStatus."</td>
              <td><form class='delete_r_form' method='POST' action='reservation_delete.php'><input type='hidden' name='rlabel' value=".$row['roomLabel']."><input type='hidden' name='rid' value=".$row['reservationID'].">
              <button type='submit' name='res_delete' class='far fa-trash-alt'></button></form></td>
            </tr>";
        }

        echo $output;
        mysqli_close($connection);
    }

    else{
        mysqli_close($connection);
    }
?>