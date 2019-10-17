<?php
    require 'E:\xampp\htdocs\ehc\php-mailer-master\PHPMailerAutoload.php';
    
    session_start();   

    unset($_SESSION['credError']);
    unset($_SESSION['passError1']);
    unset($_SESSION['mail_error']);
    unset($_SESSION['mail_send']);
    unset($_SESSION['success']);  
       
    require_once 'connect.php';
    
    if($_SESSION['permission']!=1)
    {
        $_SESSION['perm_error'] = '<span style="color:white"> You dont have permissions to register users ! </span>';
        header("Location: signup.php");
        exit();
    }
    
    foreach ($_POST as $key=>$value){
        if(empty($_POST[$key])){
            $_SESSION['credError']='<span style="color:white"> All data are required ! </span>';
            header('Location: signup.php');
            break;
        }
    }
        
    if($_POST['sgu_u_pass'] != $_POST['u_pass_repeat'])
    {
        $_SESSION['passError1'] = '<span style="color:white"> You have typed different passwords ! </span>';
        header('Location: signup.php');
        exit();
    }
       
    if(!isset($_SESSION['credError']) && !isset($_SESSION['passError1'])){
        
    $userName = $_POST['sgu_u_name'];
    $userEmail = $_POST['sgu_u_email'];
    $userPassword = $_POST['sgu_u_pass'];
    $userPasswordRepeat = $_POST['u_pass_repeat']; 
    
    $hashedPassword = hash('sha512', $userPassword);
    
    $permission=$_POST['permissions'];
    
    switch($permission){
        case "admin":
            $permission=1;            
            break;
        case "receptionist":
            $permission=2;
            break;
        case "cleaning":
            $permission=3;
            break;
        case "service":
            $permission=4;
            break;
        case "chef":
            $permission=5;
            break;
        case "guest":
            $permission=6;
            break;
    }       
    
    //echo $permission;
    
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if ($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }

    $str=rand();
    $token = hash('md5',$str);

    $sql_query="INSERT INTO users (userName,password,permissionGiven,userEmail,userToken,isConfirmed) VALUES ('$userName','$hashedPassword','$permission','$userEmail','$token',0)";
    $user_check_query = "SELECT *FROM users WHERE userName='$userName' AND userEmail='$userEmail'";
    
    if(mysqli_query($connection,$user_check_query)->num_rows == 0)      //Jezeli nie ma uzytkownika (czyli mo�na zarejestrowa� konto) 
    {
        if(mysqli_query($connection,$sql_query)){       //I jezeli insert do bazy si� powi�d�
            $_SESSION['success']='<span style="color:white"> Success ! </span>';        //To daj komunikat o powodzeniu i wy�lij maila do u�ytkownika na wskazany email
            
            $mail = new PHPMailer;
            
            $to = "$userEmail";
            
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
            
            $hash_perm = hash('md5', $permission);
            
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
                <p style="text-align: center"><a href="http://localhost/ehc/reg_confirm.php?email='.$userEmail.'&token='.$token.'&'.$hash_perm.'">http://localhost/ehc/reg_confirm.php?email='.$userEmail.'&token='.$token.'&'.$hash_perm.'</a></p>
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
                $_SESSION['insert_error']='<span style="color:white"> Insert error '.mysqli_error($connection).' </span>';
            }
    }
    else{
        $_SESSION['user_exist'] = '<span style="color:white"> User already exists ! </span>';
    }
      
    mysqli_close($connection);
    
    
    header('Location: signup.php');     
    }
    
?>