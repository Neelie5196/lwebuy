<?php
require_once '../connection/config.php';

if(isset($_POST['order_id']))
{
    $order_id = $_POST['order_id'];
    $p_id = $_POST['p_id'];
    $status = 'Proceed';
    $statuss = 'Completed';
    
	
	$result = mysqli_query($con, "UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysqli_error($con));
    $result1 = mysqli_query($con, "UPDATE payment SET status = '$statuss' WHERE p_id = $p_id ") or die(mysqli_error($con));
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