<?php

require_once '../connection/config.php';
session_start();

$orderhistoryQuery = $db->prepare("
    SELECT *
    FROM order_list
    WHERE status = 'Success'
    ORDER BY datetime desc
");

$orderhistoryQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$orderhistory = $orderhistoryQuery->rowCount() ? $orderhistoryQuery : [];

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
            
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($orderhistory)): ?>
                        <table class="table thead-bordered table-hover orderhistory" style="width:80%">
                            <thead>
                                <tr>
                                    <th>Order#</th>
                                    <th>Placed on</th>
                                    <th>Total (RM)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php foreach($orderhistory as $order): ?>
                            <tbody class="order">
                                <tr>
                                    <td><?php echo $order['ol_id']; ?></td>
                                    <td><?php echo $order['datetime']; ?></td>
                                    <td><?php echo $order['price']; ?></td>
                                    <td><?php echo $order['status']; ?></td>
                                    <td><a href="orderhview.php?order_id=<?php echo $order['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>There is no purchase item.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>