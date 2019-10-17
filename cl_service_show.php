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
                                    <a href="#clients_show">
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
        
                    <?php if($_SESSION['permission']==6){
                        require 'connect.php';

                        $user = $_SESSION['user'];

                        $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
                        $sql = mysqli_query($connection,"SELECT clientID FROM clientsandreservations WHERE clientEmail ='$user';");

                        $row = $sql->fetch_assoc();
                        $clid = $row['clientID'];
                        ?>
                        <li>
                            <a href="">
                                <button name="cl_account" class="w3-btn w3-blue w3-large">Konto klienta</button>
                            </a>

                            <ul class="client_acc_features">
                                <li>
                                    <a>
                                        <button name="signup" class="w3-btn w3-blue w3-medium" data-toggle="modal" data-target="#changePassModal">
                                        Zmień hasło <i class="fas fa-user-circle"></i>
                                        </button>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="your_reservations.php?clientID=<?php echo $clid; ?>">
                                        <button name="signup" class="w3-btn w3-blue w3-medium">
                                        Rezerwacje <i class="fas fa-book-open"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
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
            	<div class="row-fluid">
            	<?php 
            	   require 'connect.php';
            	   
            	   $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
            	   $sql = mysqli_query($connection,"SELECT * FROM `services`;");
            	   
            	   while ($row = $sql->fetch_assoc()){
                ?>
                <div class="col-lg-4 col-md-6 mb-2 mx-auto">
            	<div class="card-deck mt-1 px-1">
                	<div class="card border-secondary">
                        
                        <div class="row-fluid service-image-row">
                        <div class=" col-lg-10 mx-auto my-auto service-image">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room.jpg" alt="Card image cap">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room_1.jpg" alt="Card image cap">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room_2.jpg" alt="Card image cap">
                        </div>
                        </div>
                        
                        <div class="card-body">
                                <h5 class="card-title"><?= $row['serviceType'];?></h5>
                                <p class="card-text">Rodzaj usługi: <?= $row['serviceTag'];?></p>
                                <p class="card-text">Cena za godzinę: <?= $row['serviceHourPrice'];?> zł</p>   
                        </div>
					</div>	       	
            	</div>
            	</div>
            	<?php }?>
        		</div>
        		
        		<div class="row-fluid">
            	<?php 
            	   require 'connect.php';
            	   
            	   $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
            	   $sql = mysqli_query($connection,"SELECT * FROM `itemservices`;");
            	   
            	   while ($row = $sql->fetch_assoc()){
                ?>
                <div class="col-lg-4 col-md-6 mb-2 mx-auto">
            	<div class="card-deck mt-1 px-1">
                	<div class="card border-secondary">
                        
                        <div class="row-fluid service-image-row">
                        <div class=" col-lg-10 mx-auto my-auto service-image">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room.jpg" alt="Card image cap">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room_1.jpg" alt="Card image cap">
                        	<img class="pt-2 mx-auto card-img-top" src="img\room_2.jpg" alt="Card image cap">
                        </div>
                        </div>
                        
                        <div class="card-body">
                                <h5 class="card-title"><?= $row['serviceType'];?></h5>
                                <p class="card-text">Rodzaj usługi: <?= $row['serviceTag'];?></p>
                                <p class="card-text">Cena za sztukę: <?= $row['serviceItemPrice'];?> zł</p>   
                        </div>
					</div>	       	
            	</div>
            	</div>
            	<?php }?>
        		</div>
        		
			</div>

            <div class="modal fade" id="changePassModal" name="dialogPassModal" tabindex="-1" role="dialog" aria-labelledby="changePassLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Zmień hasło</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                                        
                            <div class="modal-body">
                                <form class="changePassForm" name="changePassword" id="idPassForm">
                                    <div class="form-group">
                                        <h5>Nazwa konta klienta:</h5>
                                        <label id="accName"><?php echo $_SESSION['user']; ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="idNewPass">Nowe hasło</label>
                                        <input type="password" class="form-control" id="idNewPass" name="nameNewPassword" aria-describedby="newPassHelp" placeholder="Nowe hasło">
                                        <span toggle="#idNewPass" class="fa fa-fw fa-eye field-icon toggle-password" style="position: relative; float: right; margin-left: -30px; margin-top: -25px; z-index: 2"></span>
                                        <div id="newPassError" class="passVerifyError"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="idRepeatPass">Powtórz hasło</label>
                                        <input type="password" class="form-control" id="idRepeatPass" name="nameRepeatPass" placeholder="Powtórz hasło">
                                        <div id="repeatError" class="passVerifyError"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="confPassChange" data-dismiss="static" class="btn btn-primary" onclick="return passwordValidation();">Zatwierdź</button>
                                    </div>
                                </form>
                            </div>
                            </div>  
                        </div>
                </div>

                <script type="text/javascript">
                $(".toggle-password").click(function() {

                    $(this).toggleClass("fa-eye fa-eye-slash");
                        var input = $($(this).attr("toggle"));
                        if (input.attr("type") == "password") {
                            input.attr("type", "text");
                            } else {
                                input.attr("type", "password");
                            }
                });
            </script>

        <script type="text/javascript">
            var newpass = document.forms["changePassword"]["nameNewPassword"];
            var repeat = document.forms["changePassword"]["nameRepeatPass"];
            var accName = document.getElementById("accName").textContent;
            
            repeat.addEventListener("blur", passIntegrity, true);

            var newpasserr = document.getElementById("newPassError");
            var repeaterr = document.getElementById("repeatError");

            function passwordValidation(){
                if(newpass.value == ""){
                    newpass.style.border = "1px solid red";
					newpasserr.style = "font-size: 10px";
					newpasserr.textContent = "Proszę podać poprawne dane";
					newpass.focus();
					return false;
                }
                else if(repeat.value == ""){
                    repeat.style.border = "1px solid red";
					repeaterr.style = "font-size: 10px";
					repeaterr.textContent = "Proszę podać poprawne dane";
					repeat.focus();
					return false;
                }
                else if(newpass.value != repeat.value){
                    repeat.style.border = "1px solid red";
					repeaterr.style = "font-size: 10px";
					repeaterr.textContent = "Proszę podać poprawne dane";
					repeat.focus();
					return false;
                }

                else{
                    $.ajax({
                        url: 'change_client_pass.php?account='+accName,
                        type: 'POST',
                        data: {newpass: newpass.value},

                        success: function(response){
                            console.log(response);
                            alert("Password change success !");
                        },

                        error: function(response){
                            console.log(response);
                            alert("Password change failed !");
                        }
                    });
                }

            }

            function passIntegrity(){
                if(newpass.value != ""){
                    newpass.style.border = "none";
					newpasserr.innerHTML = "";
					return true;
                }

                if(repeat.value != "" && newpass.value == repeat.value){
                    repeat.style.border = "none";
					repeaterr.innerHTML = "";
					return true;
                }
            }
        </script>
        
		<script type="text/javascript">
		$('.service-image').slick({
			  infinite: true,
			  speed: 500,
			  fade: true,
			  cssEase: 'linear',
			  nextArrow: "<button type='button' class='mr-auto next round'>&#8250;</button>",
              prevArrow: "<button type='button' class='ml-auto previous round'>&#8249;</button>"
			});
		</script>	

		
        </body>
</html>