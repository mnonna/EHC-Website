<?php 
    session_start();
    
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: index.php');
        exit();
    }
    
    
    unset($_SESSION['credError']);
    unset($_SESSION['passError1']);
    unset($_SESSION['success']);
    unset($_SESSION['mail_error']);
    unset($_SESSION['mail_send']);
    unset($_SESSION['insert_error']);
    unset($_SESSION['user_exist']);
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        
        <title>EHC - Please Log In</title>    

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

            .login-form h1{
                text-align: center;
                font-size: 40px;
                border-bottom: 6px solid;
                margin-bottom: 50px;
                padding: 20px 0;
                color: red;
            }

            .login-form p{
                font-size: 12px;
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

            .textbox ::placeholder{
                color: aquamarine;
            }

        </style>
        
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
        	<a href = log_in_form.php>    
            <img src="img\ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
        	</a>
        </div>
        </header>
        
        
        <div class="container login-form" >
            <div class="row"> 
                <div class="col-lg-4 col-md-5 mx-auto" style="margin-top: 20%">  
                    <h1>Log in EHC</h1>
                    
                    <form action="logto.php" method="post">
                    <div class="textbox">
                        <input type="text" placeholder="E-mail" name="u_email" value="">
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Password" name="u_pass" value="">
                    </div>

                    <input class="btn" type="submit" name="" value="Submit" style="width: 100%;
                                                                                    background: none;
                                                                                    border: 2px solid turquoise;
                                                                                    color: white;
                                                                                    padding: 5px;
                                                                                    font-size: 18px;
                                                                                    cursor: pointer;">
                                                                                    
                    </form>
                    
                    <p>
                    <?php 
                        if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        }
                        if(isset($_SESSION['wrong_password'])){
                            echo $_SESSION['wrong_password'];
                        }
                        if(isset($_SESSION['verify_error'])){
                            echo $_SESSION['verify_error'];
                        }
                        if(isset($_SESSION['verify_ok'])){
                            echo $_SESSION['verify_ok'];
                        }
                        if(isset($_SESSION['notConfirmed'])){
                            echo $_SESSION['notConfirmed'];
                        }

                    ?>
                    </p>
                    
                    <div class="default_booking">
                        <h6 style="color: white">Nie posiadasz konta, bądź zapomniałeś hasła ? Zamów pokój poniżej !</h6>
                            <a href="reservation_secondary.php">
                                <button type="button" class="btn btn-primary btn-block" >Zarezerwuj bez konta</button>
                            </a>
                    </div>
                </div> 
            </div>
        </div>
        

    </body>

</html>