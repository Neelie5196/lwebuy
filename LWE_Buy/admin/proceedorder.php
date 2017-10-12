<?php
require_once '../connection/config.php';

if(isset($_POST['ordercode']))
{    
    $ordercode = $_POST['ordercode'];
    $order_id = $_POST['order_id'];
    $status = 'Proceed';
    
	
	$result = mysql_query("UPDATE order_list SET status='$status', order_code='$ordercode', datetime=NOW() WHERE ol_id = $order_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='orderpending.php?&success';
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