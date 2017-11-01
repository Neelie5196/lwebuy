<?php
   require_once '../connection/config.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        header("Location: ../login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inbox</title>
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
        <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        
        <!--stylesheet-->
    <link href="../frameworks/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body ng-app="">
    <div class="row">
            <?php include_once('nav.php')?>
        </div>
    <div class="message-body">
        <div class="message-left">
            <ul>
                <?php 
                    $q = mysqli_query($con, "SELECT * FROM `users` WHERE user_id!='$user_id'");
                    while($row = mysqli_fetch_assoc($q)){
                        echo "<a href='message.php?user_id={$row['user_id']}'><li><img src='{$row['image']}'> {$row['fname']}</li></a>";
                    }
                ?>
            </ul>
        </div>
 
        <div class="message-right">
            <!-- display message -->
            <div class="display-message">
            <?php
                //check $_GET['id'] is set
                if(isset($_GET['user_id'])){
                    $user_two = trim(mysqli_real_escape_string($con, $_GET['user_id']));
                    //check $user_two is valid
                    $q = mysqli_query($con, "SELECT `user_id` FROM `users` WHERE user_id='$user_two' AND user_id!='$user_id'");
                    //valid $user_two
                    if(mysqli_num_rows($q) == 1){
                        //check $user_id and $user_two has conversation or not if no start one
                        $conver = mysqli_query($con, "SELECT * FROM `conversation` WHERE (user_one='$user_id' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='$user_id')");
 
                        //they have a conversation
                        if(mysqli_num_rows($conver) == 1){
                            //fetch the converstaion id
                            $fetch = mysqli_fetch_assoc($conver);
                            $conversation_id = $fetch['id'];
                        }else{ //they do not have a conversation
                            //start a new converstaion and fetch its id
                            $q = mysqli_query($con, "INSERT INTO `conversation` VALUES ('','$user_id',$user_two)");
                            $conversation_id = mysqli_insert_id($con);
                        }
                    }else{
                        die("Invalid $_GET ID.");
                    }
                }else {
                    die("Click On the Person to start Chating.");
                }
            ?>
            </div>
            <!-- /display message -->
 
            <!-- send message -->
            <div class="send-message">
                <!-- store conversation_id, user_from, user_to so that we can send send this values to post_message_ajax.php -->
                <input type="hidden" id="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" id="user_form" value="<?php echo base64_encode($user_id); ?>">
                <input type="hidden" id="user_to" value="<?php echo base64_encode($user_two); ?>">
                <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <button class="btn btn-primary" id="reply">Reply</button> 
                <span id="error"></span>
            </div>
            <!-- / send message -->
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
</body>
</html>