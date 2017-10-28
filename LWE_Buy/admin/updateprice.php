<?php
require_once '../connection/config.php';



if(isset($_POST['oi_id']))
{    
    
    $query = "SELECT * 
              FROM adjust
              WHERE name = 'currency'";
    $result = mysql_query($query);
    $results = mysql_fetch_assoc($result);
    
    $order_id = $_POST['order_id'];
    $oi_id = $_POST['oi_id'];
    $price = $_POST['price'];
    $currency = $results['value'];
    $itemprice = $price / $currency;
    
	
	$result = mysql_query("UPDATE order_item SET price='$itemprice' WHERE oi_id = $oi_id ") or die(mysql_error());
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