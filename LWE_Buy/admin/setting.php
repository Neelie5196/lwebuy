<?php

require_once '../connection/config.php';
session_start();

$profilesettingQuery = $db->prepare("
    SELECT *
    FROM users
    WHERE user_id=:user_id
");

$profilesettingQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$profilesetting = $profilesettingQuery->rowCount() ? $profilesettingQuery : [];


?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <style>
            label{
                float: right;
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body background="../resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <center>
            <h2>Profile</h2>
            <hr/>
        </center>

        <?php if(!empty($profilesetting)): ?>
        <section class = "content profilesetting">
            <?php foreach($profilesetting as $profile): ?>
            <div class="container profile">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h3>Profile Settings<br/><small> Change your account settings</small></h3>
                        <hr/>
                        <center>
                            <form action="update.php" method="post">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="fname" class="form-control" value="<?php echo $profile['fname']; ?>" style="border-radius: 30px; width: 50%;float: left;" required>
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="lname" class="form-control" value="<?php echo $profile['lname']; ?>" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="email" name="email" class="form-control" value="<?php echo $profile['email']; ?>" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Contact Number</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="tel" name="contact" class="form-control" value="<?php echo $profile['contact']; ?>" style="border-radius: 30px; width: 50%; float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-success" name="update-profile" value="Update Profile">
                            </form>
                        </center>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 30px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h3>Password<br/><small> Change your password</small></h3>
                        <hr/>
                        <center>
                            <form action="updates.php" method="post">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Current Password</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="password" name="cp" id="cp" class="form-control" style="border-radius: 30px; width: 50%;float: left;" value="<?php echo $profile['password']; ?>" readonly required><br/><br/>
                                        
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>New Password</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="password" name="np" id="np" class="form-control" style="border-radius: 30px; width: 50%;float: left;">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Confirm Password</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="password" name="cnp" id="cnp" class="form-control" style="border-radius: 30px; width: 50%;float: left;">
                                    </div>
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-success" name="update-password" value="Update Password">
                            </form>
                        </center>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
        <?php else: ?>
            <p>Error.</p>
        <?php endif; ?>
    </body>
</html>