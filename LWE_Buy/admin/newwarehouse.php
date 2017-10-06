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
                <div class="row" style="padding-top: 50px; padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>New Warehouse</h2>
                    </div>
                </div>
            </div>
        </center>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <h3>Detail</h3>
                            <hr/>
                            <form action="addwarehouse.php" method="post">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Code</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="stationcode" class="form-control" placeholder="StationCode (Required)" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Description</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="stationdescription" class="form-control" placeholder="StationDescription (Required)" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country Code</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="countrycode" class="form-control" placeholder="CountryCode (Required)" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country Description</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="countrydescription" class="form-control" placeholder="CountryDescription (Required)" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Company Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="companyname" class="form-control" placeholder="CompanyName (Required)" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="stationname" class="form-control" placeholder="StationName (Required)" style="border-radius: 30px; width: 50%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-success" name="new-warehouse" value="Create" style="float: right;">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        
    </body>
</html>