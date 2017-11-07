<?php

require_once '../connection/config.php';

if (isset($_GET['oi_id']))

{
    $order_id = $_GET['order_id'];
    $oi_id = $_GET['oi_id'];

    $result = mysqli_query($con, "DELETE FROM order_item WHERE oi_id=$oi_id") or die(mysqli_error($con));
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='purchaseview.php?order_id=<?php echo $order_id; ?>&success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Item');
        window.location.href='purchaseview.php?order_id=<?php echo $order_id; ?>&fail';
        </script>
		<?php
	}

?>