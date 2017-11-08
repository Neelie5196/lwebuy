<?php
require_once '../connection/config.php';

if(isset($_POST['slotcode']))
{    

    $slotcode = $_POST['slotcode'];
    $slotnum = $_POST['slotnum'];
    $status = 'Not in Use';
    
	
	$result = mysqli_query($con, "INSERT INTO slot SET slot_code='$slotcode', slot_num='$slotnum', status='$status'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Create');
    window.location.href='slotlist.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Create, Please try again');
    window.location.href='slotlist.php?fail';
    </script>
    <?php
}
?>
