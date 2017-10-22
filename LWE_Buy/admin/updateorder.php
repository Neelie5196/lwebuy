<?php
require_once '../connection/config.php';

if(isset($_POST['oi_id']))
{    
    $order_id = $_POST['order_id'];
    $oi_id = $_POST['oi_id'];
    $ordercode = $_POST['ordercode'];
    $status = 'Pending';
    
	
	$result = mysql_query("UPDATE order_item SET order_code='$ordercode', statuss = '$status' WHERE oi_id = $oi_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='porderview.php?order_id=<?php echo $order_id; ?>&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='porderview.php?order_id=<?php echo $order_id; ?>&fail';
    </script>
    <?php
}
?>