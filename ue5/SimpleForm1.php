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
		.anmeldekasterl {
			padding: 10px;
			width: 100%;
			min-width: 220px;
		}
		.form-control {
			max-width: 200px;
			min-width: 200px;
		}
		.anmeldeinfo {
			padding: 10px;
			width: 100%;
		}
		.panel {
			max-width: 200px;
			min-width: 200px;
			background-color: #d9edf7;
		}
		.panel .btn {
			margin-top: 10px;
		}
	</style>

</head>
<body>

<div class="row">

	<div class="col-md-3">

		<div class="container anmeldekasterl">

			<h4>Anmeldedaten eingeben</h4>

			<form action="http://localhost/medt-3/ue5/SimpleForm1.php">

		  		<div class="form-group">
				    <label for="text">Vorname</label>
				    <input type="name" class="form-control" name="vn">
		  		</div>

		  		<div class="form-group">
		    		<label for="text">Nachname</label>
		   			<input type="name" class="form-control" name="nn">
		  		</div>

		  		<div class="form-group">
		    		<label for="email">Email</label>
		   			<input type="email" class="form-control" name="em">
		  		</div>

		  		<div class="checkbox">
		    		<label><input type="checkbox"> Anmeldedaten merken</label>
		  		</div>

		 		<button type="submit" class="btn btn-default" name="submitBtn" value="Anmelden">
		 			Anmelden
				</button>

			</form>

		</div>

	</div>

	<div class="col-md-3">

		<div class="container anmeldeinfo">

		<div class="panel panel-primary">
		 	<div class="panel-heading">
				<h3 class="panel-title">Anmeldeinformationen</h3>
		  	</div>
		  	<div class="panel-body">
		    	<?php
	    			echo "<p><strong>Vorname</strong>";
	    			if (isset($_GET['submitBtn'])) {
						echo "<br>".$_GET['vn'];
					}
					echo "<p><strong>Nachname</strong>";
	    			if (isset($_GET['submitBtn'])) {
						echo "<br>".$_GET['nn'];
					}
					echo "<p><strong>Email</strong>";
	    			if (isset($_GET['submitBtn'])) {
						echo "<br>".$_GET['em'];
		    		}
						
				?>
		  		<!--<button class="btn btn-primary" type="submit">Bestätigen</button>-->
		  	</div>
		</div>

		</div>

	</div>


</div>



</body>
</html>