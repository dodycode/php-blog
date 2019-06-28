<?php
//environment
$servername = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'phpblog';

//create connection
$conn = mysqli_connect($servername, $user, $pass, $database);

//handle error
if(mysqli_connect_errno()){
    die('Connection failed. log:' . mysqli_connect_error());
}