<?php
require_once '../connection/config.php';

if(isset($_POST['ol_id']))
{   
    $ol_id = $_POST['ol_id'];
    $query = "SELECT *
              FROM order_item
              WHERE order_id='$ol_id'";
    $result = mysqli_query($con, $query);
    $results = mysqli_fetch_assoc($result);
    
    if($results['price'] != NULL){
        $price = $_POST['pricetotal'];
        $status = 'Ready to Pay';


        $result = mysqli_query($con, "UPDATE order_list SET status='$status', datetime=NOW(), price='$price' WHERE ol_id = $ol_id ") or die(mysqli_error($con));
        ?>
        <script>
        alert('Success to Update');
        window.location.href='orderrequest.php?&success';
        </script>
        <?php
    }else{
        ?>
        <script>
        alert('Please update the price before accept');
        window.location.href='orderview.php?order_id=<?php echo $ol_id; ?>&fail';
        </script>
        <?php
    }
    
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