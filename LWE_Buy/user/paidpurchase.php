<?php
require_once '../connection/config.php';

if(isset($_POST['order_id']))
{    
    $order_id = $_POST['order_id'];
    $status = 'Paid';
    
	
	$result = mysql_query("UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Do Payment');
    window.location.href='purchaselist.php?&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Do Payment, Please try again');
    window.location.href='purchasepview.php?order_id=<?php echo $order_id; ?>&fail';
    </script>
    <?php
}
?>