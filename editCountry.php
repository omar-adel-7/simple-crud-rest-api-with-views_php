<?php
// including the database connection file
include_once("/sql/DBOperations.php");

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['desc'])) 
 {	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$desc=$_POST['desc'];
 	
	// checking empty fields
	if(empty($name) || empty($desc)  ) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($desc)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		 	
	} else {	
		//updating the table

   $dbOperationsObject = new DBOperations();
   $result= $dbOperationsObject->editCountry($id,$name,$desc); 
 

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}

?>
<?php

include_once("/sql/DBOperations.php");

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id


 $dbOperationsObject = new DBOperations();
  $result= $dbOperationsObject->getCountryById($id); 

		

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$desc = $res['description'];
 }
?>

<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>Link</td>
				<td><input type="text" name="desc" value=<?php echo $desc;?>></td>
			</tr>
		
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit"  value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
