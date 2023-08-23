<?php


$sname= "localhost";
$uname="root";
$password="";

$db_name="warsystem";

$con = mysqli_connect($sname,$uname,$password,$db_name);

if(!$con){

    echo "Connection Failed";
} 
// else
// echo "connection successfull";