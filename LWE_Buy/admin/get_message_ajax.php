<?php
    require_once '../connection/config.php';
    if(isset($_GET['c_id'])){
        //get the conversation id and
        $conversation_id = base64_decode($_GET['c_id']);
        //fetch all the messages of $user_id(loggedin user) and $user_two from their conversation
        $q = mysqli_query($con, "SELECT * FROM `messages` WHERE conversation_id='$conversation_id'");
        //check their are any messages
        if(mysqli_num_rows($q) > 0){
            while ($m = mysqli_fetch_assoc($q)) {
                //format the message and display it to the user
                $user_form = $m['user_from'];
                $user_to = $m['user_to'];
                $message = $m['message'];
 
                //get name and image of $user_form from `user` table
                $user = mysqli_query($con, "SELECT fname,image FROM `users` WHERE user_id='$user_form'");
                $user_fetch = mysqli_fetch_assoc($user);
                $user_form_username = $user_fetch['fname'];
                $user_form_img = $user_fetch['image'];
 
                //display the message
                echo "
                            <div class='message'>
                            
                                <div class='text-con'>
                                    <a href='#''>{$user_form_username}</a>
                                    <p>{$message}</p>
                                </div>
                            </div>
                            <hr>";
 
            }
        }else{
            echo "No Messages";
        }
    }
 
?>