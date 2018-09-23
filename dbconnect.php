<?php 
$servername = "localhost";
$username = "your_db_username";
$password= "your_safe_password";
$dbname = "PohLes2k18";

$conn = new mysqli($servername,$username,$password,$dbname); 
if($conn->connect_error){
    die($conn->connect_error); }
$conn -> set_charset("UTF8") or die("Bad encoding!");

?>