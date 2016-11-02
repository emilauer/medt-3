<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Demo 1</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			padding: 20px;
		}
		.anmeldekasterl {
			float: left;
			padding: 0;
			margin: 0;
		}
		.form-control {
			max-width: 200px;
		}
	</style>

</head>
<body>


<?php
	if(isset($_GET['submitBtn'])) {
		print_r($_GET);
		echo "<p style=\"color:".$_GET['tf']."\">Vorname: ".$_GET['vn']."<br>";
		echo "<p style=\"color:".$_GET['tf']."\">Nachname: ".$_GET['nn'];
	}	
?>

<br>



<div class="container anmeldekasterl">

	<h4>Anmeldedaten eingeben</h4>

	<form action="http://localhost/medt/ue4/form1.php">

  		<div class="form-group">
		    <label for="text">Vorname:</label>
		    <input type="name" class="form-control" name="vn">
  		</div>

  		<div class="form-group">
    		<label for="text">Nachname:</label>
   			<input type="name" class="form-control" name="nn">
  		</div>

  		<div class="form-group">
    		<label for="text">Textfarbe:</label>
   			<input type="text" class="form-control" name="tf">
  		</div>

  		<div class="checkbox">
    		<label><input type="checkbox"> Anmeldedaten merken</label>
  		</div>

 		<button type="submit" class="btn btn-default" name="submitBtn" value="Anmelden">
 			Anmelden
		</button>

	</form>

</div>

</body>
</html>

<!--
     HÜ: schönes formula mit bootstrap
     