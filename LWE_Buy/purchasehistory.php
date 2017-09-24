<?php

require_once 'connection/config.php';
session_start();
$_SESSION['user_id'] =1;

$purchaselistQuery = $db->prepare("
    SELECT *
    FROM order_list
    WHERE user_id=:user_id AND status = 'Success'
    ORDER BY datetime desc
");

$purchaselistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchaselist = $purchaselistQuery->rowCount() ? $purchaselistQuery : [];

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
                        <?php if(!empty($purchaselist)): ?>
                        <table class="table thead-bordered table-hover purchaselist" style="width:80%">
                            <thead>
                                <tr>
                                    <th>Order#</th>
                                    <th>Placed on</th>
                                    <th>Total (RM)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php foreach($purchaselist as $purchase): ?>
                            <tbody class="purchase">
                                <tr>
                                    <td><?php echo $purchase['ol_id']; ?></td>
                                    <td><?php echo $purchase['datetime']; ?></td>
                                    <td><?php echo $purchase['price']; ?></td>
                                    <td><?php echo $purchase['status']; ?></td>
                                    <td><a href="purchaseview.php?order_id=<?php echo $purchase['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
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
        
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>