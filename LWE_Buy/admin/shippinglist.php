<?php

require_once '../connection/config.php';
session_start();

$newshippingQuery = $db->prepare("
    SELECT *
    FROM shipping sh
    JOIN users us
    ON us.user_id = sh.user_id
    WHERE status = 'pending'
    ORDER BY datetime desc
");

$newshippingQuery->execute();

$newshipping = $newshippingQuery->rowCount() ? $newshippingQuery : [];

$shippingQuery = $db->prepare("
    SELECT *
    FROM shipping sh
    JOIN users us
    ON us.user_id = sh.user_id
    WHERE status = 'proceeded'
    ORDER BY datetime desc
");

$shippingQuery->execute();

$shipping = $shippingQuery->rowCount() ? $shippingQuery : [];

$shippingresponseQuery = $db->prepare("
    SELECT *
    FROM shipping sh
    JOIN users us
    ON us.user_id = sh.user_id
    WHERE status = 'awaiting'
    ORDER BY datetime desc
");

$shippingresponseQuery->execute();

$shippingresponse = $shippingresponseQuery->rowCount() ? $shippingresponseQuery : [];

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
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Shipping list</h2>
                <hr/>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>New</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse1">More Shipping Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="collapse1">
                            <?php if(!empty($newshipping)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Shipping No.</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                    </tr>
                                </thead>
                                <?php foreach($newshipping as $ns): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $ns['s_id']; ?></td>
                                        <td width="40%"><?php echo $ns['fname']; ?> <?php echo $ns['lname']; ?></td>
                                        <td width="20%"><?php echo $ns['datetime']; ?></td>
                                        <td width="5%"><a href="tag.php?s_id=<?php echo $ns['s_id']; ?>" class="btn btn-xs btn-info">Print tag</a></td>
                                        <td width="5%"><a href=# class="btn btn-xs btn-info">Update</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no shipping pending.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Proceeded</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse2">More Shipping Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="collapse2">
                            <?php if(!empty($shipping)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Shipping No.</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($shipping as $s): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $s['s_id']; ?></td>
                                        <td width="40%"><?php echo $s['fname']; ?> <?php echo $s['lname']; ?></td>
                                        <td width="15%"><?php echo $s['datetime']; ?></td>
                                        <td width="10%"><?php echo $s['status']; ?></td>
                                        <td width="5%"><a href=# class="btn btn-xs btn-info">Update</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no proceeded shipping.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Awaiting Customer Response</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse3">More Shipping Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="collapse3">
                            <?php if(!empty($shippingrepsonse)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Shipping No.</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                    </tr>
                                </thead>
                                <?php foreach($shippingresponse as $sr): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $sr['s_id']; ?></td>
                                        <td width="40%"><?php echo $sr['fname']; ?> <?php echo $sr['lname']; ?></td>
                                        <td width="15%"><?php echo $sr['datetime']; ?></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no pending response.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>