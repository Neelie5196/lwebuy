<?php
require_once '../connection/config.php';

if(isset($_POST['create']))
{    

    $from = $_POST['from'];
    $to = $_POST['to'];
    $content = $_POST['content'];
    $value = $_POST['value'];

	
	$result = mysql_query("INSERT INTO parcel SET fromsender='$from', toreceiver='$to', content='$content', value='$value'") or die(mysql_error());
    ?>
    <script>
    alert('Success to Create');
    window.location.href='shippingrequest.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Create, Please try again');
   window.location.href='shippingrequest.php?fail';
    </script>
    <?php
}
?>
