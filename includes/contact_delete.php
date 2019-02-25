<?php

include "dbh.inc.php";

$id = $_GET['id'];

$sql = "DELETE FROM contacts WHERE id = '$id'";

$res = mysqli_query($conn, $sql);

mysqli_close($conn);

header('location: ../home.php');
exit;