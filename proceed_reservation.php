<?php 
    require 'connect.php';

    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
    
    if(isset($_POST['accountName']) && isset($_POST['personsNumber']) && isset($_POST['advancePrice']) && isset($_POST['typedPassword'])){
        $uName = $_POST['accountName'];
        $pass = $_POST['typedPassword'];
        $advanceValue = $_POST['advancePrice'];
        $peopleAmmount = $_POST['personsNumber'];
        $resStart = $_POST['begin'];
        $resEnd = $_POST['end'];
        $roomLabel = $_POST['roomNumber'];
        $hashed = hash('sha512', $pass);
        $statusMessage = "";
        
        $sql = mysqli_query($connection,"SELECT *FROM users WHERE userName = '$uName';");

        if($sql && $sql->num_rows > 0)
        {
            $row = $sql->fetch_assoc();
            $dbUser = $row['userName'];
            $dbPass = $row['password'];

            if(($hashed == $dbPass) && ($uName == $dbUser))
            {
                $takeClientsPesel = mysqli_query($connection,"SELECT *FROM clients WHERE e_mail = '$uName';");
                $row = $takeClientsPesel->fetch_assoc();
                $clientPesel = $row['clientPESEL'];

                $reserve = mysqli_query($connection,"INSERT INTO reservation (fk_clientID,fk_roomID,reservation.reservationStatus,reservation.reservationStart,reservationEnd,advanceValue,advanceStatus,peopleAmmount)
                VALUES ((SELECT clients.clientID FROM clients WHERE clients.clientPESEL='$clientPesel'),(SELECT room.roomID FROM room WHERE room.label='$roomLabel'),0 ,'$resStart',
                '$resEnd','$advanceValue',0,'$peopleAmmount');");

                if($reserve){
                    $statusMessage = "<span style='color: red; text-align: center'>Dodanie rezerwacji zakończone sukcesem !</span>";
                    mysqli_close($connection);
                }
                else{
                    $statusMessage = "<span style='color: red; text-align: center'>Dodanie rezerwacji zakończone niepowodzeniem !</span>";
                    mysqli_close($connection);
                }
            }
            else{
                $statusMessage = "<span style='color: red; text-align: center'>Podałeś błędne dane, sprawdź ponownie !</span>";
                mysqli_close($connection);
            }
        }
        else{
            $statusMessage = "<span style='color: red; text-align: center'>Błąd podczas pobierania danych ! Prawdopodobnie podałeś złą nazwę konta.</span>";
            mysqli_close($connection);
        }
    }
    echo $statusMessage;
?>