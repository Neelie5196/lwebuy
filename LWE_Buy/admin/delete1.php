<?php

require_once '../connection/config.php';


if (isset($_GET['user_id']))

{
    $user_id = $_GET['user_id'];
    $result1 = mysqli_query($con, "DELETE FROM work_station WHERE user_id=$user_id") or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM users WHERE user_id=$user_id") or die(mysqli_error($con));
    
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='adminlist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Record');
        window.location.href='adminlist.php?fail';
        </script>
		<?php
	}

?>