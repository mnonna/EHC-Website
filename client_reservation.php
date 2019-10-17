<?php
    session_start();
    require 'connect.php';
    require 'E:\xampp\htdocs\ehc\php-mailer-master\PHPMailerAutoload.php';
    
    $roomLabel = $_SESSION['label'];
    $clientPesel = $_POST['res_c_pesel'];
    $resStart = $_SESSION['startDate'];
    $resEnd = $_SESSION['endDate'];
    $advanceValue = $_POST['res_c_advance'];
    $peopleAmmount = $_POST['people_number'];
    
    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
    $reservation_check_query = "SELECT room.label,room.roomID FROM room WHERE room.label = '".$roomLabel."' AND room.roomID IN (SELECT reservation.fk_roomID FROM reservation
                    WHERE (reservation.reservationStart < '".$resStart."' AND reservation.reservationEnd >= '".$resEnd."') 
                    OR (reservation.reservationStart <= '".$resStart."' AND reservation.reservationEnd > '".$resStart."') 
                    OR (reservation.reservationStart >= '".$resStart."' AND reservation.reservationEnd <= '".$resEnd."'));";
    
    if(mysqli_query($connection,$reservation_check_query)->num_rows > 0){
        $message = "Rezerwacja na pokój '$roomLabel' na okres od '$resStart' do '$resEnd' widnieje w bazie. Prosimy o powrót na stronę główną serwisu.";
        mysqli_close($connection);
    }
    
    else{
        $clientCheckQuery = "SELECT clientID FROM clients WHERE clientPESEL = '$clientPesel';";
        
        if(mysqli_query($connection, $clientCheckQuery)->num_rows > 0){
            $message = " Klient rezerwujący widnieje w bazie";
        }
        else{
            $clientName = $_POST['res_c_name'];
            $clientSurname = $_POST['res_c_surname'];
            $clientEmail = $_POST['res_c_email'];
            $clientPhNumber = $_POST['res_c_phnumber'];
            $clientStreet = $_POST['res_c_street'];
            $clientAddress = $_POST['res_c_address'];
            $clientPostal = $_POST['res_c_postal'];
            $clientCity = $_POST['res_c_city'];
            $clientPesel = $_POST['res_c_pesel'];
            $clientIdNum = $_POST['res_c_idcard'];
            
            $clientAddQuery = "INSERT INTO clients (clientName,clientSurname,e_mail,phoneNumber,clientRegistrationTime,street,address,postalCode,city,clientPESEL,idCardNumber)
                               VALUES ('$clientName', '$clientSurname', '$clientEmail', '$clientPhNumber', NOW(),'$clientStreet','$clientAddress','$clientPostal','$clientCity','$clientPesel','$clientIdNum');"; 
        
            if(mysqli_query($connection,$clientAddQuery)){
                $message = " Klient dodany pomyslnie.";
            }

            $randPass = bin2hex(random_bytes(7));
            $randPassHashed = hash('sha512',$randPass);
            $str=rand();
            $token = hash('md5',$str);

            $sql_query="INSERT INTO users (userName,password,permissionGiven,userToken,isConfirmed) VALUES ('$clientEmail','$randPassHashed',6,'$token',0);";

            if(mysqli_query($connection,$sql_query)){
                $clientUserAccMsg = "Konto klienta utworzone pomyślnie !";
            
                $mail = new PHPMailer;
            
                $to = "$clientEmail";
                
                //$mail->SMTPDebug = 4;                               // Enable verbose debug output
                
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'mncsgo19@gmail.com';                 // SMTP username
                $mail->Password = 'marcin4455';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                
                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                );

                $mail->setFrom('mncsgo19@gmail.com', 'EHC Company');
                $mail->addAddress($to);     // Add a recipient
                $mail->AddEmbeddedImage('img\ehc_logo.jpg', 'logo_2u');
                $mail->isHTML(true);                                  // Set email format to HTML
                
                $hash_perm = hash('md5', 6);
                
                $mail->Subject = 'EHC Registration';
                $mail->Body    = '<body style="font-family: Arial, Helvetica, sans-serif; background-image: url("https://www.fitinteriors.com/en/wp-content/uploads/2015/07/one_training_01.jpg"); height: 1080px; background-position: center; background-repeat: no-repeat; background-size: cover;">
                <header style="background: #ffff80; display: table;  clear: both; width: 100%; border-radius: 0 0 5px 5px">
                    <div class="top_nav_bar" style="width: inherit; margin: 0 auto;">
                        <img src="cid:logo_2u" alt="Lights" class="logo" height="100" width="200" style="float: left; padding: 15px">
                    </div>
                </header>
                
                <div class="message-container" style="height: 60%; width: 70%; position: absolute; background-color: whitesmoke; margin-left: 15%; margin-top: 5%; text-align: center; border-radius: 5px 5px 5px 5px">
                    <h2>WELCOME IN EHC SYSTEM !</h2>
                    <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center">In order to make your account active, please follow the link below</h3>
                    <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center">Your temporary login is: '.$clientEmail.' and password is: '.$randPass.' you can change it anytime you want it to.</h3>
                    <p style="text-align: center"><a href="http://localhost/ehc/regCl_confirm.php?email='.$clientEmail.'&token='.$token.'&'.$hash_perm.'">http://localhost/ehc/regCl_confirm.php?email='.$clientEmail.'&token='.$token.'&'.$hash_perm.'</a></p>
                    <img src="cid:logo_2u" height="250" width="250">
        
                    <div class="footer" style="position: relative; left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%)">
                        <h3 style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center">All rights reserved &copy tITan 2019</h3>
                    </div>
                </div>
                </body>';
                
                    if($mail->send()){
                        $_SESSION['mail_send'] = '<span style="color:white"> Check your mailbox ! </span>';
                    }
                    else {
                        $error =  $mail->ErrorInfo;
                        $_SESSION['mail_error'] = '<span style="color:white"> '.$error.' Error while sending email ! </span>';
                    }
            }
            else{
                $clientUserAccMsg = "Podczas tworzenia konta klienta wystąpił błąd !";
            }
        }
        
        $sql_query="INSERT INTO reservation (fk_clientID,fk_roomID,reservation.reservationStatus,reservation.reservationStart,reservationEnd,advanceValue,advanceStatus,peopleAmmount)
                    VALUES ((SELECT clients.clientID FROM clients WHERE clients.clientPESEL='$clientPesel'),(SELECT room.roomID FROM room WHERE room.label='$roomLabel'),0 ,'$resStart',
                    '$resEnd','$advanceValue',0,'$peopleAmmount');";
        
        if(mysqli_query($connection,$sql_query)){
            $message .= " Rezerwacja dodana pomyslnie.";
        }  
    }
    
    
    $setRoomStateQuery = "CALL procedureSetValidRoomState('$roomLabel');";
    
    if(mysqli_query($connection, $setRoomStateQuery)){
        $message .= " Status pokoju zmieniony.";
    }
    
    $_SESSION['reservation_message'] = $message;
    $_SESSION['clAccMsg'] =  $clientUserAccMsg;
    mysqli_close($connection);
