<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
	.btn {
		background-color: #fff;
		border: 1px solid #ddd;
	}
	.btn:hover {
		background-color: #f2f2f2;
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
		exit("<h2 class=\"bg-danger\">System nicht verfügbar!<br><br>$e</h2>");
	}
	

	//PDOStatement
	$res = $db->query("SELECT * FROM project");
	//Array
	$temp = $res->fetchAll(PDO::FETCH_ASSOC);
	

	if (isset($_GET['delete'])) {
		$deleteid=$_GET['delete'];
		$sql = "DELETE FROM project WHERE id=$deleteid";
		$res = $db->query($sql);
		header("Location:".$_SERVER['PHP_SELF']);
		if ($res->rowCount()) {
			setcookie("deletesuccess",true);
		}
		else {
			setcookie("deletesuccess",false);
		} 
	}

	if (isset($_COOKIE['deletesuccess'])) {
		if ($_COOKIE['deletesuccess'] == true) {
			echo '<div class="alert alert-success" role="alert">Löschvorgang erfolgreich!</div>';
			setcookie("deletesuccess","");
		}
		else {
			echo '<div class="alert alert-success" role="alert">Löschvorgang fehlgeschlagen!</div>';
			setcookie("deletesuccess","");
		}
	}


	if (isset($_GET['edit'])) {
		$editid = $_GET['edit'];
		setcookie("idid",$editid);

		$sql= "SELECT name, description, createDate FROM project WHERE id = $editid";
		$res = $db->query($sql);
		$projectdata=$res->fetch(\PDO::FETCH_ASSOC);
	}


	if (isset($_GET['updatebtn'])) {
		$pid=$_COOKIE['idid'];
		$sql = "UPDATE project SET name=:name, description=:description, createDate=:createDate WHERE id=$pid";
		$stmt = $db->prepare($sql);
			$stmt->bindParam(':name', $_GET['name'], PDO::PARAM_STR); 
			$stmt->bindParam(':description', $_GET['description'], PDO::PARAM_STR);
			$stmt->bindParam(':createDate', $_GET['createDate'], PDO::PARAM_STR);
		$stmt->execute();
		setcookie("idid","");
		header("Location:".$_SERVER['PHP_SELF']);   
	}

	if (isset($_GET['createbtn'])) {
		$sql = "INSERT INTO project (name, description, createDate) VALUES (:newname, :newdescription, :newcreateDate)";
		$stmt = $db->prepare($sql);
			$stmt->bindParam(':newname', $_GET['name'], PDO::PARAM_STR); 
			$stmt->bindParam(':newdescription', $_GET['description'], PDO::PARAM_STR);
			$stmt->bindParam(':newcreateDate', $_GET['createDate'], PDO::PARAM_STR);
		$stmt->execute();
		setcookie("createsuccess",true);
		header("Location:".$_SERVER['PHP_SELF']);
	}

	if (isset($_COOKIE['createsuccess'])) {
		echo '<div class="alert alert-success" role="alert">Projekt wurde erstellt</div>'; 
		setcookie("createsuccess","");
	}

	if (isset($_GET['closebtn'])) {
		setcookie("idid","");
		header("Location:".$_SERVER['PHP_SELF']); 
	}
?>
<div class="container" style="float:left;">
<h1>Projektübersicht</h1>
<table class="table table-hover table-bordered" style="margin-bottom: 10px;">
	<thead>
	  <tr style="background-color: #000; color: #fff;">
        <th>Name</th>
        <th>Beschreibung</th>
        <th>Datum</th>
        <th>Operationen</th>
	  </tr>
	</thead>
	<tbody>
	<?php
		foreach ($temp as $row) { ?>
			<tr>
				<td><?php echo htmlspecialchars($row['name']);?></td>
				<td><?php echo htmlspecialchars($row['description']);?></td>
				<td><?php echo htmlspecialchars($row['createDate']);?></td>
                <td>
                	<a href="dbAccess.php?edit=<?php echo $row['id']; ?>&modal=open"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="dbAccess.php?delete=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
			</tr>
	<?php } ?>
	</tbody>
</table>
<a href="dbAccess.php?new=true"><button type="button" class="btn" aria-label="Left Align">
  <span class="glyphicon glyphicon-plus" aria-hidden="true" style="margin:0px;"></span>
</button></a>

<?php  
if (isset($_GET['edit'])) {
	$name=$projectdata['name'];
	$description=$projectdata['description'];
	$date=$projectdata['createDate'];
 } else {
 	$name="";
 	$description="";
 	$date="";
 }
?>

<div id="myModal" class="modal fade myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<form>
        	<button type="submit" class="close" name="closebtn" value="close">&times;</button>
        </form>
        <h4 class="modal-title">
        	<?php
        		if (isset($_GET['edit'])) {
        		  	echo "Projekt "; 
		        	print_r($projectdata['name']);
		        	echo " bearbeiten";
        		} else {
        			echo "Neues Projekt";
        		}
	        ?>
        </h4>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label class="control-label">Name</label>
        		<?php
        			 echo '<input type="text" class="form-control" name="name" value="'.$name.'">';
        		?>
        	</div>
        	<div class="form-group">
        		<label class="control-label">Beschreibung</label>
        		<?php
        			 echo '<input type="text" class="form-control" name="description" value="'.$description.'">';
        		?>
        	</div>
        	<div class="form-group">
        		<label class="control-label">Datum</label>
        		<?php
        			 echo '<input type="text" class="form-control" name="createDate" value="'.$date.'">';
        		?>
        	</div>
        	<div style="float:right;">
        	<?php  
        		if (isset($_GET['edit'])) {
        			echo '<button type="submit" class="btn btn-default" name="updatebtn" value="confirm">Aktualisieren</button>';
        		}
        		else {
        			echo '<button type="submit" class="btn btn-default" name="createbtn" value="confirm">Erstellen</button>';
        		}
        	?>
        	<button type="submit" class="btn btn-default" name="closebtn" value="close">Abbrechen</button>
        	</div>
        	<div style="clear:both;"></div>
        </form>
      </div>
  </div>
</div>

<?php  

if (isset($_GET['modal']) || isset($_GET['new'])) {
	echo "<script>$(\"#myModal\").modal('show')</script>";
}

?>

</div>
</div>
</body>
</html>