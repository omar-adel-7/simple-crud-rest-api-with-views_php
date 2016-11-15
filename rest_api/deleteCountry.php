<?php
//including the database connection file
include("../sql/DBOperations.php");
 


 // array for JSON response
$response = array();


//getting id of the data from url
$id = $_POST['id'];


 $dbOperationsObject = new DBOperations();
 $connection= $dbOperationsObject->deleteCountry($id); 

 

 // check if row deleted or not
    if (mysqli_affected_rows($connection) > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Country successfully deleted";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // no country found
        $response["success"] = 0;
        $response["message"] = "No country found";
 
        // echo no countries JSON
        echo json_encode($response);
    }


 
?>

