<?php
require_once '../connection/config.php';

if(isset($_POST['wh_id']))
{    
    
    $wh_id = $_POST['wh_id'];
    $stationcode = $_POST['stationcode'];
    $stationdescription = $_POST['stationdescription'];
    $countrycode = $_POST['countrycode'];
    $countrydescription = $_POST['countrydescription'];
    $companyname = $_POST['companyname'];
    $stationname = $_POST['stationname'];
	
	$result = mysqli_query($con, "UPDATE warehouse SET station_code='$stationcode', station_description='$stationdescription', country_code='$countrycode', country_description='$countrydescription', company_name='$companyname', station_name='$stationname' WHERE wh_id = $wh_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='editwarehouse.php?wh_id=<?php echo $wh_id; ?>&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='editwarehouse.php?wh_id=<?php echo $wh_id; ?>&fail';
    </script>
    <?php
}
?>