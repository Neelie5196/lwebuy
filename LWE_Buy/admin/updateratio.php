<?php
require_once '../connection/config.php';

if(isset($_POST['update-point']))
{    
    $pointratio = $_POST['pointratio'];
    $adjust_id = $_POST['adjust_id'];
	
	$result = mysql_query("UPDATE adjust SET value='$pointratio' WHERE id = $adjust_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='dashboard.php?success';
    </script>
    <?php
}

if(isset($_POST['update-currency']))
{    
    $currencyratio = $_POST['currencyratio'];
    $adjust_id = $_POST['adjust_id'];
	
	$result = mysql_query("UPDATE adjust SET value='$currencyratio' WHERE id = $adjust_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='dashboard.php?success';
    </script>
    <?php
}

if(isset($_POST['update-weight']))
{    
    $bweight = $_POST['bweight'];
    $oweight = $_POST['oweight'];
    $sp_id = $_POST['sp_id'];

	
	$result = mysql_query("UPDATE shipping_price SET bprice='$bweight', oprice='$oweight' WHERE sp_id = $sp_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Update');
    window.location.href='dashboard.php?success';
    </script>
    <?php
}
?>