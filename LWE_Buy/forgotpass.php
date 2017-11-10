<?php
require_once 'connection/config.php';
session_start();
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
									<h2>Enter your Email to Reset New Password</h2>
                                    <table>
                                        <tr>
                                            <td class="formfield"><label for="email">Email: </label></td>
                                            <td class="formfield"><input type="email" class="form-control" id="email" name="email" required autofocus/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="formfield">
                                                <center>
                                                    <button type="submit" class="btn btn-default" name="continue">Continue</button>
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