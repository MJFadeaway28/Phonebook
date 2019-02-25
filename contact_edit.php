<?php 
  require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      body{
          background-image: url("background.png");
          background-size: 1366px 768px;
      }
      #box1{
          margin-top: 5%;
      }
      #title1{
          text-align: center;
      }
      #bt1{
          color: white;
      }
  </style>
</head>
<body> 

<div class="container">
  <div class="col-md-3 col-sm-2"></div>
  <div class="well well-lg col-md-6 col-sm-8" id="box1">
    <h3 id="title1"><b>Update Contact</b></h3><br>
    <form action="includes/contact_update.php" method="POST">

<?php

include "includes/dbh.inc.php";

$id = $_GET['id'];

$sql = "SELECT name, phone FROM contacts WHERE id = $id " ;
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);

$name = $row['name'];
$phone = $row['phone'];

        echo '<div class="input-group">';
            echo '<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>';
            echo '<input id="nama" type="text" class="form-control" name="name" value="'. $name .'" required>';
        echo '</div>';
        echo '<br>';
        echo '<div class="input-group">';
            echo '<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>';
            echo '<input id="phone" type="tel" class="form-control" name="phone" value="'. $phone .'" required>';
        echo '</div>';
        echo '<br>';
        echo '<div class="input-group">';
                echo '<input type="hidden" class="form-control" name="id" value="'. $id .'" >';
        echo '</div>';
?>
        <button id="bt1" type="submit" class="btn btn-success"><b>Update</b></button>
    </form>

  </div>
</div>

</body>
</html>