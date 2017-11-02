<?php

require_once 'connection/config.php';
session_start();
$hawb = $_POST['hawb'];
$id = 0;

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
                        <h2>Shipping Details</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <form action="track.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="hawb" class="form-control" placeholder="Tracking Number" style="border-radius: 30px; width: 25%; float: left;" autocomplete="off" required>
                                        <button type="submit" class="btn btn-success" style="border-radius: 30px; float: left;">Track <span class="glyphicon glyphicon-search"></span></button>
                                    </form>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:120%; text-align: left;">
                                    <strong>Tracking No</strong> <?php echo $hawb ?>
                                </div>
                            </div>
                            <?php
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => "http://api.unixus.com.my/Tracking/V2/Tracking.svc/json/$hawb",
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_TIMEOUT => 30,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => "GET",
                                  CURLOPT_HTTPHEADER => array(
                                    "cache-control: no-cache"
                                  ),
                                ));

                                $response = curl_exec($curl);
                                $err = curl_error($curl);

                                curl_close($curl);
                                $response = json_decode($response, true); //because of true, it's in an array
            
                                $x = $response['TrackSummaryResponse']['SummaryList'];
                                $x = array_shift($x);
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12" style="padding:15px;">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <strong>Status</strong><br>
                                            <?php echo $x['ReasonDescription']; ?>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Customer Ref</strong><br>
                                            <?php echo $x['XR1']; ?>
                                        </div>
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <strong>Carrier No</strong><br>
                                            <a href="<?php echo $x['TrackingURL']; ?>" target="_blank"><?php echo $x['HawbNo']; ?></a>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Send Date</strong><br>
                                            <small>
                                                <?php echo $x['ShipmentDate']; ?>
                                            </small>
                                            <?php
                                            #    $xy = str_replace('/Date(', '', substr($x['ShipmentDate'], 0, 30));
                                            #    $xyz = str_replace(')/', '', substr($xy, 0, 30));
                                            #    $wxyz = str_replace('+', '', substr($xyz, 0, 30));
                                            #    $originalDate = $wxyz;
                                            #    echo $wxyz;
                                            #    echo $newDate = date("l, d F Y, h:i:s", strtotime($originalDate));
                                            #?>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Delivered Date</strong><br>
                                            <small>
                                                <?php echo $x['DeliveryDate']; ?>
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
                                    <?php
                                        $curls = curl_init();

                                        curl_setopt_array($curls, array(
                                          CURLOPT_URL => "http://api.unixus.com.my/Tracking/V2/Tracking.svc/json/$hawb/Details",
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_TIMEOUT => 30,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => "GET",
                                          CURLOPT_HTTPHEADER => array(
                                            "cache-control: no-cache"
                                          ),
                                        ));

                                        $responses = curl_exec($curls);
                                        $errs = curl_error($curls);

                                        curl_close($curls);
                                        $responses = json_decode($responses, true); //because of true, it's in an array

                                        $y = $responses['TrackDetailsResponse']['EventList'];
                                        $y = $y[0]['Events'];
                                        
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                                            <div class="span12 collapse" id="collapse">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Date</th>
                                                            <th width="30%">Location</th>
                                                            <th width="30%">Description</th>
                                                            <th width="20%">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <?php foreach($y as $records): 
                                                    {
                                                        
                                                        $id++;
                                                    }
                                                    ?>
                                                    <tbody>
                                                        <tr height="50">
                                                            <td>
                                                                <?php echo $records['TransactionDate']; ?>
                                                                <?php
                                                                #    $originalDate = $records['TransactionDate'];
                                                                #    echo $newDate = date("l, d F Y, h:i:s", strtotime($originalDate));
                                                                #?>
                                                            </td>
                                                            <td><?php echo $records['StationDescription']; ?></td>
                                                            <td><?php echo $records['EventDescription']; ?></td>
                                                            <td><?php echo $records['Remarks']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </center>
        
        
        <script src="frameworks/js/angular.min.js"></script>
        <script src="frameworks/js/getdata.js"></script>
        
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>