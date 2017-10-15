<?php

require_once '../connection/config.php';
session_start();

$purchase1listQuery = $db->prepare("
    SELECT *
    FROM order_list
    WHERE user_id=:user_id AND status = 'request'
    ORDER BY datetime desc
");

$purchase1listQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchase1list = $purchase1listQuery->rowCount() ? $purchase1listQuery : [];

$purchase2listQuery = $db->prepare("
    SELECT *
    FROM order_list
    WHERE user_id=:user_id AND status = 'ready to pay'
    ORDER BY datetime desc
");

$purchase2listQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchase2list = $purchase2listQuery->rowCount() ? $purchase2listQuery : [];

$purchase3listQuery = $db->prepare("
    SELECT *
    FROM order_list
    WHERE user_id=:user_id AND status = 'paid'
    ORDER BY datetime desc
");

$purchase3listQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchase3list = $purchase3listQuery->rowCount() ? $purchase3listQuery : [];

$purchase4listQuery = $db->prepare("
    SELECT *
    FROM order_list
    WHERE user_id=:user_id AND status = 'proceed'
    ORDER BY datetime desc
");

$purchase4listQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchase4list = $purchase4listQuery->rowCount() ? $purchase4listQuery : [];

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
                <h2>Purchase List</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Request</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse1">More Purchase Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="span12 collapse" id="collapse1">
                        <?php if(!empty($purchase1list)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($purchase1list as $purchase1): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $purchase1['ol_id']; ?></td>
                                        <td width="50%"><?php echo $purchase1['datetime']; ?></td>
                                        <td width="30%"><?php echo $purchase1['status']; ?></td>
                                        <td width="15%"><a href="purchaseview.php?order_id=<?php echo $purchase1['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no purchase item.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Ready to Pay</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse2">More Purchase Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="span12 collapse" id="collapse2">
                        <?php if(!empty($purchase2list)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($purchase2list as $purchase2): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $purchase2['ol_id']; ?></td>
                                        <td width="40%"><?php echo $purchase2['datetime']; ?></td>
                                        <td width="20%"><?php echo $purchase2['price']; ?></td>
                                        <td width="20%"><?php echo $purchase2['status']; ?></td>
                                        <td width="15%"><a href="purchasepview.php?order_id=<?php echo $purchase2['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no purchase item.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Ready to Proceed</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse3">More Purchase Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="span12 collapse" id="collapse3">
                        <?php if(!empty($purchase3list)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($purchase3list as $purchase3): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $purchase3['ol_id']; ?></td>
                                        <td width="40%"><?php echo $purchase3['datetime']; ?></td>
                                        <td width="20%"><?php echo $purchase3['price']; ?></td>
                                        <td width="20%"><?php echo $purchase3['status']; ?></td>
                                        <td width="15%"><a href="purchasehview.php?order_id=<?php echo $purchase3['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no purchase item.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>In Proceed</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse4">More Purchase Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="span12 collapse" id="collapse4">
                        <?php if(!empty($purchase4list)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                        <th>Order Code</th>
                                    </tr>
                                </thead>
                                <?php foreach($purchase4list as $purchase4): ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $purchase4['ol_id']; ?></td>
                                        <td width="40%"><?php echo $purchase4['datetime']; ?></td>
                                        <td width="15%"><?php echo $purchase4['price']; ?></td>
                                        <td width="15%"><?php echo $purchase4['status']; ?></td>
                                        <td width="10%"><?php echo $purchase4['order_code']; ?></td>
                                        <td width="15%"><a href="purchasehview.php?order_id=<?php echo $purchase4['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no purchase item.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>