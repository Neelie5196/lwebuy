<?php

require_once 'connection/config.php';

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
                $result = mysql_query("UPDATE users SET password='$np' WHERE user_id=$user_id") or die(mysql_error());
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
}


?>

