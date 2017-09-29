<?php

require_once 'connection/config.php';
session_start();
$hawb = $_POST['hawb'];


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
                        <div class="col-xs-12 col-md-12 col-lg-12">
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
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Customer Ref</strong><br>
                                        </div>
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <strong>Carrier No</strong><br>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Send Date</strong><br>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <strong>Delivered Date</strong><br>
                                        </div>
                                    </div>
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
                                
                                echo 'Summary:' .$response['TrackSummaryResponse']['ErrorMessage'];
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    
<div class="collapse span12 " id="collapse-EM947441835MY" style="margin-left:0px; min-height:0px;">
<table class="table table-striped table-hover">
<thead>
<tr>
<th width="20%">Date</th>
<th width="20%">Location</th>
<th width="20%">Description</th>
<th width="20%">Remarks</th>
</tr>
</thead>
<tbody>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__0" class="rgRow">
<td style="width:20%;">Fri, 09 Sep 2016 00:41:25</td>
<td style="width:30%;">SHENZHEN, CHINA, PEOPLE'S REPUBLIC</td>
<td style="width:30%;">Shipment info registered at SHENZHEN.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__1" class="rgAltRow">
<td style="width:20%;">Fri, 09 Sep 2016 01:46:42</td>
<td style="width:30%;">SHENZHEN, CHINA, PEOPLE'S REPUBLIC</td>
<td style="width:30%;">Pickup shipment checked in at SHENZHEN.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__2" class="rgRow">
<td style="width:20%;">Fri, 09 Sep 2016 16:02:58</td>
<td style="width:30%;">SHENZHEN, CHINA, PEOPLE'S REPUBLIC</td>
<td style="width:30%;">Shipment designated to MALAYSIA.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__3" class="rgAltRow">
<td style="width:20%;">Fri, 09 Sep 2016 21:33:12</td>
<td style="width:30%;">HONG KONG, HONGKONG</td>
<td style="width:30%;">Shipment designated to MALAYSIA.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__4" class="rgRow">
<td style="width:20%;">Sat, 10 Sep 2016 11:02:00</td>
<td style="width:30%;">HONG KONG, HONGKONG</td>
<td style="width:30%;">Shipment departed to MALAYSIA.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__5" class="rgAltRow">
<td style="width:20%;">Sat, 10 Sep 2016 11:02:13</td>
<td style="width:30%;">HONG KONG, HONGKONG</td>
<td style="width:30%;">Shipment departed to MALAYSIA.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__6" class="rgRow">
<td style="width:20%;">Sat, 10 Sep 2016 18:35:07</td>
<td style="width:30%;">KUALA LUMPUR, MALAYSIA</td>
<td style="width:30%;">Shipment arrived at airport.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__7" class="rgAltRow">
<td style="width:20%;">Tue, 13 Sep 2016 13:35:07</td>
<td style="width:30%;">KUALA LUMPUR, MALAYSIA</td>
<td style="width:30%;">Custom cleared and arrived at KUALA LUMPUR station.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__8" class="rgRow">
<td style="width:20%;">Wed, 14 Sep 2016 12:35:07</td>
<td style="width:30%;">KUALA LUMPUR, MALAYSIA</td>
<td style="width:30%;">Shipment departed from/to KUALA LUMPUR station.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__9" class="rgAltRow">
<td style="width:20%;">Wed, 14 Sep 2016 18:25:19</td>
<td style="width:30%;">Shah Alam PPL, MALAYSIA</td>
<td style="width:30%;">Shipment arrived at station.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__10" class="rgRow">
<td style="width:20%;">Wed, 14 Sep 2016 23:48:05</td>
<td style="width:30%;">IPC, MALAYSIA</td>
<td style="width:30%;">Shipment arrived at IPC station.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__11" class="rgAltRow">
<td style="width:20%;">Thu, 15 Sep 2016 02:11:25</td>
<td style="width:30%;">Balakong PPL, MALAYSIA</td>
<td style="width:30%;">Shipment arrived at station.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__12" class="rgRow">
<td style="width:20%;">Thu, 15 Sep 2016 09:43:00</td>
<td style="width:30%;">PO SERI KEMBANGAN, MALAYSIA</td>
<td style="width:30%;">Shipment is out for despatch by EDIx.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__13" class="rgAltRow">
<td style="width:20%;">Thu, 15 Sep 2016 16:43:00</td>
<td style="width:30%;">PO SERI KEMBANGAN, MALAYSIA</td>
<td style="width:30%;">Delivery Info<br>UNABLE TO ACCESS</td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__14" class="rgRow">
<td style="width:20%;">Sun, 18 Sep 2016 03:47:10</td>
<td style="width:30%;">KUALA LUMPUR, MALAYSIA</td>
<td style="width:30%;">Shipment designated to MALAYSIA.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__15" class="rgAltRow">
<td style="width:20%;">Tue, 20 Sep 2016 10:55:00</td>
<td style="width:30%;">PO SERI KEMBANGAN, MALAYSIA</td>
<td style="width:30%;">Shipment is out for despatch by EDIx.<br></td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__16" class="rgRow">
<td style="width:20%;">Tue, 20 Sep 2016 18:26:00</td>
<td style="width:30%;">PO SERI KEMBANGAN, MALAYSIA</td>
<td style="width:30%;">DELIVERED<br>SHIPMENT DELIVERED</td>
<td style="width:20%;"></td>
</tr>
<tr id="ctl00_ContentPlaceHolder1_dgDetails_ctl00__17" class="rgAltRow">
<td style="width:20%;">Wed, 14 Dec 2016 18:48:00</td>
<td style="width:30%;">PO SERI KEMBANGAN, MALAYSIA</td>
<td style="width:30%;">DELIVERED<br>SHIPMENT DELIVERED</td>
<td style="width:20%;"></td>
</tr>
</tbody>
</table>
</div></div>
        
        
        <script src="frameworks/js/angular.min.js"></script>
        <script src="frameworks/js/getdata.js"></script>
        
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>