<?php
require_once '../connection/config.php';

if(isset($_POST['oi_id']))
{   
    $order_id = $_POST['order_id'];
    $query2 = "SELECT *
                FROM payment
                WHERE from_order='$order_id'";
    $result2 = mysqli_query($con, $query2);
    $results2 = mysqli_fetch_assoc($result2);
    
    if($results2['status'] != 'Waiting for Accept'){
        $oi_id = $_POST['oi_id'];
        $ordercode = $_POST['ordercode'];
        $status = 'Pending';


        for($i=0; $i<$_POST['numbers']; $i++){
            $result = mysqli_query($con, "UPDATE order_item SET order_code='$ordercode[$i]', statuss = '$status' WHERE oi_id = $oi_id[$i]") or die(mysqli_error($con));
        }

        ?>
        <script>
        alert('Success to Update');
        window.location.href='porderview.php?order_id=<?php echo $order_id; ?>&success';
        </script>
        <?php 
    }else{
        ?>
        <script>
        alert('Please approve the payment before proceed');
        window.location.href='porderview.php?order_id=<?php echo $order_id; ?>&fail';
        </script>
        <?php 
    }
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