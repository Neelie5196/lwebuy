<?php
require_once 'connection/config.php';
session_start();

$result = mysqli_query($con, "UPDATE users
SET login_status = 'Offline'
WHERE user_id = '$_SESSION[user_id]';");
session_unset();
session_destroy();
header('location: login.php');

?>