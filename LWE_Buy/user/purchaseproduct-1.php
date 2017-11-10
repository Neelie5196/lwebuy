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

    <body>
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">

                <h2>Purchase Product</h2>
                <hr/>

                <section class = "content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form method="post" action="purchaseproduct-2.php">
                                <div class="jumbotron">
                                    <h3 class="title">Enter number of product to be purchased</h3>
                                    <p><input class="form-control tenwidth" name="num" type="number" value="1" required></p>
                                    <p><input type="submit" class="btn btn-success" name="submit" value="Next"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </center>
    </body>
</html>