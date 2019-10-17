<?php
session_start();

if(!(isset($_SESSION['logged'])))
{
    header('Location: log_in_form.php');
    exit();
}
?>

<!DOCTYPE HTML>
    <html lang="pl">
        <head>
        	<meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title>EHC - Show Reservation</title>    

            <style>
                body {
                    margin: 0;
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: url("img/reception.jpg");
                    height: 1080px; 
                    background-position: center; 
                    background-repeat: no-repeat; 
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
                    z-index: 2;    
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

                .container_reservations h1{
                    text-align: center;
                    margin-top: 40px;
                    color: #0099ff;
                    background-color: white;
                    width: 40%;
                }

                .table_u th{
                    background-color: aquamarine;
                    text-align: center;
                    color: red;
                }

                .table_u td{
                    text-align: center
                }
                
                .staff_errors h3{
                    text-align: center;
                    background-color: aquamarine;
                }
               
               .reservation-nav ul li :hover{
                background-color: aquamarine;
               }
                                    
            </style>
            
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
       		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
       		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                    <a href="#menu">   
                        <button  name="menu_button" class="w3-btn w3-blue w3-large">
                        Menu <i class='fa fa-caret-down'></i>
                        </button>
                    </a>
                    <ul>
                        <li>
                            <a href="#rooms">
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
                                    <a href="#rooms_add">
                                        <button name="add_room" class="w3-btn w3-blue w3-medium">Dodaj</button>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>

                        </li>

						<?php if($_SESSION['permission']==1 || $_SESSION['permission']==2){?>
                        <li>
                            <a href="#reservations">
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
                            <a href="clients_show.php">
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

						<?php if($_SESSION['permission']==1 || $_SESSION['permission']==2){?>
                        <li>
                            <a href="#cl_Services">
                                <button name="cl_services" class="w3-btn w3-blue w3-medium">Usługi</button>
                            </a>

                            <ul class="clients_services">
                                    <li>
                                        <a href="cl_service_show.php">
                                            <button name="show_clients" class="w3-btn w3-blue w3-medium">Przeglądaj</button>
                                        </a>
                                    </li>
    
                                    <li>
                                        <a href="#cl_service_add">
                                            <button name="add_client" class="w3-btn w3-blue w3-medium">Dodaj</button>
                                        </a>
                                    </li>
                            </ul>

                        </li>
                        <?php }?>

                        <li>
                            <a href="staff.php">
                                <button name="staff" class="w3-btn w3-blue w3-medium">Pracownicy</button>
                            </a>
                        </li>
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
            
            <div class="container-fluid reservation-nav">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs nav-justified mt-2 mb-2" id="myTab" role="tablist" style="background-color: white">
                          <li class="nav-item">
                            <a class="nav-link active" id="allres-tab" data-toggle="tab" href="#allres" role="tab" aria-controls="all" aria-selected="true">Wszystkie rezerwacje</a>
                          </li>
                          
                          <li class="nav-item">
                            <a class="nav-link" id="room-res-tab" data-toggle="tab" href="#roomres" role="tab" aria-controls="room" aria-selected="false">Rezerwacje na dany pokój</a>
                          </li>
                          
                          <li class="nav-item">
                            <a class="nav-link" id="clients-res-tab" data-toggle="tab" href="#clientsres" role="tab" aria-controls="clients" aria-selected="false">Rezerwacje klientów</a>
                          </li>
                        </ul>
                	</div>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
            
              <div class="tab-pane fade show active" id="allres" role="tabpanel" aria-labelledby="all-reservations-tab"> 
              	<div class="container container_reservations">  
                  <div class="row">
                  	<div class="col-lg-12 col-sm-4">        		
                        <table class="table_u table table-bordered table-dark table-hover" id="reservations">
                        <tr>
                            <th>ID_Klienta</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>E-mail</th>
                            <th>Nr. Pokoju</th>
                            <th>Koszt</th>
                            <th>Początek</th>
                            <th>Koniec</th>
                            <th>Status</th>
                            <th>Zaliczka</th>
                            <th></th>
                        </tr>
                        
                        <tbody id="reservations_body">
                        
                        </tbody>
                        
                        </table>
            	    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="roomres" role="tabpanel" aria-labelledby="room-reservations-tab">
              <div class="container">
              	<div class="row">
                  	<div class="col-lg-4 choose-room">
                  		<h3 style="text-align: center">Wybierz pokój</h3>
                  		
                        <select class="form-control mb-3" id="select_label">
                  		<?php 
                  		    require 'connect.php';
                              
                            $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
                            $sql = mysqli_query($connection,"SELECT label FROM room ORDER BY label ASC;");

                            while($row=$sql->fetch_assoc()){
                  		?>
                            <option value="<?= $row['label']?>" id="opt_room_label"> <?= $row['label']?> </option> 
                            <?php }?>
                        </select>
                  		
                  	</div>
                  	
                  	<div class="col-lg-12 col-sm-4 container_room_reservations">          		
                		<table class="table_u table table-bordered table-dark table-hover" id="room_reservations">
                		<tr>
                			<th>Nr. Pokoju</th>
              				<th>Imię</th>
              				<th>Nazwisko</th>
              				<th>Początek</th>
              				<th>Koniec</th>
              				<th>Status</th>
              				<th>Zaliczka</th>
              				<th></th>
                		</tr>
                		
                		<tbody id="room_reservations_body">
                		
                		</tbody>
                		
                		</table>
                	</div>
            	</div>
              </div>
              </div>
              
              <div class="tab-pane fade" id="clientsres" role="tabpanel" aria-labelledby="clients-reservations-tab">
              <div class="container">
              	<div class="row">
                  	<div class="col-lg-4 choose-client">
                  		<h3 style="text-align: center">Wybierz klienta</h3>
                  		
                        <select class="form-control mb-3" id="select_client">
                  		<?php 
                  		    require 'connect.php';
                              
                            $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
                            $sql = mysqli_query($connection,"SELECT DISTINCT clientID, clientName, clientSurname FROM clientsandreservations ORDER BY clientID ASC;");

                            while($row=$sql->fetch_assoc()){
                  		?>
                            <option value="<?= $row['clientID']?>" id="opt_client"> <?= $row['clientName']?> <?= $row['clientSurname']?> </option> 
                            <?php }?>
                        </select>
                  		
                  	</div>
                  	
                  	<div class="col-lg-12 col-sm-4 container_clients_reservations">          		
                		<table class="table_u table table-bordered table-dark table-hover" id="clients_reservations">
                		<tr>
              				<th>Imię</th>
              				<th>Nazwisko</th>
                            <th>Nr. Pokoju</th>
              				<th>Początek</th>
              				<th>Koniec</th>
              				<th>Status</th>
              				<th>Zaliczka</th>
              				<th></th>
                		</tr>
                		
                		<tbody id="clients_reservations_body">
                		
                		</tbody>
                		
                		</table>
                	</div>
            	</div>
              </div>                  
              </div>
            
            </div>
            
            
            <div class="res_errors">
            	<h3><?php 
            	       if(isset($_SESSION['user_delete_perm_error']))
            	           echo $_SESSION['user_delete_perm_error'];
            	     ?>
           		</h3>
            </div>
           
        </body>

        <script src="js_scripts\reservation_show\reservation.js">
        </script>

		<script src="js_scripts\reservation_show\reservation_rooms.js">
        </script>

        <script src="js_scripts\reservation_show\reservation_clients.js">
        </script>

    </html>