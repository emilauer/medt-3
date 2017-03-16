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
	span {
		color: #000;
	}
</style>

</head>
<body>
<?php 
	$host='localhost';
	$dbname='classicmodels';
	$user='htluser';
	$pwd='htluser';
	

	try{
		$db=new PDO ( "mysql:host=$host;dbname=$dbname", $user, $pwd);
	}catch(PDOException $e){
		exit("<h2 class=\"bg-danger\">System nicht verfügbar!</h2>");
	}
	

	//PDOStatement
	$res = $db->query ("SELECT * FROM customers");
	//Array
	$temp = $res->fetchAll(PDO::FETCH_ASSOC);
	

	/*

	if (isset($_GET['delete'])) {
		$deleteid=$_GET['delete'];
		$sql = "DELETE FROM project WHERE id=$deleteid";
		$res = $db->query($sql);
		if ($res->rowCount()) {
			setcookie("deletesuccess",true);
		}
		else {
			setcookie("deletesuccess",false);
		} 
		header("Location:".$_SERVER['PHP_SELF']);
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


	if (isset($_GET['submitbtn'])) {
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

	if (isset($_GET['closebtn'])) {
		setcookie("idid","");
		header("Location:".$_SERVER['PHP_SELF']); 
	}

	*/
?>





<?php

try {

    // Find out how many items are in the table
    $total = $db->query('
        SELECT
            COUNT(*)
        FROM
            customers
    ')->fetchColumn();

    // How many items to list per page
    $limit = 10;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page"><span class="glyphicon glyphicon-backward"></span></a> <a href="?page=' . ($page - 1) . '" title="Previous page"><span class="glyphicon glyphicon-triangle-left"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-backward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-triangle-left"></span></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page"><span class="glyphicon glyphicon-triangle-right"></span></a> <a href="?page=' . $pages . '" title="Last page"><span class="glyphicon glyphicon-forward"></span></a>' : '<span class="disabled"><span class="glyphicon glyphicon-forward"></span></span> <span class="disabled"><span class="glyphicon glyphicon-triangle-right"></span></span>';

    
    // Prepare the paged query
    $stmt = $db->prepare('
        SELECT
            *
        FROM
            customers
        ORDER BY
            customerName
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

?>





<div class="container">
<h1>Kundenübersicht</h1>
<table class="table table-hover table-bordered">
	<thead>
	  <tr>
        <th>Firma</th>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>PLZ</th>
        <th>Ort</th>
	  </tr>
	</thead>
	<tbody>
	<?php
		foreach ($iterator as $row) { ?>
			<tr>
				<td><?php echo htmlspecialchars($row['customerName']);?></td>
				<td><?php echo htmlspecialchars($row['contactLastName']);?></td>
				<td><?php echo htmlspecialchars($row['contactFirstName']);?></td>
				<td><?php echo htmlspecialchars($row['postalCode']);?></td>
				<td><?php echo htmlspecialchars($row['city']);?></td>
			</tr>
	<?php } ?>
	</tbody>
</table>

</div>

<?php

// Display the paging information
echo '<div id="paging" class="container" style="text-align: center"><p>', $prevlink, $page, $nextlink, ' </p></div>';


} else {
        echo '<p>No results could be displayed.</p>';
    }

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}
?>

</body>
</html>