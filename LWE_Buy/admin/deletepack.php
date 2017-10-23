<?php

require_once '../connection/config.php';


if (isset($_GET['user_id']))

{
    $id = $_GET['user_id'];

    $result = mysql_query("DELETE FROM package WHERE id=$id") or die(mysql_error());
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='packagelist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Record');
        window.location.href='packagelist.php?fail';
        </script>
		<?php
	}

?>