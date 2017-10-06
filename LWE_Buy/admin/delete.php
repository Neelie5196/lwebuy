<?php

require_once '../connection/config.php';

if (isset($_GET['wh_id']))

{
    $wh_id = $_GET['wh_id'];

    $result = mysql_query("DELETE FROM warehouse WHERE wh_id=$wh_id") or die(mysql_error());
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='warehouselist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Record');
        window.location.href='warehouselist.php?fail';
        </script>
		<?php
	}

if (isset($_GET['user_id1']))

{
    $user_id = $_GET['user_id1'];

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

if (isset($_GET['user_id2']))

{
    $user_id = $_GET['user_id2'];

    $result = mysql_query("DELETE FROM users WHERE user_id=$user_id") or die(mysql_error());
    ?>
		<script>
		alert('Successfully Delete');
        window.location.href='stafflist.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Error While Delete Record');
        window.location.href='stafflist.php?fail';
        </script>
		<?php
	}

?>