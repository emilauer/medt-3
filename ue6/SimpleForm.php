<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		label {
			display: block;
		}
	</style>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<label><input type="radio" name="alter" value="cat1">< 10</label>
	<label><input type="radio" name="alter" value="cat2">11 - 20</label>
	<label><input type="radio" name="alter" value="cat3">21 - 30</label>
	<label><input type="radio" name="alter" value="cat4">31 - 40</label>
	<label><input type="radio" name="alter" value="cat5">41 - 50</label>
	<label><input type="radio" name="alter" value="cat6">> 50</label>
	<button type="submit" name="btnRadio">ok</button>
</form>

<?php 
	if (isset($_POST['alter'])) {
		echo "Alter:".$_POST['alter'];
	}
	
 ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<input type="checkbox" name="agb" value="agb"> AGB gelesen<br>
	<button type="submit" name="btnAGB" value"ok">ok</button>
</form>

<?php 
	if (isset($_POST['agb'])) {
		echo "AGB gelesen";
	}
	
 ?>


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<label><input type="checkbox" name="city[]" value="NYC"> New York City</label>
	<label><input type="checkbox" name="city[]" value="B"> Boston</label>
	<label><input type="checkbox" name="city[]" value="SF"> San Francisco</label>
	<label><input type="checkbox" name="city[]" value="DC"> Washington DC</label>
	<button type="submit" name="btnCheck" value"ok">ok</button>
</form>

<?php 
	if (isset($_POST['city'])) {
		echo "Ihre Auswahl: ";
		foreach ($_POST['city'] as $city) {
			echo "$city ";
		}
	}
	
 ?>

 <h3>Auswahllisten ohne multiple</h3>

 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<select size="3" name="auto1">
		<option>Audi</option>
		<option>BMW</option>
		<option>Opel</option>
		<option>VW</option>
		<option>Fiat</option>
	</select>
	<button type="submit" name="btnSelect1" value"ok">ok</button>
</form>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<select size="5" name="auto2">
		<option>Audi</option>
		<option>BMW</option>
		<option>Opel</option>
		<option>VW</option>
		<option>Fiat</option>
	</select>
	<button type="submit" name="btnSelect2" value"ok">ok</button>
</form>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<select size="1" name="auto3">
		<option>Audi</option>
		<option>BMW</option>
		<option>Opel</option>
		<option>VW</option>
		<option>Fiat</option>
	</select>
	<button type="submit" name="btnSelect3" value"ok">ok</button>
</form>

<?php 
	if (isset($_POST['auto1'])) {
		echo "Ihre Auswahl: ".($_POST['auto1']);
	}
	
?>
<?php 
	if (isset($_POST['auto2'])) {
		echo "Ihre Auswahl: ".($_POST['auto2']);
	}
	
?>
<?php 
	if (isset($_POST['auto3'])) {
		echo "Ihre Auswahl: ".($_POST['auto3']);
	}
	
?>

<h3>Auswahllisten mit multiple</h3>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<select size="5" name="auto4[]" multiple>
		<option value="audi">Audi</option>
		<option value="bmw">BMW</option>
		<option value="opel">Opel</option>
		<option value="vw">VW</option>
		<option value="fiat">Fiat</option>
	</select>
	<button type="submit" name="btnSelect4" value"ok">ok</button>
</form>

<?php 
	if (isset($_POST['auto4'])) {
		echo "Ihre Auswahl: ";
		foreach ($_POST['auto4'] as $asuto4) {
			echo "$asuto4 ";
		}
	}
	
?>


</body>
</html>