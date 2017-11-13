<?php

require_once '../connection/config.php';

if (isset($_GET['user_id']))

{
    $user_id = $_GET['user_id'];
    $result1 = mysqli_query($con, "DELETE FROM messages WHERE user_to=$user_id||user_from=$user_id") or die(mysqli_error($con));
	 $result1 = mysqli_query($con, "DELETE FROM conversation WHERE user_two=$user_id") or die(mysqli_error($con));
    
    ?>
		<script>
		alert('You can chat new');
        window.location.href='message.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Cant End');
        window.location.href='message.php?fail';
        </script>
		<?php
	}

?>