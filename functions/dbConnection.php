<?php 

function dbConnection()
{
   $server = "localhost";
   $user = "root";
   $password = "";
   $database = "rfid_test";
   $conn = mysqli_connect($server, $user, $password, $database);
   return $conn;
}