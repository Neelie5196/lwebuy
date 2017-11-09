<?php
require_once '../connection/config.php';

if(isset($_POST['update-point']))
{    
    $pointratio = $_POST['pointratio'];
    $adjust_id = $_POST['adjust_id'];
	
	$result = mysqli_query($con, "UPDATE adjust SET value='$pointratio' WHERE id = $adjust_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-currency']))
{    
    $currencyratio = $_POST['currencyratio'];
    $adjust_id = $_POST['adjust_id'];
	
	$result = mysqli_query($con, "UPDATE adjust SET value='$currencyratio' WHERE id = $adjust_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-weight']))
{    
    $bweight = $_POST['bweight'];
    $oweight = $_POST['oweight'];
    $sp_id = $_POST['sp_id'];

	
	$result = mysqli_query($con, "UPDATE shipping_price SET bprice='$bweight', oprice='$oweight' WHERE sp_id = $sp_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='rate.php?success';
    </script>
    <?php
}
?>