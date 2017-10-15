<?php

require_once '../connection/config.php';

if (isset($_GET['oi_id']))

{
    $order_id = $_GET['order_id'];
    $oi_id = $_GET['oi_id'];
    $price = $_GET['price'];
    

    $result = mysql_query("DELETE FROM order_item WHERE oi_id=$oi_id") or die(mysql_error());
    
    $result1 = mysql_query("UPDATE order_list SET price= price - '$price' WHERE ol_id=$order_id") or die(mysql_error());
    
    
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='purchasepview.php?order_id=<?php echo $order_id; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Item');
        window.location.href='purchasepview.php?order_id=<?php echo $order_id; ?>&fail';
        </script>
		<?php
	}

?>