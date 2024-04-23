<?php

include './functions/dbConnection.php';
$conn = dbConnection();

$rfid = $_GET["rfid"];

$query = "UPDATE tmp_rfid SET rfid=$rfid";
mysqli_query($conn, $query);

echo json_encode("ID Card adalah : " . $rfid );