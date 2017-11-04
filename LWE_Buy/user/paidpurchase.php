<?php
require_once '../connection/config.php';
session_start();

if(isset($_POST['submit']))
{    
    $order_id = $_POST['order_id'];
    $status = 'Paid';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../resources/img/receipts/";
    
    $user_id = $_SESSION['user_id'];
    $title = $_POST['order_id'];
    $pay = 'Pay Order';
    $amount = $_POST['amount'];
    $statuss = 'Waiting for Proceed';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	$result = mysql_query("UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysql_error());
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO payment(user_id,datetime,title,amount,file,type,status,from_order) VALUES('$user_id', NOW(), '$pay $title', '$amount', '$final_file', '$file_type', '$statuss', '$order_id')";
		mysql_query($sql);
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='purchaselist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Submit, please try again!!');
        window.location.href='purchaselist.php?order_id=<?php echo $order_id; ?>&fail';
        </script>
		<?php
	}
}


if(isset($_POST['pay']))
{    
    $order_id = $_POST['order_id'];
    $status = 'Paid';
    
    $user_id = $_SESSION['user_id'];
    $point = $_POST['point'];
    $paypoint = $_POST['paypoint'];
    $title = 'Pay by';
    $points = 'Points';
    $statuss = 'Waiting for Proceed';

	if($point >= $paypoint)
	{
        $result = mysql_query("UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysql_error());
        $result1 = mysql_query("UPDATE point SET point= point - '$paypoint' WHERE user_id = $user_id ") or die(mysql_error());
		$result2 = mysql_query("INSERT INTO payment SET user_id='$user_id', datetime=NOW(), title='$title $points', file='$paypoint $points', status='$statuss', from_order='$order_id'") or die(mysql_error());
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='purchaselist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Please Reload before pay again, Thank you..');
        window.location.href='purchaselist.php?order_id=<?php echo $order_id; ?>&fail';
        </script>
		<?php
	}
}

?>