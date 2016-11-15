<?php
//including the database connection file
 include("/sql/DBOperations.php");


if (isset($_POST['name']) && isset($_POST['desc']) ) 
{
	$name = $_POST['name'];
	$desc = $_POST['desc'];
 		
	// checking empty fields
	if(empty($name) || empty($desc) ) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($desc)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		 
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
	 
 $dbOperationsObject = new DBOperations();
  $result= $dbOperationsObject->addCountry($name,$desc); 

		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}

}
?>


 

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form action="" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="desc"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit"  value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

