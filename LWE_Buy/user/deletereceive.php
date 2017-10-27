<?php

require_once '../connection/config.php';

if (isset($_GET['rr_id']))

{
    $rr_id = $_GET['rr_id'];

    $result = mysql_query("DELETE FROM receive_request WHERE rr_id=$rr_id") or die(mysql_error());
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='receivehistory.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Item');
        window.location.href='receivehistory.php?fail';
        </script>
		<?php
	}

?>