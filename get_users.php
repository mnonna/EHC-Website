<?php
require_once 'connect.php';

$connection = mysqli_connect($host, $db_user, $db_password, $db_name);
$result = mysqli_query($connection,"SELECT *FROM allusers;");

$output = array();

while ($out = $result->fetch_assoc()) {
    $output[] = $out;
}

$data = json_encode($output);

echo $data;

mysqli_close($connection);
?>