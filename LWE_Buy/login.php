<?php
require_once 'connection/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) 
    {
        $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);
        
        /* User login process, checks if user exists and password is correct */
        
        // Escape email to protect against SQL injections
        $email = $mysqli->escape_string($_POST['email']);
        $password = $mysqli->escape_string($_POST['password']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        
        if ( $result->num_rows == 0 )
        {
            $_SESSION['message'] = "User does not exist!";
        }
        else
        {
            $user = $result->fetch_assoc();
            
			if(password_verify($password, $user["password"]))  
            {    
                $_SESSION['user_id'] = $user['user_id'];
				$_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['email'] = $user['email'];
            
                
                if($user['type'] == 'admin')
                {
                    header("location: admin/dashboard.php");
                }
                else if($user['type'] == 'staff')
                {
                    header("location: admin/dashboard.php");
                }
                else if($user['type'] == 'customer')
                {
                    header("location: user/dashboard.php");
                }
                            
                
            }
            else
            {
                $_SESSION['message'] = "You have entered wrong password, try again!";
            }
        }
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
                            <form action="login.php" method="post" autocomplete="off">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td class="formfield"><label for="email">Email: </label></td>
                                            <td class="formfield"><input type="email" class="form-control" id="email" name="email" required autofocus/></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="formfield"><label for="password">Password: </label></td>
                                            <td class="formfield"><input type="password" class="form-control" id="password" name="password" required/></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2" class="formfield"><a href="#">Forgot password?</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2" class="formfield">
                                                <center>
                                                    <button type="submit" class="btn btn-default" name="login">Login</button>
                                                    <a href="register.php"><button type="button" class="btn btn-default btnreg">Register</button></a>
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