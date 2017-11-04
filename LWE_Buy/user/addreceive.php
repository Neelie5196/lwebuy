<?php

    require_once '../connection/config.php';
    session_start();

    if(isset($_POST['name']))
    {    

        $s = "INSERT INTO receive_request (user_id, name, order_code, status) values";
        for($i=0; $i<$_POST['numbers']; $i++){
             $s .= "('".$_POST['user_id'][$i]."','".$_POST['name'][$i]."','".$_POST['ordercode'][$i]."','".$_POST['status'][$i]."'),";

        }
        $s = rtrim($s,",");
        mysql_query($s);
        ?>
        <script>
        alert('Success to Submit');
        window.location.href='receivehistory.php?success';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert('Error While Submit, Please try again');
       window.location.href='receive-1.php?fail';
        </script>
        <?php
    }
?>

