<?php
require_once '../connection/config.php';

if(isset($_POST['order_id']))
{
    $order_id = $_POST['order_id'];
    $p_id = $_POST['p_id'];
    $status = 'Proceed';
    $statuss = 'Completed';
    
	
	$result = mysql_query("UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysql_error());
    $result1 = mysql_query("UPDATE payment SET status = '$statuss' WHERE p_id = $p_id ") or die(mysql_error());
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