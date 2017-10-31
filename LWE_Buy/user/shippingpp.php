<?php

require_once '../connection/config.php';
session_start();

$shippinglistQuery = $db->prepare("

    SELECT *
    FROM shipping
    WHERE user_id=:user_id AND status = 'Pending Payment'

");

$shippinglistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$shippinglist = $shippinglistQuery->rowCount() ? $shippinglistQuery : [];

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
                <h2>Pending Payment</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Waiting</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($shippinglist)): ?>
                        <table class="table thead-bordered table-hover" style="width:80%">
                            <thead>
                                <tr>
                                    <th>Shipping#</th>
                                    <th>Placed on</th>
                                    <th>Total (RM)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php foreach($shippinglist as $shipping): ?>
                            <tbody>
                                <tr>
                                    <td width="5%"><?php echo $shipping['s_id']; ?></td>
                                    <td width="40%"><?php echo $shipping['datetime']; ?></td>
                                    <td width="20%"><?php echo $shipping['price']; ?></td>
                                    <td width="20%"><?php echo $shipping['status']; ?></td>
                                    <td width="15%"><a href="#" class="btn btn-xs btn-info">View</a></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>There is no pending payment.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>