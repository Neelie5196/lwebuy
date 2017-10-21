<?php

require_once '../connection/config.php';


if (isset($_GET['s_id']))

{
    $s_id = $_GET['s_id'];

    $result = mysql_query("DELETE FROM slot WHERE s_id=$s_id") or die(mysql_error());
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='slotlist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Record');
        window.location.href='slotlist.php?fail';
        </script>
		<?php
	}

?>