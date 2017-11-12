<?php

require_once 'connection/config.php';

?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link href="frameworks/css/bootstrap.min.css" rel="stylesheet"/>

        <!--stylesheet-->
        <link href="frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body background="resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <center>
            <div class="container">
                <div class="row" style="padding-top: 50px; padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <img src="resources/img/logo.png" width="200" height="75">
                    </div>
                </div>
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Track Logistics Worldwide Express</h2>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form action="track.php" method="post" enctype="multipart/form-data">
                                <div class="row" style="padding-bottom: 25px;">
                                    <div class="col-xs-12 col-md-4 col-lg-4">
                                        
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-4">
                                        <textarea name="hawb" cols="25" rows="5" class="form-control" placeholder="Enter tracking number here" style="border-radius: 30px; width: 100%;" autocomplete="off" required></textarea>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-4">
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Track <span class="glyphicon glyphicon-search"></span></button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </section>
        </center>
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>