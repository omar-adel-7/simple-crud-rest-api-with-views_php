<?php
//including the database connection file
include("../sql/DBOperations.php");

// array for JSON response
$response = array();

 $dbOperationsObject = new DBOperations();
 $result= $dbOperationsObject->getAllCountries(); 

 

 // check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // countries node
    $response["countries"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
         $country = array();
        $country["id"] = $row["id"];
        $country["name"] = $row["name"];
        $country["desc"] = $row["description"];
  
        // push single country into final response array
        array_push($response["countries"], $country);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no countries found
    $response["success"] = 0;
    $response["message"] = "No countries found";
 
    
    echo json_encode($response);
}


?>

