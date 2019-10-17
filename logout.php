<?php
    
session_start();

session_unset();

header('Location: log_in_form.php');

?>