<?php
require_once '../connection/config.php';
session_start();

if(isset($_POST['transaction']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../resources/img/receipts/";
    
    $user_id = $_SESSION['user_id'];
    $title = $_POST['reloadamt'];
    $reload = 'Reload';
    $point = 'Point';
    $amount = $_POST['amount'];
    $status = 'Waiting for Approve';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO payment(user_id,datetime,title,amount,file,type,status) VALUES('$user_id', NOW(), '$reload $title $point', '$amount', '$final_file', '$file_type', '$status')";
		mysql_query($sql);
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='dashboard.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Submit, please try again!!');
        window.location.href='dashboard.php?fail';
        </script>
		<?php
	}
}
?>