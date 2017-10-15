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
    
    #$from = "clementchuo@gmail.com";
    #$subject2 = "Submission received";
    #$message2 = $name . " we had received your feedback, we will contact you as soon as possible. Thank You.";
    #$headers = "From:" . $from;
    #mail($email, $subject, $message, $headers);
	
	$result = mysql_query("INSERT INTO contact SET name='$name', contact='$contact', email='$email', subject='$subject', tracknum='$tracknum', message='$message', datetime=NOW(), status = '$status'") or die(mysql_error());
    
    
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