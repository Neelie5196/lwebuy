<?php

require_once '../connection/config.php';


if (isset($_GET['user_id']))

{
    $user_id = $_GET['user_id'];

    $result = mysql_query("DELETE FROM users WHERE user_id=$user_id") or die(mysql_error());
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