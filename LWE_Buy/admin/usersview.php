<?php

require_once '../connection/config.php';
session_start();

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
            <div class="container">
                <div class="row" style="padding-top: 50px; padding-bottom: 25px; float: left;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>User Details</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            
                        </div>
                    </div>
                    <a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a>
                </div>
            </section>
        </center>
    </body>
</html>