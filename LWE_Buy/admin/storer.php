<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$counters = 0;

$query1 = "SELECT *
            FROM ((order_list ol
            JOIN users us
            ON us.user_id = ol.user_id)
            JOIN order_item oi
            ON oi.order_id = ol.ol_id)
            WHERE statuss = 'Received'
            ORDER BY datetimes desc";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
            FROM users us
            JOIN receive_request rr
            ON rr.user_id = us.user_id
            WHERE status= 'Received'
            ORDER BY datetime desc";
$result2 = mysqli_query($con, $query2);

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

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <center>
            <div class="container">
                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Store Record</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <div class="row" style="padding-top: -10px;">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <h3>Order Item</h3>
                                    <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover" id="receive">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">User</th>
                                                <th width="25%">Item</th>
                                                <th width="25%">Order Code</th>
                                                <th width="25%">Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result1))
                                            {
                                                $counter++;
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['order_code']; ?></td>
                                                        <td><?php echo $row['statuss']; ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <p>There is no received item.</p>
                                            <?php
                                        }
                                    ?>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <h3>Receive Item Request</h3>
                                    <?php 
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover" id="receives">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">User</th>
                                                <th width="25%">Item</th>
                                                <th width="25%">Order Code</th>
                                                <th width="25%">Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result2))
                                            {
                                                $counters++;
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $counters; ?></td>
                                                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['order_code']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <p>There is no received item.</p>
                                            <?php
                                        }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>