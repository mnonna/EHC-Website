<?php
session_start();

if(!(isset($_SESSION['logged'])))
{
    header('Location: log_in_form.php');
    exit();
}

unset($_SESSION['user_delete_perm_error']);
unset($_SESSION['user_self_delete_error']);

?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <title>EHC - Please Sign In</title>    

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
                background: #ffff80;
            }

            header::after{
                content:'';
                display: table;
                clear: both;
            }

            .signup_form{
                width: 300px;
                position:absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
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
            
            .select_permission{
                width: 100%;
                margin-top: 30px;
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
           
        <div class="signup_form">   
        	<h1>Sign up to EHC system</h1>
            
            <form action="user_signup.php" method="post">
            <div class="textbox">
                <input type="text" placeholder="Username" name="sgu_u_name" value="">
                <input type="text" placeholder="E-mail" name="sgu_u_email" value="">
                <input type="password" placeholder="Password" name="sgu_u_pass" value="">
           		<input type="password" placeholder="Repeat password" name="u_pass_repeat" value=""> 
           		<div class="select_permission">
           		<select class="form-control" id="perm_select" name="permissions">
    				<option value="admin">Admin</option>
    				<option value="receptionist">Receptionist</option>
    				<option value="cleaning">Cleaning</option>
    				<option value="service">Service</option>
  					<option value="chef">Chef</option>
    				<option value="guest">Guest</option>
  				</select>
           		</div>
            </div>
            
            <div>
   				<input class="sgn_submit" type="submit" name="signup_submit" value="Confirm">
           	</div>
    	
    	 	<a href="index.php">
            <input class="back_to_frontpage" type="button" name="" value="Go Back">
            </a>
            
            <p>
            <h4>
            <?php 
                 if(isset($_SESSION['passError1'])){
                echo $_SESSION['passError1'];
                }
                
                if(isset($_SESSION['credError'])){
                    echo $_SESSION['credError'];
                }
                
                if(isset($_SESSION['insert_error'])){
                    echo $_SESSION['insert_error'];
                }
                
                if(isset($_SESSION['mail_error'])){
                    echo $_SESSION['mail_error'];
                }
                
                if(isset($_SESSION['user_exist'])){
                    echo $_SESSION['user_exist'];
                }
                
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                }
                
                if(isset($_SESSION['mail_send'])){
                    echo $_SESSION['mail_send'];
                }
                
                if(isset($_SESSION['perm_error'])){
                    echo $_SESSION['perm_error'];
                }
            ?>
            </h4>
            </p>
            
            </form>
    	</div>

           
           
    </body>

</html>
