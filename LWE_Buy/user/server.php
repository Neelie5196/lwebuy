<?php
    require_once '../connection/config.php';
	$keyword = $_POST['query'];
	$search_param = "{$keyword}%";
    
    $query = "SELECT * FROM warehouse WHERE country_description LIKE ''";
    $result = mysqli_query($con, $query);
    
	$sql = $con->prepare("SELECT * FROM warehouse WHERE country_description LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $countryResult[] = $row["country_description"];
        }
        echo json_encode($countryResult);
    }

?>

