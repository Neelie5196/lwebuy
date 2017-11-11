<?php

require_once '../connection/config.php';
session_start();

$query1 = "SELECT *
            FROM order_list ol
            JOIN users us
            ON us.user_id = ol.user_id
            WHERE status = 'ready to pay'
            ORDER BY datetime desc";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
            FROM order_list ol
            JOIN users us
            ON us.user_id = ol.user_id
            WHERE status = 'paid'
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
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Order Pending</h2>
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
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="collapse1">
                            <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                ?>
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
                                    <?php
                                        while($row = mysqli_fetch_array($result1))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['ol_id']; ?></td>
                                                    <td width="40%"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                    <td width="15%"><?php echo $row['datetime']; ?></td>
                                                    <td width="15%"><?php echo $row['price']; ?></td>
                                                    <td width="10%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="orderhviews.php?order_id=<?php echo $row['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no order pending.</p>
                                        <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Ready to Proceed</strong>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result2) > 0)
                            {
                            ?>
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
                                <?php
                                    while($row = mysqli_fetch_array($result2))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td width="5%"><?php echo $row['ol_id']; ?></td>
                                                <td width="40%"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                <td width="15%"><?php echo $row['datetime']; ?></td>
                                                <td width="15%"><?php echo $row['price']; ?></td>
                                                <td width="10%"><?php echo $row['status']; ?></td>
                                                <td width="15%"><a href="porderview.php?order_id=<?php echo $row['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no order pending.</p>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>