<?php
session_start();

if(!(isset($_SESSION['logged'])))
{
    header('Location: log_in_form.php');
    exit();
}
?>

<!DOCTYPE HTML>
    <html>
        <head>
            
            <title>EHC - Hotel Rooms</title>    

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

                nav{
                    float:right;   
                }

                nav ul{          
                    z-index: 1001;
                    float: right;
                }


                nav ul li{
                    float:left;
                    list-style:none;
                    position: relative;
                    padding: 10px;
                }

                nav ul li a{
                    display: block; 
                    text-decoration: none;
                    font-family: Arial, Helvetica, sans-serif;
                    color: brown;
                    padding: 10px 8px;
                    font-size: 14px;
                }

                nav ul li:hover ul{
                    display:block;
                }

                nav ul li ul{
                    display: none;
                    position: absolute; 
                    background-color: aliceblue;
                    padding: 6px;
                    border-radius: 0px 0px 4px 4px;
                }

                nav ul li ul li{
                    width: 180px;
                    border-radius: 4px;
                }

                nav ul li ul li a:hover{
                    background-color:cornflowerblue;
                }

                nav ul li ul li .rooms_opts{
                    position: absolute;
                    left: 180px;
                    top: -6px;
                    display: none;
                    background-color: lemonchiffon;
                }

                nav ul li ul li:hover .rooms_opts{
                    display: block;
                }

                nav ul li ul li ul li a:hover{
                    background-color: aquamarine;
                }

                nav ul li ul li .reservations_opts{
                    position: absolute;
                    left: 180px;
                    top: 10px;
                    display: none;
                    background-color: lemonchiffon;
                }

                nav ul li ul li:hover .reservations_opts{
                    display: block;
                }

                nav ul li ul li .clients_opts{
                    position: absolute;
                    left: 180px;
                    top: 10px;
                    display: none;
                    background-color: lemonchiffon;
                }

                nav ul li ul li:hover .clients_opts{
                    display: block;
                }

                nav ul li ul li .clients_services{
                    position: absolute;
                    left: 180px;
                    top: 10px;
                    display: none;
                    background-color: lemonchiffon;
                }

                nav ul li ul li:hover .clients_services{
                    display: block;
                }

                nav ul li ul li .show_activities{
                    position: absolute;
                    left: 180px;
                    top: 10px;
                    display: none;
                    background-color: lemonchiffon;
                }

                nav ul li ul li:hover .show_activities{
                    display: block;
                }
               
                .next:hover {
                  background-color: #ddd;
                  color: black;
                }
                
                .previous:hover {
                  background-color: #ddd;
                  color: black;
                }
               
               .next {
                  position: absolute;
                  z-index: 1000;
                  top: 50%;
                  right: 25px; 
                  background-color: #4CAF50;
                  color: white;
                }
               
               .previous {
                  position: absolute;
                  z-index: 1000;
                  top: 50%;
                  left: 25px;
                  background-color: #4CAF50;
                  color: white;
                }
               
               .round{
                    border-radius: 50%;
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
                
                <a href="log_in_form.php">
                <img src="img/ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
               	</a>
               
                <div class="container-fluid">
              	<div class="row mr-auto my-auto">
              	<div class="col-lg-12">
                <nav>
                <ul>
                    <li>
                    <a href="">   
                        <button  name="menu_button" class="w3-btn w3-blue w3-large">
                        Menu <i class='fa fa-caret-down'></i>
                        </button>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                            <button name="rooms" class="w3-btn w3-blue w3-medium">Pokoje</button>
                            </a>

                            <ul class="rooms_opts">
                                <li>
                                    <a href="rooms_show.php">
                                        <button name="show_rooms" class="w3-btn w3-blue w3-medium">Przeglądaj</button>
                                    </a>
                                </li>

								<?php if($_SESSION['permission']==1){?>
                                <li>
                                    <a href="">
                                        <button name="add_room" class="w3-btn w3-blue w3-medium">Dodaj</button>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>

                        </li>

						<?php if($_SESSION['permission']==1 || $_SESSION['permission']==2){?>
                        <li>
                            <a href="">
                                <button name="reservations" class="w3-btn w3-blue w3-medium">Rezerwacje</button>
                            </a>

                            <ul class="reservations_opts">
                                <li>
                                    <a href="reservation_show.php">
                                        <button name="show_reservations" class="w3-btn w3-blue w3-medium">Przeglądaj</button>
                                    </a>
                                </li>

                                <li>
                                    <a href="reservation_add.php">
                                        <button name="add_reservations" class="w3-btn w3-blue w3-medium">Dodaj</button>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php }?>

						<?php if($_SESSION['permission']==1 || $_SESSION['permission']==2){?>
                        <li>
                            <a href="">
                                <button name="clients" class="w3-btn w3-blue w3-medium">Klienci</button>
                            </a>

                            <ul class="clients_opts">
                                <li>
                                    <a href="clients_show.php">
                                        <button name="show_clients" class="w3-btn w3-blue w3-medium">Przeglądaj</button>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php }?>

						<?php if($_SESSION['permission']==1 || $_SESSION['permission']==2 || $_SESSION['permission']==6){?>
                        <li>
                            <a href="">
                                <button name="cl_services" class="w3-btn w3-blue w3-medium">Usługi</button>
                            </a>

                            <ul class="clients_services">
                                    <li>
                                        <a href="cl_service_show.php">
                                            <button name="show_clients" class="w3-btn w3-blue w3-medium">Przeglądaj</button>
                                        </a>
                                    </li>

                                    <?php if($_SESSION['permission']==1 || $_SESSION['permission']==2){?>
                                    <li>
                                        <a href="#cl_service_add">
                                            <button name="add_client" class="w3-btn w3-blue w3-medium">Dodaj</button>
                                        </a>
                                    </li>
                                    <?php } ?>
                            </ul>

                        </li>
                        <?php }?>
                        
                        <?php if($_SESSION['permission']!=6){?>
                        <li>
                            <a href="staff.php">
                                <button name="staff" class="w3-btn w3-blue w3-medium">Pracownicy</button>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    
                    </li>

                    <li>
                        <a href="#help">
                            <button name="help_faq_button" class="w3-btn w3-blue w3-large">
                            Pomoc <i class='far fa-question-circle'></i>
                            </button>
                        </a>
                    </li>

                    <li>
                        <a href="#about.php">
                            <button name="about_us" class="w3-btn w3-blue w3-large">
                            O nas <i class='fas fa-info-circle'></i>
                            </button>
                        </a>
                    </li>

                    <li>
                        <a href="contact_us.php">
                            <button name="contact" class="w3-btn w3-blue w3-large">
                            Kontakt <i class='far fa-address-card'></i>
                            </button>
                        </a>
                    </li>
                    
                    <?php if($_SESSION['permission']==1){?>
        			<li>
                        <a href="signup.php">
                            <button name="signup" class="w3-btn w3-blue w3-large">
                            Zarejestruj <i class='far fa-address-card'></i>
                            </button>
                        </a>
                    </li>
                    <?php } ?>
        
                    <li>
                        <a href="logout.php">
                            <button name="logout" class="w3-btn w3-blue w3-large">
                            Wyloguj <i class='fas fa-power-off'></i>
                            </button>
                        </a>
                    </li>
                </ul>
                </nav>
                </div>
                </div>
                </div>

            </div>
            </header>
            
            <div class="container-fluid">
            	<div class="row">
            	<?php 
            	   require 'connect.php';
            	   
            	   $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
            	   $sql = mysqli_query($connection,"SELECT *FROM room ORDER BY label ASC;");
            	   
            	   while ($row = $sql->fetch_assoc()){
                ?>
                <div class="col-lg-4 col-md-6 mb-2">
            	<div class="card-deck mt-1 px-1">
                	<div class="card border-secondary">
                        
                        <div class="row-fluid room-image-row">
                        <div class=" col-lg-10 mx-auto my-auto room-card-images">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room.jpg" alt="Card image cap">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room_1.jpg" alt="Card image cap">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room_2.jpg" alt="Card image cap">
                        </div>
                        </div>
                        
                        <div class="card-body">
                        	<?php if($_SESSION['permission']==1 || $_SESSION['permission']==2 ){?>
                            
                                <h5 class="card-title">Numer pokoju: <?= $row['label'];?></h5>
                                <p class="card-text">Cena za dzień: <?= $row['dayPrice'];?></p>
                                <p class="card-text">Liczba osób: <?= $row['capacity'];?></p>
                                <p class="card-text">Opis: <?= $row['roomDescription'];?></p>
                                
                                <?php if($row['roomStatus']==0){?>
                                	<div class="alert alert-success" role="alert">
                                		Pokój nie posiada dokonanych rezerwacji.
                                	</div>
                                <?php }?>
                                
                                <?php if($row['roomStatus']==1){?>
                                	<div class="alert alert-warning" role="alert">
                                		Pokój posiada zarejestrowane przyszłe rezerwacje (nikt w nim nie przebywa).
                                	</div>
                                <?php }?>
                                
                                <?php if($row['roomStatus']==2){?>
                                	<div class="alert alert-danger" role="alert">
                                		Pokój zajęty przez klienta (w trakcie rezerwacji).
                                	</div>
                                <?php }?>
                                
                                <?php if($row['isCleaningNeeded']==0){?>
                                	<div class="alert alert-success" role="alert">
                                		Pokój nie wymaga usługi sprzątaczki.
                                	</div>
                                <?php }?>
                                
                                <?php if($row['isCleaningNeeded']==1){?>
                                	<div class="alert alert-danger" role="alert">
                                		Pokój wymaga sprzątania.
                                	</div>
                                <?php }?>
                                
                                <?php if($row['isServiceNeeded']==0){?>
                                	<div class="alert alert-success" role="alert">
                                		Pokój nie wymaga usługi serwisanta.
                                	</div>
                                <?php }?>
                                
                                <?php if($row['isServiceNeeded']==1){?>
                                	<div class="alert alert-danger" role="alert">
                                		Pokój wymaga serwisu.
                                	</div>
                                <?php }?>
                            <?php }?>
                            
                            <?php if($_SESSION['permission']==3){?>
                                <h5 class="card-title">Numer pokoju: <?= $row['label'];?></h5>
                                <h5 class="card-title">Ostatnie sprzątanie: <?= $row['lastClean'];?></h5>
                                
                                <?php if($row['isCleaningNeeded']==0){?>
                                	<div class="alert alert-success" role="alert">
                                		Pokój nie wymaga usługi sprzątaczki.
                                	</div>
                                <?php }?>
                                
                                <?php if($row['isCleaningNeeded']==1){?>
                                	<div class="alert alert-danger" role="alert">
                                		Pokój wymaga sprzątania.
                                		<input type="hidden" class="room_card_class_id" id="room_card_id" value="<?= $row['label'];?>"> 
                                	</div>
                					<button type="button" id="set_room_cleaned" class="btn clean_room btn-warning btn-lg btn-block" value="<?= $row['label'];?>" onclick="cleanRoom(this.value)">Posprzątano</button>
                					
                                <?php }?>
                            
                            <?php }?>
                            
                            <?php if($_SESSION['permission']==4){?>
                                <h5 class="card-title">Numer pokoju: <?= $row['label'];?></h5>
                                <h5 class="card-title">Ostatnie sprzątanie: <?= $row['lastService'];?></h5>
                                
                                <?php if($row['isServiceNeeded']==0){?>
                                	<div class="alert alert-success" role="alert">
                                		Pokój nie wymaga usługi serwisu.
                                	</div>
                                <?php }?>
                                
                                <?php if($row['isServiceNeeded']==1){?>
                                	<div class="alert alert-danger" role="alert">
                                		Pokój wymaga serwisowania.
                                		<input type="hidden" class="room_card_class_id" id="room_card_id" value="<?= $row['label'];?>"> 
                                	</div>
                					<button type="button" id="set_room_serviced" class="btn clean_room btn-warning btn-lg btn-block" value="<?= $row['label'];?>" onclick="serviceRoom(this.value)">Odznacz serwisowanie</button>
                					
                                <?php }?>
                            
                            <?php }?>

                            <?php if($_SESSION['permission']==6){?>
                                <h5 class="card-title">Numer pokoju: <?= $row['label'];?></h5>
                                <h5 class="card-title">Opis: <?= $row['roomDescription'];?></h5>
                            <?php } ?>
                            
                        </div>
					</div>	       	
            	</div>
            	</div>
            	<?php }?>
        		</div>
        		
        		<?php 
        		
        		if($_SESSION['permission']==1 || $_SESSION['permission']==2 ){
            		$now = new Datetime("now");
            		$begintime = new DateTime('17:00');
            		$endtime = new DateTime('22:00');
                	   
                	   if($now >= $begintime && $now <= $endtime){
                	?>
                		<a href="set_room_cleaning.php">
                			<button type="button" name="set_daily_cleaning" class="btn btn-success btn-lg btn-block">Zleć codzienne sprzątanie pokoi</button>;
                		</a>
            	<?php }}?>
        		
			</div>


		<script type="text/javascript" src="js_scripts\rooms\roomImgSlider.js">
		</script>	
		
		<script type="text/javascript" src="js_scripts\rooms\activityCleaning.js">
		</script>	
		
		<script type="text/javascript" src="js_scripts\rooms\activityService.js">
		</script>
		
        </body>
</html>