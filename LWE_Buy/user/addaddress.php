<?php
require_once '../connection/config.php';

if(isset($_POST['address']))
{    

    $user_id = $_POST['user_id'];
    $address = strtoupper($_POST['address']);
    $postcode = strtoupper($_POST['postcode']);
    $city = strtoupper($_POST['city']);
    $state = strtoupper($_POST['state']);
    $country = strtoupper($_POST['country']);
    
	
	$result = mysqli_query($con, "INSERT INTO address SET user_id='$user_id', address='$address', state='$state', city='$city', country='$country', postcode='$postcode'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Add Address');
    window.location.href='receiveditem.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Add Address, Please try again');
    window.location.href='receiveditem.php?fail';
    </script>
    <?php
}
?>
