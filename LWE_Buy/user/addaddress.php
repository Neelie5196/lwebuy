<?php
require_once '../connection/config.php';

if(isset($_POST['address']))
{    

    $user_id = $_POST['user_id'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    
	
	$result = mysql_query("INSERT INTO address SET user_id='$user_id', address='$address', state='$state', city='$city', country='$country', postcode='$postcode'") or die(mysql_error());
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
