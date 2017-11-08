<?php
require_once '../connection/config.php';

if(isset($_POST['fname']))
{    

    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $ws_id = $_POST['ws_id'];
    $workstation = $_POST['workstation'];
	
	$result = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', contact='$contact', email='$email', type='$type' WHERE user_id = $user_id ") or die(mysqli_error($con));
    
    
    $result1 = mysqli_query($con, "UPDATE work_station SET wh_id='$workstation' WHERE ws_id = $ws_id ") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Update');
    window.location.href='editusers.php?users=<?php echo $user_id; ?>&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='editusers.php?users=<?php echo $user_id; ?>&fail';
    </script>
    <?php
}
?>