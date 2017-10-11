<?php
require_once '../connection/config.php';

if(isset($_POST['oi_id']))
{    
    $order_id = $_POST['order_id'];
    $oi_id = $_POST['oi_id'];
    $price = $_POST['price'];
    
	
	$result = mysql_query("UPDATE order_item SET price='$price' WHERE oi_id = $oi_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='orderview.php?order_id=<?php echo $order_id; ?>&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='orderview.php?order_id=<?php echo $order_id; ?>&fail';
    </script>
    <?php
}
?>