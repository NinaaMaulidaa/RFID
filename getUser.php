<?php

include './functions/dbConnection.php';
$conn = dbConnection();

$queryRfid = "SELECT * FROM tmp_rfid LIMIT 1";
$rfidResult = mysqli_query($conn, $queryRfid);
$rfid = mysqli_fetch_assoc($rfidResult);
$rfidTag = $rfid["rfid"];

if (!$rfidTag) {
   echo json_encode([
      "success"   => false
   ]);
}

$queryUser = "SELECT * FROM users WHERE rfid=$rfidTag LIMIT 1";
$userResult = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($userResult);
echo json_encode([
   "success"   => true,
   "user"      => $user
]);
// print_r($user);