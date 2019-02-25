<?php

include "dbh.inc.php";

$id = $_POST['id'];
$name  = $_POST['name'];
$phone   = $_POST['phone'];


$sql = "UPDATE contacts SET name = '$name', phone = '$phone' WHERE id = $id ";

$res = mysqli_query($conn, $sql);

mysqli_close($conn);

header('location: ../home.php');
exit;