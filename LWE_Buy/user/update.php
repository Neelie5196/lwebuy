<?php

require_once '../connection/config.php';

if (isset($_POST['editpurchase']))

{
    $order_id = $_POST['order_id'];
    $oi_id = $_POST['oi_id'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $type = $_POST['type'];
    $unit = $_POST['unit'];
    $remark = $_POST['remark'];

    $result = mysqli_query($con, "UPDATE order_item SET name='$name', link='$link', type='$type', unit='$unit', remark='$remark' WHERE oi_id=$oi_id") or die(mysqli_error($con));
    ?>
		<script>
		alert('Successfully Update');
        window.location.href='purchaseview.php?order_id=<?php echo $order_id; ?>&success';
        </script>
		<?php
}
else
{
    ?>
    <script>
    alert('Error While Update Detail');
    window.location.href='purchaseview.php?order_id=<?php echo $order_id; ?>&fail';
    </script>
    <?php
}

if (isset($_POST['update-profile']))

{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
	 

    $result = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', email='$email', contact='$contact' WHERE user_id=$user_id") or die(mysqli_error($con));
    ?>
		<script>
		alert('Successfully Update');
        window.location.href='setting.php';
        </script>
		<?php
}
if (isset($_POST['update-password']))
{
    $user_id = $_POST['user_id'];
    $cp = $_POST['cp'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
    
    if($cp != "" && $np!= "" && $cnp != "")
    {
        if($cp!=$np)
        {
            if($np==$cnp)
            {
				$password = $_POST['np'];
				$password = password_hash($password, PASSWORD_DEFAULT); 
                $result = mysqli_query($con, "UPDATE users SET password='$password' WHERE user_id=$user_id") or die(mysqli_error($con));
                ?>
                <script>
                alert('Successfully Update');
                window.location.href='setting.php?success';
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                alert('Make sure new password and confirm password are match.');
                window.location.href='setting.php?fail';
                </script>
                <?php
            }
        }
        else
        {
            ?>
            <script>
            alert('Make sure new password different with old password.');
            window.location.href='setting.php?fail';
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
        alert('All Fields Are Required.');
        window.location.href='setting.php?fail';
        </script>
        <?php
    }

?>
    <script>
    alert('Error While Update Profile');
    window.location.href='setting.php';
    </script>
    <?php
}


?>


