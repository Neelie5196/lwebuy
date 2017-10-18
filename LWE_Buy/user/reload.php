<?php
require_once '../connection/config.php';
session_start();

if(isset($_POST['transaction']))
{
    $user_id = $_SESSION['user_id'];
    $transno = $_POST['transno'];
    $transamt = $_POST['transamt'];
    
    $image = $transno.$_FILES['image']['name'];
    $image_loc = $_FILES['image']['tmp_name'];
	$image_size = $_FILES['image']['size'];
	$image_type = $_FILES['image']['type'];
	$folder = "resources/img/receipts/";
    
    $new_image_name = strtolower($image);
    
    $final_image=str_replace(' ','-',$new_image_name);
    
    if(move_uploaded_file($image_loc,$folder.$final_image))
    {
        $sql="INSERT INTO credit(user_id, amount, status, reference_code, receipt) VALUES('$user_id','$transamt','pending','$transno','$final_image')";
		mysql_query($sql);
?>

		<script>
		alert('Sumission successful!');
        window.location.href='creditcheck.php?success';
        </script>
<?php
    }
	else
	{
?>

		<script>
		alert('Submission failed.');
        window.location.href='creditcheck.php?fail';
        </script>
<?php
    }
}
?>