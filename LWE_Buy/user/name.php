<?php
require_once '../connection/config.php';

if (isset($_POST['name']) === true && empty($_POST['name']) === false) {
	
	
    $name = $_POST['name'];
    
    $query = "SELECT * 
              FROM  warehouse
		      WHERE country_description ='$name'";
    $result = mysqli_query($con, $query);
    $results = mysqli_fetch_assoc($result);
    
	
	if ($results > 0){
        $query = $results['station_description'];
        echo $query;
    }
	else
	{
		echo 'Not Found';
		
	}
}

?>

