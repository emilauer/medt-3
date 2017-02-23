<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
	span.glyphicon {
		margin-right: 10px;
		color: #000;
	}
	a {
		text-decoration: none;

	}
</style>


</head>
<body>
<?php 
	$host='localhost';
	$dbname='medt3';
	$user='htluser';
	$pwd='htluser';
	try{
		$db=new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
	}catch(PDOException $e){
		exit("<h2 class=\"bg-danger\">System nicht verfügbar!</h2>");
	}
	//PDOStatement
	$res = $db->query ("SELECT * FROM project");
	//Array
	$temp = $res->fetchAll(PDO::FETCH_ASSOC);
	if (isset($_GET['delete'])) {
		$deleteid=$_GET['delete'];
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM project WHERE id=$deleteid";
		$db->exec($sql);
		header("Location:".$_SERVER['PHP_SELF']); 
	}
?>
<div class="container">
<h1>Projektübersicht</h1>
<table class="table table-hover">
	<thead>
	  <tr>
        <th>Name</th>
        <th>Beschreibung</th>
        <th>Datum</th>
        <th>Operationen</th>
	  </tr>
	</thead>
	<form action="<?php $_SERVER['PHP_SELF']?>">
	<tbody>
	<?php
		foreach ($temp as $row) { ?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['createDate'];?></td>
                <td>
                	<a href="dbAccess.php?edit=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="dbAccess.php?delete=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
			</tr>
	<?php } ?>
	</tbody>
	</form>
</table>
</div>
</body>
</html>