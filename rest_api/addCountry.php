
<?php
 
 
// array for JSON response
$response = array();

 
 include("../sql/DBOperations.php");


if (isset($_POST['name']) && isset($_POST['desc']) ) 

{
	$name = $_POST['name'];
	$desc = $_POST['desc'];
 		
	 
	 
 $dbOperationsObject = new DBOperations();
  $result= $dbOperationsObject->addCountry($name,$desc); 

		
		// check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Country successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}

?>
