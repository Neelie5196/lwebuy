<?php
require_once '../connection/config.php';
session_start();

if(isset($_POST['submit']))
{    
    $s_id = $_POST['s_id'];
    $status = 'Request';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../resources/img/receipts/";
    
    $user_id = $_SESSION['user_id'];
    $title = $_POST['s_id'];
    $pay = 'Pay Shipping';
    $amount = $_POST['amount'];
    $statuss = 'Waiting for Proceed';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	$result = mysql_query("UPDATE shipping SET status='$status' WHERE s_id = $s_id ") or die(mysql_error());
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO payment(user_id,datetime,title,amount,file,type,status,from_shipping) VALUES('$user_id', NOW(), '$pay $title', '$amount', '$final_file', '$file_type', '$statuss', '$s_id')";
		mysql_query($sql);
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='shippinglist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Submit, please try again!!');
        window.location.href='shippingpp.php?fail';
        </script>
		<?php
	}
}


if(isset($_POST['pay']))
{    
    $s_id = $_POST['s_id'];
    $status = 'Request';
    
    $user_id = $_SESSION['user_id'];
    $point = $_POST['point'];
    $paypoint = $_POST['paypoint'];
    $title = 'Pay by';
    $points = 'Points';
    $statuss = 'Waiting for Proceed';

	if($point >= $paypoint)
	{
        $result = mysql_query("UPDATE shipping SET status='$status' WHERE s_id = $s_id ") or die(mysql_error());
        $result1 = mysql_query("UPDATE point SET point= point - '$paypoint' WHERE user_id = $user_id ") or die(mysql_error());
		$result2 = mysql_query("INSERT INTO payment SET user_id='$user_id', datetime=NOW(), title='$title $points', file='$paypoint $points', status='$statuss', from_shipping='$s_id'") or die(mysql_error());
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='shippinglist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Please Reload before pay again, Thank you..');
        window.location.href='shippingpp.php?fail';
        </script>
		<?php
	}
}

?>