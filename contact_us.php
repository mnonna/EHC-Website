<?php
session_start();

if(!(isset($_SESSION['logged'])))
{
    header('Location: log_in_form.php');
    exit();
}
?>

<html>
	<head>
		<title>EHC - Contact Us</title>
		
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
            
            .go-back{
                position: relative;
                float: right;
                margin-top: 30px;
                margin-right: 30px;
            }
            
            header{
                background: #ffff80;
            }

            header::after{
                content:'';
                display: table;
                clear: both;
            }
            
            .page-footer{
                position: relative;
                width: 100%;
                bottom: 0;
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
	</head>
	
		
	
	<body>
		<header>
            <div class="top_nav_bar">
               <a href = log_in_form.php>    
                    <img src="img/ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
        	   </a>
            </div>
            
            <div class="go-back">
                <a href="index.php">
                    <input class="w3-btn w3-blue w3-medium" type="button" name="" value="Go Back">
       	        </a>
            </div>
            
        </header>

		<div class="container-fluid">
			
			<div class="row">
				<div class="col-lg-12">
					<div class="card-deck mt-1 px-1">
                    	<div class="card border-secondary">
                    		<div class="card-body">
                    			<h4 class="card-title" style="color: black; text-align: center"> Skontaktuj się z nami </h4>
                    			
                    			<p style="font-size:14px; text-align: center"> W razie problemów w działaniu strony, skontaktuj się z naszymi adminami. Jestesmy też otwarci na wszelkie propozycje co do usprawnień w funkcjonalnosciach. </p> 
                    		</div>
                    	</div>
                    </div>
                </div>
			</div>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="card-deck mt-1 px-1">
                    	<div class="card border-secondary">
                    		<div class="card-body">
                    			<img class="pt-2 mx-auto card-img-top" src="img\bonus.jpg" alt="Card image cap">
                                
                                <h5 class="card-title">Marcin</h5>
                                <p class="title" style="color:#33adff; font-size:18px">Web developer - PHP 7.3, HTML 5 (along with Bootstrap 4), JS, MySQL database</p>
                                <p class="card-text">E-mail: marcinnonna026@gmail.com</p>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                            </div>
                            
                            <div class="card-body" style="background-color: #4dff4d">
                            	<h5 class="card-title" style="text-align:center">Kontakt przez media społecznosciowe:</h5>
                            	<div class="social-media-icons" style="text-align: center">
                                	<a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                           		</div>
                           </div> 
                    	</div>
                    	
                    	<div class="card border-secondary">
                    		<div class="card-body">
                                <img class="pt-2 mx-auto card-img-top" src="img\bonus.jpg" alt="Card image cap">
                                
                                <h5 class="card-title">Michał</h5>
                                <p class="title" style="color:#33adff; font-size:18px">C# desktop app developer</p>
                                <p class="card-text">E-mail: mimi@gmail.com</p>
                                <p class="card-text"></p>
                                <p class="card-text"></p>
                            </div>
                    	
                    		<div class="card-body" style="background-color: #4dff4d">
                            	<h5 class="card-title" style="text-align:center">Kontakt przez media społecznosciowe:</h5>
                            	<div class="social-media-icons" style="text-align: center">
                                	<a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                           		</div>
                           </div> 
                    	</div>
                    	
                	</div>
				</div>
			</div>
		
		</div>

		<div class="page-footer">
        			<div class="footer-copyright text-center py-3" style="font-size:16px; color: white">© 2019 Copyright: M&M Company
          			</div>
        		</div>
        		
        	
	</body>

</html>