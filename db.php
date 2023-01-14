<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname   = "grading_db";
  $port     =  3306;

  $conn = mysqli_connect($hostname.':'.$port, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }

  /*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grading_db";


$conn = mysqli_connect($servername, $username, $password, $dbname);*/

?>



