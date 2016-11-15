<?php

// array for JSON response
$response = array();

// including the database connection file
include_once("../sql/DBOperations.php");

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['desc'])) 
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$desc=$_POST['desc'];
 	 


 $dbOperationsObject = new DBOperations();
  $result= $dbOperationsObject->editCountry($id,$name,$desc); 

		 
 // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Country successfully updated.";
 
        // echoing JSON response
        echo json_encode($response);
    } 

    else {

      $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
     // echoing JSON response
    echo json_encode($response);
    }


	}

	else {
 
   // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
 
 
}


?>
 
