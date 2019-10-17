<?php
session_start();

unset($_SESSION['wrong_password']);
unset($_SESSION['notConfirmed']);
unset($_SESSION['error']);
?>

<html>
    <head>
        
        <title>EHC - Choose your room</title>    

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
                border-radius: 0 0 10px 10px;
                background: #ffff80;
            }

            header::after{
                content:'';
                display: table;
                clear: both;
            }

            .room_container{
                height: 600px;
            }
            
            .room_container .room-filter-row{
                height: 100%;
                padding-left: 5px;
                margin-right: 5px; 
            }
            
            
            .room-filter-row .room-filter {
                margin-left: 5px;
                height: 100%;
                display: table-cell;
                max-width: 100%;
                background-color:floralwhite;
                margin-top: 5px;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #05f7ff;
            }
            
            .room-filter-row .room-filter h5{
                font-family: "Verdana" ;
                font-size: 14pt;
                text-align: center;
                padding: 5px 30px;
                text-transform: uppercase;
                border-top: 5px;
                color: cornflowerblue;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #05f7ff;
            }
            
            .room-filter-row .room-filter h6{
                font-family: "Verdana" ;
                font-size: 10pt;
                text-align: left;
                padding: 5px;
                text-transform: uppercase;
                border-top: 5px;
                color: cornflowerblue;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #05f7ff;
            }
            
            .room-filter-row .room-filter ul{
                list-style: none;
                text-align: left;
            }
            
            .room-filter-row .col-lg-9{
                width: 100%;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #05f7ff;
            }
            
            .room-filter-row .col-lg-9 .visit-period label{
                font-family: "Verdana" ;
                font-size: 10pt;
                text-align: left;
                padding: 2px;
                text-transform: uppercase;
                border-top: 5px;
                color: cornflowerblue;
            }
            
            .room-filter-row .col-lg-9 .visit-period input{
                width: 300px;
                border-radius: 10%;
                text-align: center;
                background-color:cornsilk;
                color:darkviolet;
            }
            
            .go-back{
                position: relative;
                float: right;
                margin-top: 30px;
                margin-right: 30px;
            }
            
            .room-slider{
                background-clip: border-box;
                height: 525px;
            }
            
            .room-slider .room-slider-wrapper{
                height: inherit;
                overflow: hidden;
                padding: 10px 0px 10px 0px;
                background-color:#33ffd6;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #05f7ff;
            }
            
            .room-slider .room-slider-wrapper .room-post{
                text-align: center;
                display: inline-block;
                height: 80%;
                margin: 0 10px;
                background-color: #ff3333;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #ff0000;
            }
            
            .room-page-wrapper .room-slider-title{
                text-align:center;
                margin: 20px auto;
            }
            
            h1,h2,h3,h4,h5,h6{
                font-family: 'Candal',serif;
                color:azure;
            }
            
            .room-slider-row{
                position: relative;
                height: inherit;
            }
            
            .slider-nav-next .next{
                float: right;
                height: 40px;
                font-size: 1em;
                color: blue;
                cursor: pointer;
                margin-top: 3px;
            }
            
            .slider-nav-previous .previous{
                height: 40px;
                font-size: 1em;
                color: blue;
                cursor: pointer;
                margin-bottom: 3px;
            }
            
            .room-post .room-slider-image{
                margin-top: 2px;
                width: 100%;
                height: 200px;
                border-radius: 5px;
                box-shadow: 1rem 1rem 1rem -1rem #05f7ff;
            }
            
            .room-post-text{
                color: azure;
            }

            .filter-button{
                margin-top: 10%;
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
               <a href = log_in_form.php>    
                    <img src="img/ehc_logo.jpg" alt="Lights" class="logo" height="100" width="200">   
        	   </a>
            </div>
            
            <div class="go-back">
                <a href="log_in_form.php">
                    <input class="w3-btn w3-blue w3-medium" type="button" name="" value="Go Back">
       	        </a>
            </div>
            
        </header>
        
        
        <div class="container-fluid room_container">
           <div class="row room-filter-row">
           	<div class="col-sm-12 col-md-12 col-lg-3 room-filter">
           			<h5>Preferencje rezerwacji</h5>
           			<hr>
           			<h6 class="text-info">Wybierz piętro</h6>
           			<ul class="list-group">
               		<?php  
               		require 'connect.php';
               		
               		$connection = mysqli_connect($host, $db_user, $db_password, $db_name);
               		$sql = mysqli_query($connection,"SELECT DISTINCT floorNumber FROM room;"); 
               		while ($row = $sql->fetch_assoc()){
               		?>    
               		<li class="list-group-item">
               			<div class="form-check">
               				<label class="form-check-label">
               					<input type="checkbox" class="form-check-input floor_check" value="<?= $row['floorNumber']; ?>" id="floor"> <?= $row['floorNumber']; ?>
               				</label>
               			</div>
               		</li>
               		<?php }?>
               		</ul>
               		
           			
                    <div class="col-lg-9 mx-auto text-center">
                        <div class="visit-period">
                                <label>Wybierz początek pobytu</label>
                                <input type='text' name="start_datetime" id="res_begin" value=""/>
                                <label>Wybierz koniec pobytu</label>
                                <input type='text' name="end_datetime" id="res_end" value=""/>
                        </div>
                
                        <script>
                            $(function() {
                              $('input[name="start_datetime"]').daterangepicker({
                            	singleDatePicker: true,
                                timePicker: true,
                                timePicker24Hour: true,
                                startDate: moment().startOf('hour'),
                                endDate: moment().startOf('hour').add(24, 'hour'),
                                locale: {
                                  format: 'YYYY-MM-DD HH:mm:ss'
                                }
                              });

                              $('input[name="end_datetime"]').daterangepicker({
                              	singleDatePicker: true,
                                  timePicker: true,
                                  timePicker24Hour: true,
                                  startDate: moment().startOf('hour'),
                                  endDate: moment().startOf('hour').add(24, 'hour'),
                                  locale: {
                                    format: 'YYYY-MM-DD HH:mm:ss'
                                  }
                                });
                              
                            });
                        </script>
                    </div>
                    
                    <button type="button" class="w3-btn w3-blue btn-block filter-button" name="room-filter-button" id="id_room_filter">Filtruj</button>
            </div>	

            <div class="col-12 col-sm-12 col-lg-8 mx-auto room-page-wrapper">
                <div class="col-sm-12 room-slider-title"><h1>Wolne pokoje</h1></div>    
                    <div class="row room-slider-row">
                    <div class="col-sm-12 mx-auto room-slider">
                        <div class="col-sm-12 mx-auto room-slider-wrapper" id="r_wrapper">
                        
                            <?php  
                            require 'connect.php';
                            
                            $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
                            $sql = mysqli_query($connection,"SELECT room.label,room.dayPrice,room.capacity FROM room WHERE room.roomStatus=0;"); 
                            while ($row = $sql->fetch_assoc()){
                            ?>
                                <div class="col-sm-10 col-lg-12 room-post" id="post_id"><img src="img\room.jpg" alt="" class="room-slider-image">
                                <div class="col-sm-12 mx-auto room-post-text" id="text_id">
                                <form class="select_room_form_data">
                                    <div style="background-color: #9900cc; margin-top: 15px; border-radius: 5px 5px 5px 5px">
                                        <div class="form-group">
                                            <h5 style="text-align: center; padding-top: 2px"><label>Numer pokoju: <span class="badge badge-success"><?= $row['label']; ?></span><input type="hidden" name="r_label" value="<?= $row['label']; ?>" readonly></label></h5>
                                        </div>
                                        <div class="form-group">
                                            <label>Cena: <?= $row['dayPrice']; ?> zł<input type="hidden" name="r_dayprice" value="<?= $row['dayPrice']; ?>" readonly></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Liczba osób: <?= $row['capacity']; ?><input type="hidden" name="r_capacity" class="cap" value="<?= $row['capacity']; ?>" readonly></label><br> 
                                        </div>
                                    </div>   
                                        <button type="button" name="<?= $row['capacity']; ?>" class="orderRoom w3-btn w3-blue w3-medium btn-block" value="<?= $row['label']; ?>" style="margin-top:2px; border-radius: 5px 5px 5px 5px">Zamów</button>
                                     
                                </form>	
                                </div>
                                </div>  
                                
                            <?php } ?>
                        
                                                    
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-5 col-sm-6 mx-auto" id="resForm" style="background-color: white; margin-top: 50px; margin-bottom: 5px; display: none; border-radius: 5px 5px 5px 5px">
                    <input type="hidden" value="" id="labelnumber">
                    <input type="hidden" value="" id="capnumber">

                    <label class="resInfoLabel"></label>

                    <h5 style="color: black">Proszę potwierdź swoje dane konta klienta i podaj liczbę osób oraz wartość zaliczki, którą chcesz wpłacić
                                             aby zatwierdzić Twoją rezerwację</h5>

                    <form style="margin-top: 5px">
                        <div class="form-group">
                            <label for="nameLabel">Nazwa konta</label>
                            <input type="email" class="form-control" id="nameLabel" placeholder="Nazwa konta">
                            <div class="cred_error" id="name_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="passwordLabel">Hasło</label>
                            <input type="password" class="form-control" id="passwordLabel" placeholder="Hasło">
                            <div class="cred_error" id="password_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="passRptLabel">Powtórz hasło</label>
                            <input type="password" class="form-control" id="passRptLabel" placeholder="Powtórz hasło">
                            <div class="cred_error" id="password_repeat_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="advanceLabel">Wartość zaliczki</label>
                            <input type="text" class="form-control" id="advanceLabel" placeholder="Wartość zaliczki">
                            <div class="cred_error" id="advance_error"></div>
                        </div>

                        <div class="select_people_number" style="margin-bottom: 10px">
                            <label for="people_number" style="text-align: center; color: red">Podaj liczbę osób</label>
                                <select class="form-control" id="id_people_number" name="people_number">
                                    
                                </select>
                        </div>

                        <div class="final_status" style="margin-bottom: 5px"></div>

                        <button type="button" class="confirmRes btn btn-primary btn-block">Zatwierdź</button>
                    </form>
                </div>

        </div>
        </div>

    <script type="text/javascript" src="js_scripts\indexPage\clientAccount\showBookingForm.js">
    </script>

    <script type="text/javascript" src="js_scripts\indexPage\clientAccount\activityClientResAdd.js">
    </script>
                
    <script type="text/javascript" src="js_scripts\indexPage\clientAccount\roomFilter.js">
    </script>
   		        
    <script type="text/javascript" src="js_scripts\indexPage\clientAccount\sliderHandler.js">
    </script>    

    </body>
</html>