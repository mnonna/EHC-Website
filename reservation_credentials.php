<?php
session_start();

if(!(isset($_SESSION['logged'])))
{
    header('Location: log_in_form.php');
    exit();
}

$label=isset($_POST['r_label']) ? $_POST['r_label'] : "";
$_SESSION['label'] = $label;

unset($_SESSION['reservation_message']);
?>

<html>
    <head>
        
        <title>EHC - Pass your credentials</title>    

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
                width: 60%;
                margin: 0 auto;
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

            .signup_form{
                width: 300px;
            }

            .signup_form h1{
                text-align: center;
                font-size: 40px;
                border-bottom: 6px solid;
                margin-bottom: 50px;
                padding: 20px 0;
                color: red;
            }
            
            .signup_form p{
                font-size: 12px;
                text-align: center;
            }
    
            .textbox{
                width: 100%;
                overflow: hidden;
                font-size: 20px;
                padding: 8px 0;
                border-bottom: 1px solid;
                color: gold;
            }

            .textbox input{
                border: none;
                outline: none;
                background: none;
                color: yellow;
                font-size: 18px;
                width: 80%;
                float: left;
                margin: 0 10px;
            }
           
           ::placeholder{
                color: white;
           }

            .sgn_submit{
                width: 100%;
                background: none;
                border: 2px solid turquoise;
                color: white;
                padding: 5px;
                font-size: 18px;
                cursor: pointer;
                margin-top: 30px;
            }
            
            .select_people_number{
                width: 100%;
                margin-top: 2px;
                padding: 10px;
            }
            
            .back_to_frontpage{
                width: 100%;
                background: none;
                border: 2px solid turquoise;
                color: white;
                padding: 5px;
                font-size: 18px;
                cursor: pointer;
                margin-top: 3px;
            }

        </style>
        
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

    <body>
        
        <header>
        <div class="top_nav_bar">
            <a href="index.php">
            <img src="img/ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
        	</a>
        </div>
        </header>                
           
        <div class="container mx-auto signup_form">   
        	<h1>Podaj dane klienta</h1>
            <form action="client_reservation.php" method="post" name="client_res_data" onsubmit="return clientDataValidation();" >
            <div class="row textbox" style="color: gold">
                <div class="col-lg-10 col-sm-7 client-res-credentials">
                <div>
                	<input type="text" placeholder="Imię" name="res_c_name" value="">
                	<div id="cl_name_error" class="cl_validation_error"></div>
                </div>
                <div>
                	<input type="text" placeholder="Nazwisko" name="res_c_surname" value="">
               		<div id="cl_surname_error" class="cl_validation_error"></div>
                </div>
                <div>
                	<input type="email" placeholder="E-mail" name="res_c_email" value="">
           			<div id="cl_email_error" class="cl_validation_error"></div>
           		</div>
           		<div>
           			<input type="text" placeholder="Numer telefonu" name="res_c_phnumber" value=""> 
           			<div id="cl_phnumber_error" class="cl_validation_error"></div>
           		</div>
           		<div>
           			<input type="text" placeholder="Ulica" name="res_c_street" value="">
            		<div id="cl_street_error" class="cl_validation_error"></div>
                </div>
                <div>
                	<input type="text" placeholder="Adres" name="res_c_address" value="">
                	<div id="cl_address_error" class="cl_validation_error"></div>
                </div>
                <div>
                	<input type="text" placeholder="Kod pocztowy" name="res_c_postal" value="">
           			<div id="cl_postal_error" class="cl_validation_error"></div>
           		</div>
           		<div>
           			<input type="text" placeholder="Miasto" name="res_c_city" value="">
           			<div id="cl_city_error" class="cl_validation_error"></div>
           		</div>
           		<div>	
           			<input type="text" placeholder="PESEL" name="res_c_pesel" value="">
           			<div id="cl_pesel_error" class="cl_validation_error"></div>
           		</div>
           		<div>
           			<input type="text" placeholder="Nr dowodu osobistego" name="res_c_idcard" value="">
           			<div id="cl_idcard_error" class="cl_validation_error"></div>
           		</div>	
           		<div>
           			<input type="text" placeholder="Kwota zaliczki" name="res_c_advance" value="">
           			<div id="cl_advance_error" class="cl_validation_error"></div>
           		</div>
           		
           		<div class="select_people_number">
           		<label for="people_number" style="text-align: center; color: red">Podaj liczbę osób</label>
           		<select class="form-control" id="id_people_number" name="people_number">
    				<?php  
               		require 'connect.php';
               		
               		$connection = mysqli_connect($host, $db_user, $db_password, $db_name);
               		$sql = mysqli_query($connection,"SELECT capacity FROM room WHERE label='$label'"); 
               		$row = $sql -> fetch_assoc();
               		$i = 1;
               		while($i <= $row['capacity']){
               		    ?>  
               			<option value="<?= $i; ?>"><?= $i; ?></option>
               		<?php $i++;}?> 
  				</select>
           		</div>
           		
           		<div>
           		<h5>Numer pokoju: <?php echo $label;?></h5>
           		<h5>Początek rezerwacji: <?php echo $_SESSION['startDate'];?></h5>
           		<h5>Koniec rezerwacji: <?php echo $_SESSION['endDate'];?></h5>
           		</div> 	 
           		
           		</div>
            </div>
            
            <div>
   				<input class="sgn_submit" type="submit" name="signup_submit" value="Zatwierdź">
           	</div>
    	
    	 	<a href="reservation_add.php">
            <input class="back_to_frontpage" type="button" name="" value="Wróć">
            </a>
            </form>
    	</div>

        <script type="text/javascript" src="js_scripts\res_add\reservationCreds.js">							
        </script>
           
    </body>

</html>
