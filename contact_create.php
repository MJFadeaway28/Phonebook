<?php 
  require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create New Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
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
      a:link{
        text-decoration: none;
      }
  </style>
</head>
<body>  

<div class="container">
  <div class="col-md-3 col-sm-2"></div>
  <div class="well well-lg col-md-6 col-sm-8" id="box1">
    <h3 id="title1"><b>Create New Contact</b></h3><br>
    <form action="includes/contact_insert.inc.php" method="POST">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="name" type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
            <input id="phone" type="tel" class="form-control" name="phone" placeholder="Phone" required>
        </div>
        
        <br>
        <button class="btn"><a href="home.php">Cancel</a></button>
        <button id="bt1" type="submit" class="btn btn-success"><b>Submit</b></button>
    </form>

  </div>
</div>

</body>
</html>