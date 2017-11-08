<?php
require_once '../connection/config.php';

if(isset($_POST['name']))
{    

    $name = $_POST['name'];
    $price = $_POST['price'];
    $pts = 'PTS';
	
	$result = mysqli_query($con, "INSERT INTO package SET name='$name ' '$pts', price='$price'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Successful to Create');
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
