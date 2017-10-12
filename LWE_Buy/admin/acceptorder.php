<?php
require_once '../connection/config.php';

if(isset($_POST['ol_id']))
{    
    $ol_id = $_POST['ol_id'];
    $price = $_POST['pricetotal'];
    $status = 'Ready to Pay';
    
	
	$result = mysql_query("UPDATE order_list SET status='$status', datetime=NOW(), price='$price' WHERE ol_id = $ol_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='orderrequest.php?&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='orderview.php?order_id=<?php echo $ol_id; ?>&fail';
    </script>
    <?php
}
?>