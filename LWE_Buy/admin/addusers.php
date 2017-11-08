<?php
require_once '../connection/config.php';

if(isset($_POST['fname']))
{    

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
    $type = $_POST['type'];
    $workstation = $_POST['workstation'];
	$image = $_POST['image'];
	
	$result = mysqli_query($con, "INSERT INTO users SET fname='$fname', lname='$lname', contact='$contact', email='$email', password='$password', type='$type', image='$image'") or die(mysqli_error($con));
    
    $user_id = mysqli_insert_id($con);
    
    $result1 = mysqli_query($con, "INSERT INTO work_station SET user_id='$user_id', wh_id='$workstation'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Create');
    window.location.href='createnew.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Create, Please try again');
    window.location.href='createnew.php?fail';
    </script>
    <?php
}
?>
