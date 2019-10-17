<?php
    session_start();

    if(!(isset($_SESSION['logged'])))
    {
        header('Location: log_in_form.php');
        exit();
    }
    
    unset($_SESSION['credError']);
    unset($_SESSION['passError1']);
    unset($_SESSION['success']);
    unset($_SESSION['mail_error']);
    unset($_SESSION['mail_send']);
    unset($_SESSION['insert_error']);
    unset($_SESSION['user_exist']);
    unset($_SESSION['perm_error']);
    unset($_SESSION['user_delete_perm_error']);
    unset($_SESSION['user_self_delete_error']);
    unset($_SESSION['wrong_password']);
    unset($_SESSION['reservation_message']);
?>

<!DOCTYPE HTML>
    <html>
        <head>
            
            <title>EHC - Hotel Control System</title>    

            <style>
                body {
                    margin: 0;
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: url("img/reception.jpg");
                    height: 900px;
                    background-position: center; 
                    background-repeat: repeat; 
                    background-size: cover; 
                }

                .top_bar_nav
                {
                    width: 30%;
                    margin: 0 auto;
                    max-width: 50%; 
                }

                .logo{
                    float:left;
                    padding: 15px;
                }

                header{
                    border-radius: 0 0 10px 10px;
                    background: #ffff80;
                    }

                header::after{
                    content:'';
                    display: table;
                    clear: both;
                }

            </style>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        </head>


        <body>
            <header>
                <div class="top_nav_bar">
                    <a href="index.php">
                    <img src="img/ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
                    </a>
                </div>
            </header> 
        
            <div class="container-fluid">
            	<div class="row-fluid">
            	<?php 
                   require 'connect.php';
                   
                   $clID = $_GET['clientID'];
            	   
            	   $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
            	   $sql = mysqli_query($connection,"SELECT *FROM clientsandreservations WHERE clientID='$clID';");
            	   
            	   while ($row = $sql->fetch_assoc()){
                ?>
                <div class="col-lg-4 col-md-6 mb-2 mx-auto">
            	<div class="card-deck mt-1 px-1">
                	<div class="card border-secondary">
                        
                        <div class="row-fluid service-image-row">
                            <div class=" col-lg-10 mx-auto my-auto service-image">
                                <img class="pt-2 mx-auto card-img-top" src="img\room.jpg" alt="Card image cap">
                            </div>
                        </div>

                        <div class="card-body">
                                <h5 class="card-title">Numer pokoju: <?=$row['roomLabel']?></h5>
                                <h5 class="card-text">Identyfikator rezerwacji: <?=$row['reservationID']?></h5>
                                <p class="card-text">Opis pokoju: <?= $row['roomDescription'];?></p>
                                <p class="card-text">Początek rezerwacji: <?= $row['reservationStart'];?></p>   
                                <p class="card-text">Koniec rezerwacji: <?= $row['reservationEnd'];?></p>
                                <p class="card-text">Uprzejmie prosimy o punktualne zameldowanie się w naszym hotelu, dziękujemy :)</p>

                                <input type="hidden" id="resStart" value="<?=$row['reservationStart']?>">
                                <input type="hidden" id="resEnd" value="<?=$row['reservationEnd']?>">

                                <button type="button" class="btn btn-primary btn-block" style="text-align: center" id="orderAddService">Zamów usługi dodatkowe</button>
                        </div>
					</div>	       	
            	</div>
            	</div>
            	<?php }?>
        		</div>
            </div>  

        </body>

        <script type="text/javascript">
            <?php $date = date('Y-m-d H:i:s');?>
            
            var now = "<?php echo $date;?>";
            var rStart = document.getElementById("resStart").value;
            var rEnd = document.getElementById("resEnd").value;

            console.log(now, rStart, rEnd);
                
            if( (now > resStart) && (now < resEnd))
                document.getElementById("orderAddService").disabled = true;
            else
                document.getElementById("orderAddService").disabled = false;

        </script>
</html>