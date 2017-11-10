<?php
require 'connection/config.php';
session_start();

if (isset($_POST['reset']))
{
    $email = $_POST['email'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
    
            if($np==$cnp)
            {
				$password = $_POST['np'];
				$password = password_hash($password, PASSWORD_DEFAULT); 
				$result = mysqli_query($con, "UPDATE users SET password='$password' WHERE email='$email'") or die(mysqli_error($con));
                ?>
				<script>
                alert('Successfully Reset');
                window.location.href='login.php?success';
                </script>
				<?php
            }
            else
            {
				?>
                <script>
                alert('Make sure new password and confirm password are match.');
                window.location.href='login.php?fail';
                </script>
				<?php
            }
}
	
?>

<!DOCTYPE html>
<html data-ng-app="">
    <head>
        <title>LWE Buy Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        
        <!-- Angularjs -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--stylesheet-->
        <link href="frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <center>
            <div class="row head">
                <?php include_once('nav.php')?>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-lg-4 col-xs-push-4 col-md-push-4 col-lg-push-4 userlogin">
                            <form action="reset.php" method="post" autocomplete="off">
                                <div class="form-group">
									<h2>Enter Your New Password</h2>
                                    <table>
									    <td><input type="hidden" class="form-control" id="email" name="email" value="<?php echo $_POST['email']; ?>"/></td>
                                         <tr>
                                            <td class="formfield"><label for="password">Password: </label></td>
                                            <td class="formfield"><input type="password" class="form-control" id="password" name="np" data-ng-model="password" required/></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="formfield"><label for="repassword">Retype password: </label></td>
                                            <td class="formfield"><input type="password" class="form-control" id="repassword" name="cnp" data-ng-model="repassword" required/></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="formfield"></td>
                                            <td class="formfield">
                                                <p data-ng-show="password!=repassword">Password does not match</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="formfield">
                                                <center>
                                                    <button type="submit" class="btn btn-default" name="reset">Reset</button>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </body>
</html>