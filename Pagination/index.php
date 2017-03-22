<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>

	<body>
		<div class = "container">
		<h2>Kundenübersicht</h2>
			<?php

				$host = 'localhost';
				$database = 'classicmodels';
				$user ='htluser';
				$pwd = 'htluser';

				try
				{
					$db = new PDO ("mysql:host=$host;dbname=$database", $user, $pwd);
				}catch(PDOException $e){
					exit("<h3 class=\"bg-danger\">Nicht verfügbar!</h3>");
				}

				$db->query("SET NAMES 'utf8'");

				$sql = $db->query ("SELECT `customerName`, `contactLastName`, `contactFirstName`, `postalCode`, `city` FROM `customers`");
				$temp = $sql->fetchAll(PDO::FETCH_ASSOC);


			

			    $startval;
			    $addval=20;
			    if(isset($_GET['page']))
			    {
			    	$startval=$_GET['page']*20;
			    }	
			    else  
			    {
			    	$startval=0;
			    }
			    $res=$db->query ( "SELECT customerName, contactLastName, contactFirstName, postalCode, city FROM customers LIMIT $startval,$addval" );
			    $tmp=$res->fetchAll(PDO::FETCH_OBJ);
			?>

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
					foreach ($tmp as $row) 
					{
						?>
							<tr>
								<td><?php echo $row->customerName;?></td>
					            <td><?php echo $row->contactLastName;?></td>
					            <td><?php echo $row->contactFirstName;?></td>
					            <td><?php echo $row->postalCode;?></td>
								<td><?php echo $row->city;?></td>
							</tr>
						<?php
					}
				?>
				</tbody>
			</table>

			<div class = "nav" style="text-align: center;">
				<nav aria-label="Page navigation">
			        <ul class="pagination">
			            <li>
			                <a href="index.php?page=0" aria-label="First">
			                	<span aria-hidden="true">&laquo;</span>
			                </a>
			            </li>

			            <li>
			                <?php
			                if(isset($_GET['page']))
			                { 
			                	if(($_GET['page'])!=0) 
			                	{
				                    echo '<a href="index.php?page='.(($_GET['page'])-1).'" aria-label="Previous">';
				                    echo '<span aria-hidden="true">&lt;</span>';
				                    echo '</a>'; 
				                }
				                if(($_GET['page'])==0)
				                {
				                    echo '<a href="index.php?page=0" aria-label="Previous">';
				                    echo '<span aria-hidden="true">&lt;</span>';
				                    echo '</a>'; 
				                }
			                }
			                else 
			                {
			                    echo '<a href="index.php?page=0" aria-label="Previous">'; ?>
			                        <span aria-hidden="true">&lt;</span>
			                    </a>
			                <?php 
			            	}
			                ?>
				        </li>

				        <?php
				            $countselect=$db->query ( "SELECT COUNT(customerNumber) FROM customers" );
				            $tmp=$countselect->fetchColumn();
				            $numpages=$tmp/20;
				            $numpages=intval($numpages);

				            for($i=0;$i<$numpages+1;$i++)
				            {
				                $active=false;
				                $displaynum=$i+1;
				                if(isset($_GET['page']))
				                {
				                    if($i==$_GET['page'])
				                    {
				                        $active=true;
				                    }
				                }
				                if($active==false)
				                {
				                    echo '<li><a href="index.php?page='.$i.'">'.$displaynum.'</a></li>';
				                }
				                else
				                {
				                    echo '<li class="active"><a href="index.php?page='.$i.'">'.$displaynum.'</a></li>';
				                }
				                $lapage=$i;
				            }
				            ?>

				            <li>
				                <?php
				                if(isset($_GET['page']))
				                { 
				                	if($_GET['page']!=$lapage)
				                	{
				                    echo '<a href="index.php?page='.(($_GET['page'])+1).'" aria-label="Next">';
				                    echo '<span aria-hidden="true">&gt;</span>';
				                    echo '</a>';
				                	}
					                if($_GET['page']==$lapage)
					                {
					                    echo '<a href="index.php?page='.$_GET['page'].'" aria-label="Next">';
					                    echo '<span aria-hidden="true">&gt;</span>';
					                    echo '</a>';
					                }
					            }
				                else 
				                {
				                    echo '<a href="index.php?page=1" aria-label="Next">'; ?>
				                        <span aria-hidden="true">&gt;</span>
				                    </a>
				                <?php 
				            	}
				                ?>
				            </li>

				            <li>
				                <?php echo '<a href="index.php?page='.$lapage.'" aria-label="Last">'; ?>
				                    <span aria-hidden="true">&raquo;</span>
				                </a>
				            </li>
			        </ul>
				</nav>
			</div>
		</div>
	</body>
</html>