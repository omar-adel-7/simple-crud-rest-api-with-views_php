<?php
//including the database connection file
include("/sql/DBOperations.php");
  
 $dbOperationsObject = new DBOperations();
 $result= $dbOperationsObject->getAllCountries(); 
 
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="addCountry.php">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Description</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['description']."</td>";
		echo "<td><a href=\"editCountry.php?id=$res[id]\">Edit</a> | <a href=\"deleteCountry.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
