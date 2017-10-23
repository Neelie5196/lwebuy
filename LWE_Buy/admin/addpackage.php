<?php
require_once '../connection/config.php';

if(isset($_POST['name']))
{    

    $name = $_POST['name'];
    $price = $_POST['price'];
	
	$result = mysql_query("INSERT INTO package SET name='$name', price='$price'") or die(mysql_error());
    
    ?>
    <script>
    alert('Success to Create');
    window.location.href='packagelist.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Create, Please try again');
    window.location.href='packagelist.php?fail';
    </script>
    <?php
}
?>
