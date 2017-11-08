<?php
require_once '../connection/config.php';

if(isset($_POST['stationcode']))
{    

    $stationcode = $_POST['stationcode'];
    $stationdescription = $_POST['stationdescription'];
    $countrycode = $_POST['countrycode'];
    $countrydescription = $_POST['countrydescription'];
    $companyname = $_POST['companyname'];
    $stationname = $_POST['stationname'];
	
	$result = mysqli_query($con, "INSERT INTO warehouse SET station_code='$stationcode', station_description='$stationdescription', country_code='$countrycode', country_description='$countrydescription', company_name='$companyname', station_name='$stationname'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Create');
    window.location.href='warehouselist.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Create, Please try again');
    window.location.href='warehouselist.php?fail';
    </script>
    <?php
}
?>
