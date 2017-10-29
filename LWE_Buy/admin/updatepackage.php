<?php
require_once '../connection/config.php';

if(isset($_POST['pname']))
{    

    $p_id = $_POST['p_id'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    
	
	$result = mysql_query("UPDATE package SET name='$pname', price='$pprice' WHERE id = $p_id ") or die(mysql_error());
    
    ?>
    <script>
    alert('Success to Update');
    window.location.href='packagelist.php?success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Update, Please try again');
    window.location.href='packagelist.php?fail';
    </script>
    <?php
}
?>