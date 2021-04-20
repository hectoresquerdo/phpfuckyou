<?php
$server ='localhost';
$username ='root';
$password ='';
$database = 'phpcalendar';


$db = mysqli_connect($server,$username,$password,$database);

mysqli_query($db, "SET NAMES 'utf8'");

//iniciar la session

session_start();
