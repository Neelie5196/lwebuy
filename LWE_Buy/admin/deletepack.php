<?php

require_once '../connection/config.php';


if (isset($_GET['user_id']))

{
    $id = $_GET['user_id'];

    $result = mysqli_query($con, "DELETE FROM package WHERE id=$id") or die(mysqli_error($con));
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