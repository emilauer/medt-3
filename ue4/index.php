<html>
<head>
<meta charset="utf-8">
	<title>PHP Demo</title>
	<style type="text/css">
		* {
			font-family: sans-serif;
		}
	</style>
</head>
<body>

	<h1>Einfache Textausgabe mit echo</h1>
	<h2>Hi</h2>
	<?php echo "<h2>Hello World 1</h2>";?>
	<h2>
	<?php echo "Hello \"World\" 2";?>
	</h2>
	<h2>
	<?php echo "Hello";?>
	<?php echo " World 3";?>
	</h2>
	<h2>
	<?php echo 'Hello "World" 4'; // As it is ?>
	</h2>

	<h1> Textausgabe mit echo und Variablen</h1>
	<?php
	$myString1="Hello ";
	$myString2="World";
	$myInt=12;
	$my_int2=123;
	$myBool=false;
	$myBool=FALSE;
	$myBool=0;

	echo "<p>String1: ".$myString1."</p>";
	echo "<p>String1 und 2: ".$myString1.$myString2."</p>";

	echo "<p style=\"color: red\">String1: $myString1</p>";
	echo "<p>String1 und 2: $myString1 $myString2</p>";

	echo '<p style="color: red">String1: $myString1</p>';

	echo '<p style="color: red">String1: '.$myString1.'</p>';
	?>

	<h1>Kontrollstrukturen</h1>
	<?php
		$myBool=true;
		if($myBool)
			echo "<p>Yes, it is!</p>";
		else
			echo "<p>No, it isn't!</p>";
	?>

	<h2>Loops in Kombination mit Arrays!</h2>
	<?php
		$myArray1 = array('Home', 'Products', 'About');
		$myArray2 = ['Home', 'Products', 'About'];

		echo "<ul>";
		foreach ($myArray1 as $item) {
			echo "<li>$item</li>";
		}
		echo "</ul>";

		echo "<ul>";
		for ($i=0; $i<sizeof($myArray2); $i++) 
			echo "<li>".$myArray2[$i]."</li>";
		echo "</ul>";
	?>

	<h2>Assoziative Arrays</h2>
	<?php
		//             Key   value   Key   value
		$myGETArray = ["vn"=>"Emil", "nn"=>"Auer", "submitBtn"=>"Anmelden"];
		// Mit dem Key kann man den Wert auslesen!
		if (isset($myGETArray['submitBtn'])) {
			echo "<p>Button: ".$myGETArray['submitBtn']."</p>";
			echo "<p>Vorname: ".$myGETArray['vn']."</p>";
			echo "<p>Nachname: ".$myGETArray['nn']."</p>";
			echo "<ul>";
			foreach ($myGETArray as $item) {
				echo "<li>".$item."</li>";
			}
			echo "</ul>";
		}
	?>


</body>
</html>