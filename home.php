<?php 
	require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
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
	    #bt {
	        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	        border-collapse: collapse;
	        width: 100%;
	    }

	    #bt td, #bt th {
	        border: 1px solid #ddd;
	        padding: 8px;
	    }

	    #bt tr{background-color: white;}

	    #bt tr:hover {background-color: #ddd;}

	    #bt th {
	        padding-top: 12px;
	        padding-bottom: 12px;
	        text-align: center;
	        background-color: #38007c;
	        color: white;
	    }
 	</style>
</head>
<body>

<div class="container">
	<div class="col-md-1 col-sm-1"></div>
			
	<div class="well well-lg col-md-10 col-sm-10" id="box1">
		<div class="row">
			<div class="col-md-1 col-sm-1">
			  	<form action="contact_create.php">
					<button type="submit" class="btn btn-success">Add New Contact</button>
				</form>
			</div>
		</div>

		<table id="bt">
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

<?php

include "includes/dbh.inc.php";
$userId = $_SESSION['userId'];
$sql = "SELECT id, name, phone FROM contacts JOIN users WHERE contacts.idUsers = $userId AND users.idUsers = $userId ORDER BY name ASC";
$res = mysqli_query($conn, $sql);
while($line = mysqli_fetch_array($res)) {
	$id = $line['id'];
	echo "<tr>";

	echo "<td><center>" . $line['name'] . "</center></td>";
	echo "<td><center>" . $line['phone'] . "</center></td>";
	echo '<td><a href="contact_edit.php?id='.$id.'" title="Update Contact"><center><span class="glyphicon glyphicon-pencil"></span></center></a></td>';
	echo '<td><a href="includes/contact_delete.php?id='.$id.'" title="Remove Contact"><center><span class="glyphicon glyphicon-remove"></span></center></a></td>';  
	echo '<div class="input-group">';
                echo '<input type="hidden" class="form-control" name="userId" value="'. $userId .'" >';
        echo '</div>';
	echo "<tr>";
}
mysqli_close($conn);
?>
			</tr>
		</table>
	</div>
</div>

</body>
</html>