<?php
require_once '../connection/config.php';


if(isset($_POST["title"]))
{    
		$file = $_FILES['file'];

		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'pdf');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = '../resources/img/receipts/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
			} else {
				echo "There was an error uploading your file!";
			}
		} else {
			echo "You cannot upload files of this type!";
		}
	
	$user_id = $_POST['user_id'];
	$title = $_POST['title'];
	$amount = $_POST['amount'];
	$file = $fileName;
	$type = $fileType;
	$status = $_POST['status'];
	
	$result = mysqli_query($con, "INSERT INTO payment SET user_id='$user_id', datetime=now(), title='$title', amount='$amount', file = '$file', type = '$type',status='$status'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Request Sent!');
    window.location.href='package.php?success';
	
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error, Please try again');
    window.location.href='package.php?fail';
    </script>
    <?php

}
?>