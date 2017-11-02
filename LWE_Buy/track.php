<?php

require_once 'connection/config.php';
session_start();
$hawb = $_POST['hawb'];

$query = "SELECT * 
          FROM shipping_update_summary
          WHERE HawbNo = '$hawb'
          ";
$result = mysql_query($query);
$results = mysql_fetch_assoc($result);

$trackdetailsQuery = $db->prepare("
    SELECT * 
    FROM shipping_update_details
    WHERE HawbNo = '$hawb'

");

$trackdetailsQuery->execute();

$trackdetails = $trackdetailsQuery->rowCount() ? $trackdetailsQuery : [];
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
                        <h2>Shipping Details</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:120%; text-align: left;">
                                    <strong>Tracking No</strong> <?php echo $hawb ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12" style="padding:15px;">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <strong>Status</strong><br>
                                            <?php echo $results['ReasonDescription']; ?>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Customer Ref</strong><br>
                                            <?php echo $results['XR1']; ?>
                                        </div>
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <strong>Carrier No</strong><br>
                                            <?php echo $results['HawbNo']; ?>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Send Date</strong><br>
                                            <small>
                                                <?php echo $results['ShipmentDate']; ?>
                                            </small>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Delivered Date</strong><br>
                                            <small>
                                                <?php echo $results['DeliveryDate']; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse">More Shipping Details</button>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                                            <div class="span12 collapse" id="collapse">
                                                <?php if(!empty($trackdetails)): ?>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Date</th>
                                                            <th width="30%">Location</th>
                                                            <th width="30%">Description</th>
                                                            <th width="20%">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <?php foreach($trackdetails as $track): ?>
                                                    <tbody>
                                                        <tr height="50">
                                                            <td><?php echo $track['TransactionDate']; ?></td>
                                                            <td><?php echo $track['StationDescription']; ?></td>
                                                            <td><?php echo $track['EventDescription']; ?></td>
                                                            <td><?php echo $track['Remark']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php endforeach; ?>
                                                </table>
                                                <?php else: ?>
                                                    <p>Not found</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <a href="javascript:history.go(-1)"  class="btn btn-default" name="back">Back</a>
        </center>
    </body>
</html>