<?php
require_once 'connection/config.php';

if(isset($_POST['name']))
{    

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $tracknum = $_POST['tracknum'];
    $message = $_POST['message'];
    $status = 'unread';
	
	$result = mysqli_query($con, "INSERT INTO contact SET name='$name', contact='$contact', email='$email', subject='$subject', tracknum='$tracknum', message='$message', datetime=NOW(), status = '$status'") or die(mysqli_error($con));
    
    
    ?>
    <script>
    alert('Success to Submit');
    window.location.href='contact.php';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Submit, Please try again');
    window.location.href='contact.php';
    </script>
    <?php
}
?>