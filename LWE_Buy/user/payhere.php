<?php
require_once '../connection/config.php';


if(isset($_POST["name"]))
{    
	$user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
	$details = $_POST['details'];
	$status = $_POST['status'];
	$user_name = $_POST['user_name'];
	
	$result = mysql_query("INSERT INTO paypack SET user_id ='$user_id', name='$name', price='$price', details='$details', time=now(), status='$status',user_name='$user_name'") or die(mysql_error());
    ?>
    <script>
    alert('Submit Completed!');
    window.location.href='dashboard.php?success';
	
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error, Please try again');
    window.location.href='package.php?fail';
    </script>
    <?php

}
?>