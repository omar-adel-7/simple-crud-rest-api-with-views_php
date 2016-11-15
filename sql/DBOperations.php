<?php

include_once 'db.php';

 class DBOperations{
	
	public function __constructor(){
	}
	

	public function getAllCountries(){
		
		$com = new DbConnect();
		  $sql = "SELECT * FROM countries ORDER BY id ASC";			
          $result = mysqli_query($com->getDb(), $sql);

 
		return $result;
	}

	public function addCountry($name,$description){
		
		$com = new DbConnect();
	    $sql = "INSERT INTO countries(name,description) VALUES('$name','$description')";			
        $result = mysqli_query($com->getDb(), $sql);
        
	 
		return $result;
	}


	
 


	public function editCountry($id,$name,$description){
		
		$com = new DbConnect();
		  $sql = "UPDATE countries SET name='$name',description='$description'  WHERE id=$id";			
         $result = mysqli_query($com->getDb(), $sql);
	 
		return $result;
	}



	public function getCountryById($id){
		
		$com = new DbConnect();
	   $sql = "SELECT * FROM countries WHERE id=$id";			
      $result = mysqli_query($com->getDb(), $sql);
	 
		return $result;
	}


	public function deleteCountry($id){
		
		$com = new DbConnect();
		  $sql = "DELETE FROM countries WHERE id=$id";			
      $result = mysqli_query($com->getDb(), $sql);
 

		 
		return $com->getDb();
	}



 
}