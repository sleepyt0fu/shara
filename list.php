<?php
$connection = mysqli_connect("localhost", "root", "", "logindb");
if($connection->connect_error){
    die('Connection Failed :  '.$connection->connect_error);
} 

?>