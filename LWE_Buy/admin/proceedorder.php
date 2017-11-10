<?php
require_once '../connection/config.php';

if(isset($_POST['proceed']))
{
    $order_id = $_POST['order_id'];
    $status = 'Proceed';
    
	
	$result = mysqli_query($con, "UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysqli_error($con));
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

if(isset($_POST['approve']))
{
    $order_id = $_POST['order_id'];
    $p_id = $_POST['p_id'];
    $statuss = 'Completed';
    
    $result = mysqli_query($con, "UPDATE payment SET status = '$statuss' WHERE p_id = $p_id ") or die(mysqli_error($con));
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

if(isset($_POST['approves']))
{
    $shipping_id = $_POST['shipping_id'];
    $p_id = $_POST['p_id'];
    $statuss = 'Completed';
    
    $result = mysqli_query($con, "UPDATE payment SET status = '$statuss' WHERE p_id = $p_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='shippinglrview.php?shipping_id=<?php echo $shipping_id; ?>&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='shippinglrview.php?shipping_id=<?php echo $shipping_id; ?>&fail';
    </script>
    <?php
}
?>