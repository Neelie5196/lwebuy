<?php

require_once '../connection/config.php';

if (isset($_GET['rr_id']))

{
    $rr_id = $_GET['rr_id'];

    $result = mysqli_query($con, "DELETE FROM receive_request WHERE rr_id=$rr_id") or die(mysqli_error($con));
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