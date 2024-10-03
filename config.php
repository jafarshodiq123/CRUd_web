<?php

$host = "localhost";
$uss = "root";
$pass = "";
$dbname = "crud_native";



$conn = new mysqli($host,$uss,$pass,$dbname);

if ($conn->connect_error){

    die("connection failed".$conn->connect_error);
    

}
?>