?>

<html>
	<style>
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-image: url("img/reception.jpg");
                height: 1080px; 
                background-position: center; 
                background-repeat: repeat; 
                background-size: cover; 
            }

            .top_bar_nav
            {
                width: 60%;
                margin: 0 auto;
            }

            .logo{
                float:left;
                padding: 15px;
            }

            header{
                background: #ffff80;
            }

            header::after{
                content:'';
                display: table;
                clear: both;
            }
            
            .go-back{
                position: relative;
                float: right;
                margin-top: 30px;
                margin-right: 30px;
            }
    </style>

	<head>
		<title>EHC - Reservation added !</title>
	
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
       	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />	
	</head>
	
	<header>
            <div class="top_nav_bar">
               <a href = index.php>    
                    <img src="img/ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
        	   </a>
            </div>
            
            <div class="go-back">
                <a href="index.php">
                    <input class="w3-btn w3-blue w3-medium" type="button" name="" value="Go Back">
       	        </a>
            </div>
            
    </header>
	
	<body>
		<div class="container-fluid">
			<div class="row successfull-reservation">
				<div class="col-sm-12 mx-auto res_success_text" style="margin-top: 15%; background-color: white; text-align: center">
                    <?php if(isset($_SESSION['mail_send'])){
                        echo $_SESSION['mail_send'];   
                    }?>
                    <?php if(isset($_SESSION['mail_error'])){
                        echo $_SESSION['mail_error'];   
                    }?>
                    <?php if(isset($_SESSION['clAccMsg'])){
                        echo $_SESSION['clAccMsg'];   
                    }?>
                    
                    <?php if(isset($_SESSION['reservation_message'])){?>
						<p><?php echo $_SESSION['reservation_message'];?></p>
					<?php } else {?>
						<p>Rezerwacja się nie powiodła</p>
					<?php }?>
                                        
				</div>
			</div>
		</div>
	</body>
</html>