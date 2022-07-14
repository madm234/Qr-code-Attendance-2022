<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// $qr_file_path ="http://192.168.43.113/fish/lana/guro.php";
$qr_file_path ="http://localhost/fish/lana/guro.php";
$con =mysqli_connect('localhost','root','','tempo');

?>