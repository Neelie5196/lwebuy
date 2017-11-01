<?php
if (isset($_POST['name']) === true && empty($_POST['name']) === false) {
	require_once '../../connection/config.php';
	
	$query = mysql_query("
		SELECT warehouse.station_description
		FROM  warehouse
		WHERE warehouse.country_description ='". mysql_real_escape_string(trim($_POST['name']))."'
	");
	
	if (mysql_num_rows($query) == 0)
			echo "Not Found";
	else
	{
		$query = mysql_result($query,0);
		echo $query;
	}
	}

?>

