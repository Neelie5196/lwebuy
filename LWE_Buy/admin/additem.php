<?php
require_once '../connection/config.php';

if(isset($_POST['add']))
{    

    $barcode = $_POST['barcode'];
    $o_id = $_POST['o_id'];
	
	$result = mysql_query("INSERT INTO receive_item SET barcode='$barcode', o_id='$o_id', time=now()") or die(mysql_error());
    
    ?>
    <script>
    alert('Success to Create');
    window.location.href='received.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Create, Please try again');
    window.location.href='received.php?fail';
    </script>
    <?php
}
?>