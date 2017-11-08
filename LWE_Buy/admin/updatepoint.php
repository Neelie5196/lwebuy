<?php
require_once '../connection/config.php';

if(isset($_GET['p_id']))
{	
    $query1 = "SELECT * 
              FROM adjust
              WHERE name = 'point'";
              $result1 = mysqli_query($con, $query1);
              $results1 = mysqli_fetch_assoc($result1);
    
    $pointratio = $results1['value'];
    
    $user_id = $_GET['user_id'];
    $p_id = $_GET['p_id'];
    $status = 'Completed';
    $point = $_GET['point']/$pointratio;
    
    $result = mysqli_query($con, "UPDATE payment SET status = '$status' WHERE p_id = $p_id ") or die(mysqli_error($con));
    
    $query = "SELECT * 
              FROM point
              WHERE user_id = '$user_id'";
    $results = mysqli_query($con, $query);
    $resultss = mysqli_num_rows($results);
    if($resultss > 0){
        $result1 = mysqli_query($con, "UPDATE point SET point = point + '$point' WHERE user_id = $user_id ") or die(mysqli_error($con));
    }else{
        $result1 = mysqli_query($con, "INSERT INTO point SET user_id='$user_id', point='$point'") or die(mysqli_error($con));
    }
    ?>
    <script>
    alert('Success to Top Up');
    window.location.href='topup.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Top Up, Please try again');
    window.location.href='topup.php?fail';
    </script>
    <?php
	
}
?>