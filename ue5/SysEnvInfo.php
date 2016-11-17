<!DOCTYPE html>
<html>
<head>
	<title>Server Befehle</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h2>$_SERVER im Überblick</h2>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Variable</th>
        <th>Wert</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Skript Pfad</td>
        <td>
        	<?php 
        		echo $_SERVER['SCRIPT_FILENAME']; 
    		?>
		</td>
      </tr>
      <tr>
        <td>Server-Name / IP</td>
        <td>
        	<?php 
        		echo $_SERVER['SERVER_ADDR']; 
    		?>
        </td>
      </tr>
      <tr>
        <td>Protokoll</td>
        <td>
        	<?php 
        		echo $_SERVER['SERVER_PROTOCOL']; 
    		?>
        </td>
      </tr>
      <tr>
        <td>Client-IP</td>
        <td>
        	<?php 
        		echo $_SERVER['REMOTE_ADDR']; 
    		?>
        </td>
      </tr>
      <tr>
        <td>URI</td>
        <td>
        	<?php 
        		echo $_SERVER['REQUEST_URI']; 
    		?>
        </td>
      </tr>
      <tr>
        <td>Server-Info</td>
        <td>
        	<?php 
        		echo $_SERVER['SERVER_SIGNATURE']; 
    		?>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>