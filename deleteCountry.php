<?php
//including the database connection file
include("/sql/DBOperations.php");

//getting id of the data from url
$id = $_GET['id'];


 $dbOperationsObject = new DBOperations();
  $dbOperationsObject->deleteCountry($id); 

 

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

