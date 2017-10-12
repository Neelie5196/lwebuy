<?php

require_once '../connection/config.php';
session_start();

$orderrequestQuery = $db->prepare("
    SELECT *
    FROM order_list ol
    JOIN users us
    ON us.user_id = ol.user_id
    WHERE status = 'ready to pay'
    ORDER BY datetime desc
");

$orderrequestQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$orderrequest = $orderrequestQuery->rowCount() ? $orderrequestQuery : [];

$ordersrequestQuery = $db->prepare("
    SELECT *
    FROM order_list ol
    JOIN users us
    ON us.user_id = ol.user_id
    WHERE status = 'paid'
    ORDER BY datetime desc
");

$ordersrequestQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$ordersrequest = $ordersrequestQuery->rowCount() ? $ordersrequestQuery : [];

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
                <h2>Order Pending List</h2>
                <hr/>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Ready to Pay</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse1">More Order Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="collapse1">
                            <?php if(!empty($orderrequest)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($orderrequest as $order): ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $order['ol_id']; ?></td>
                                        <td><?php echo $order['fname']; ?> <?php echo $order['lname']; ?></td>
                                        <td><?php echo $order['datetime']; ?></td>
                                        <td><?php echo $order['price']; ?></td>
                                        <td><?php echo $order['status']; ?></td>
                                        <td><a href="orderhview.php?order_id=<?php echo $order['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no order pending.</p>
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
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse">More Order Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="collapse">
                            <?php if(!empty($ordersrequest)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($ordersrequest as $orders): ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $orders['ol_id']; ?></td>
                                        <td><?php echo $orders['fname']; ?> <?php echo $orders['lname']; ?></td>
                                        <td><?php echo $orders['datetime']; ?></td>
                                        <td><?php echo $orders['price']; ?></td>
                                        <td><?php echo $orders['status']; ?></td>
                                        <td><a href="porderview.php?order_id=<?php echo $orders['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no order pending.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>