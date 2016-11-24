<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	li:nth-child(odd) {
		background-color: #ddd;
	}
	ul.list-group {
		max-width: 100px;
	}
	li {
		max-width: 300px;
	}
	input {
		margin-bottom: 10px;
	}
</style>

</head>
<body>

<div class="container">
<h1>Beispiel 1</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<label for="eingabe">Ihre Eingabe</label>
<input type="text" id="eingabe" name="eingabe">
<br>
<button type="submit" id="btnExpl" name="btnExpl" value="btnExpl" class="btn btn-default">Explode</button>
<button type="submit" class="btn btn-default" onclick="eingabe.value=" " ">Reset</button>
</form>

<br>

<?php 
	if (isset($_POST['btnExpl']) && isset($_POST['eingabe'])) {
		$teil = explode(" ", $_POST['eingabe']);
		echo "<p>Ihre Eingabe als Liste: </p";
		echo "<ul class=\"list-group\">";
		foreach ($teil as $t) {
			echo "<li class=\"list-group-item\">".$t."</li>";
		}
		echo "</ul>";
		$teil = "";
	}
 ?>
</div>

</body>
</html>