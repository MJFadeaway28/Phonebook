<?php
require "../header.php";
include "dbh.inc.php";

$name  = $_POST['name'];
$phone   = $_POST['phone'];
$idUsers = $_SESSION['userId'];
$sql = "INSERT INTO contacts (name, phone, idUsers) "
     . "VALUES ('$name', '$phone', $idUsers)";
/* SQL query execution */
$res = mysqli_query($conn, $sql);
if($res) echo "Data saved successfully.";
else echo mysqli_error($conn);

/* 
close MySQL connection */
mysqli_close($conn);
header('location: ../home.php');
?>