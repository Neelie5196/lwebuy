<?php
require_once '../connection/config.php';

if(isset($_GET['p_id']))
{	
    $query1 = "SELECT * 
              FROM adjust
              WHERE name = 'point'";
              $result1 = mysql_query($query1);
              $results1 = mysql_fetch_assoc($result1);
    
    $pointratio = $results1['value'];
    
    $user_id = $_GET['user_id'];
    $p_id = $_GET['p_id'];
    $status = 'Completed';
    $point = $_GET['point']/$pointratio;
    
    $result = mysql_query("UPDATE payment SET status = '$status' WHERE p_id = $p_id ") or die(mysql_error());
    
    $query = "SELECT * 
              FROM point
              WHERE user_id = '$user_id'";
    $results = mysql_query($query);
    $resultss = mysql_num_rows($results);
    if($resultss > 0){
        $result1 = mysql_query("UPDATE point SET point = point + '$point' WHERE user_id = $user_id ") or die(mysql_error());
    }else{
        $result1 = mysql_query("INSERT INTO point SET user_id='$user_id', point='$point'") or die(mysql_error());
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