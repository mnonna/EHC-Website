<?php
    session_start();
    
    $_SESSION['startDate'] = $_POST['startDate'];
    $_SESSION['endDate'] = $_POST['endDate'];
    
    require 'connect.php';
    
    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
    
    if(isset($_POST['action'])){
        
        $sql = "SELECT room.label,room.dayPrice,room.capacity FROM room WHERE roomStatus=0 "; 
        
        if(isset($_POST['floor'])){
            $floor = implode("','", $_POST['floor']);
            $sql = "SELECT room.label,room.dayPrice,room.capacity FROM room WHERE floorNumber IN ('".$floor."') ";
        }
        
        if(!empty($_POST['startDate']) && !empty($_POST['endDate'])){
            $start = $_POST['startDate'];
            $end = $_POST['endDate'];
            
            $sql .= "AND room.roomID NOT IN (SELECT reservation.fk_roomID FROM reservation
                    WHERE (reservation.reservationStart < '".$start."' AND reservation.reservationEnd >= '".$end."') 
                    OR (reservation.reservationStart <= '".$start."' AND reservation.reservationEnd > '".$start."') 
                    OR (reservation.reservationStart >= '".$start."' AND reservation.reservationEnd <= '".$end."'));";
        }
        
        $result = mysqli_query($connection,$sql);
        $output = '';
    }
    
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $output .= "<div class='col-sm-10 col-lg-12 room-post' id='post_id'><img src='img/room.jpg' alt='' class='room-slider-image'>";
                $output .= "<div class='col-sm-12 mx-auto room-post-text' id='text_id'>";
                $output .= "<form class='select_room_form_data' action='reservation_newclient.php' method='POST'>";
                $output .= "<div style='background-color: #9900cc; margin-top: 15px; border-radius: 5px 5px 5px 5px'>";
                $output .= "<div class='form-group'>";
                $output .= "<h5 style='text-align: center; padding-top: 2px'><label>Numer pokoju: <span class='badge badge-success'>".$row['label']."</span><input type='hidden' name='r_label' value='".$row['label']."' readonly></label></h5>";
                $output .= "</div>";
                $output .= "<div class='form-group'>";
                $output .= "<label>Cena: ".$row['dayPrice']." zł<input type='hidden' name='r_dayprice' value='".$row['dayPrice']."' readonly></label>";
                $output .= "</div>";
                $output .= "<div class='form-group'>";
                $output .= "<label>Liczba osób: ".$row['capacity']."<input type='hidden' name='r_capacity' class='cap' value='".$row['capacity']."' readonly></label><br>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "<button type='submit' name='".$row['capacity']."' class='orderRoom w3-btn w3-blue w3-medium btn-block' value='".$row['label']."' style='margin-top:2px; border-radius: 5px 5px 5px 5px'>Zamów</button>";
                $output .= "</form>";
                $output .= "</div>";
                $output .= "</div>";
            }
        }
        
        else{
            $output = "<h3>Nie znaleziono pokoju</h3>";
        }
        
        echo $output;
    
?>