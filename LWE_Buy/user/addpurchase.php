<?php

    require_once '../connection/config.php';
    session_start();

    if(isset($_POST['orderId']))
    {    

        $order_id = $_POST['orderId'];
        $user_id = $_SESSION['user_id'];
        $status = "Request";

        $sql = "INSERT INTO order_list (ol_id, user_id, status, datetime) VALUES ('$order_id','$user_id','$status',NOW())";
        mysqli_query($con, $sql);


        $s = "INSERT INTO order_item (order_id, name, link, type, unit, remark) values";
        for($i=0; $i<$_POST['numbers']; $i++){
             $s .= "('".$_POST['orderID'][$i]."','".$_POST['name'][$i]."','".$_POST['link'][$i]."','".$_POST['type'][$i]."','".$_POST['unit'][$i]."','".$_POST['remark'][$i]."'),";

        }
        $s = rtrim($s,",");
        mysqli_query($con, $s);
        ?>
        <script>
        alert('Your request has been recorded. Thank you!');
        window.location.href='purchaselist.php?success';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('Error! Please try again');
       window.location.href='purchaselist.php?fail';
        </script>
        <?php
    }
?>

