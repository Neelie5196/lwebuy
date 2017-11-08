<?php
require_once '../connection/config.php';

if(isset($_POST['receivesave']))
{	
    $status = 'Received';
    $statuss = 'In Use';
    $rr_id = $_POST['rr_id'];
    $from = 'Receive Request';
    $user_id = $_POST['user_id'];
    $s_id = $_POST['s_id'];
    $name = $_POST['name'];
    $order_code = $_POST['order_code'];
    $weight = $_POST['weight'];
    $action = 'In';
    
    $result = mysqli_query($con, "UPDATE receive_request SET status = '$status' WHERE rr_id = $rr_id ") or die(mysqli_error($con));
    
    $query = "SELECT * 
              FROM slot
              WHERE user_id = '$user_id'";
    $results = mysqli_query($con, $query);
    $resultss = mysqli_num_rows($results);
    if($resultss > 0){
        $result1 = mysqli_query($con, "INSERT INTO item SET s_id='$s_id', from_id='$from', name='$name', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }else{
        $result1 = mysqli_query($con, "UPDATE slot SET status = '$statuss', user_id = '$user_id' WHERE s_id = $s_id ") or die(mysqli_error($con));
        $result2 = mysqli_query($con, "INSERT INTO item SET s_id='$s_id', from_id='$from', name='$name', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }
    ?>
    <script>
    alert('Success to Save');
    window.location.href='store.php?success';
    </script>
    <?php
}

if(isset($_POST['ordersave']))
{	
    $status = 'Received';
    $statuss = 'In Use';
    $oi_id = $_POST['oi_id'];
    $from = 'Order Item';
    $user_id = $_POST['user_id'];
    $order_id = $_POST['order_id'];
    $s_id = $_POST['s_id'];
    $name = $_POST['name'];
    $order_code = $_POST['order_code'];
    $weight = $_POST['weight'];
    $action = 'In';
    
    $querys = "SELECT * 
              FROM order_item
              WHERE order_id = '$order_id' AND statuss = 'Pending'";
    
    $rresults = mysqli_query($con, $querys);
    $rresultss = mysqli_num_rows($rresults);
    if($rresultss > 1){
        $result = mysqli_query($con, "UPDATE order_item SET statuss = '$status' WHERE oi_id = $oi_id ") or die(mysqli_error($con));
    }else if($rresultss = 1){
        $result0 = mysqli_query($con, "UPDATE order_list SET status = '$status' WHERE ol_id = $order_id ") or die(mysqli_error($con));
        $result = mysqli_query($con, "UPDATE order_item SET statuss = '$status' WHERE oi_id = $oi_id ") or die(mysqli_error($con));
    }
    
    $query = "SELECT * 
              FROM slot
              WHERE user_id = '$user_id'";
    $results = mysqli_query($con, $query);
    $resultss = mysqli_num_rows($results);
    if($resultss > 0){
        $result1 = mysqli_query($con, "INSERT INTO item SET s_id='$s_id', from_id='$from', name='$name', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }else{
        $result1 = mysqli_query($con, "UPDATE slot SET status = '$statuss', user_id = '$user_id' WHERE s_id = $s_id ") or die(mysqli_error($con));
        $result2 = mysqli_query($con, "INSERT INTO item SET s_id='$s_id', from_id='$from', name='$name', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }
    ?>
    <script>
    alert('Success to Save');
    window.location.href='store.php?success';
    </script>
    <?php
}

?>