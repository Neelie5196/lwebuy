<?php
require 'connection/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['register'])) 
    {
        
        $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);
        
        $email = $mysqli->escape_string($_POST['email']);
        
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        
        if ( $result->num_rows > 0 )
        {
            $_SESSION['message'] = "This email already has an account.";
        }
        else
        {
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $password = $_POST['password'];



            $sql = "INSERT INTO users (email, password, lname, fname, type) VALUES ('$email', '$password', '$lname', '$fname', 'customer')";
            mysql_query($sql);

            $_SESSION['message'] = "Registration successful!";
            header("location: index.html");
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
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Angularjs -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        
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
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.html"><img src="resources/img/logo.png" alt="logo"/></a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="tracking.php" class="menuitem">Tracking</a></li>

                            <li><a href="service.php" class="menuitem">Service</a></li>
                            
                            <li><a href="contact.php" class="menuitem">Contact us</a></li>
                        </ul>

                    </div>
                </nav>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-lg-4 col-xs-push-4 col-md-push-4 col-lg-push-4 userreg">
                            <form class="form-inline" action="register.php" method="post">
                                <div class="form-group">
                                    <table>
										<tr>
                                            <td class="formfield"><label for="fname">First name:</label></td>
                                            <td class="formfield"><input type="text" class="form-control" id="fname" name="fname" required/></td>
                                        </tr>
                                        <tr>
                                            <td class="formfield"><label for="lname">Last name:</label></td>
                                            <td class="formfield"><input type="text" class="form-control" id="lname" name="lname" required autofocus/></td>
                                        </tr>
                                        <tr>
                                            <td class="formfield"><label for="email">Email: </label></td>
                                            <td class="formfield"><input type="email" class="form-control" id="email" name="email" required/></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="formfield"><label for="password">Password: </label></td>
                                            <td class="formfield"><input type="password" class="form-control" id="password" name="password" data-ng-model="password" required/></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="formfield"><label for="repassword">Retype password: </label></td>
                                            <td class="formfield"><input type="password" class="form-control" id="repassword" name="repassword" data-ng-model="repassword" required/></td>
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
                                                    <button type="submit" class="btn btn-default" name="register">Submit</button>
                                                    <button type="button" class="btn btn-default btnreg">Cancel</button>
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