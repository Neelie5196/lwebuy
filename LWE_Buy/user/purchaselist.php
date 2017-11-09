<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query1 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'request'
           ORDER BY datetime desc";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'ready to pay'
           ORDER BY datetime desc";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'paid'
           ORDER BY datetime desc";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'proceed'
           ORDER BY datetime desc";
$result4 = mysqli_query($con, $query4);

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
                <h2>Purchase</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <p style="float: right;"><a href='message.php' class='btn btn-info' name='contact'>Contact Admin</a> <a href='purchaseproduct-1.php' class='btn btn-default' name='new'>New Purchase</a></p>
                    </div>
                </div>
            </div>
            <br/>
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
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result1))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['ol_id']; ?></td>
                                                    <td width="50%"><?php echo $row['datetime']; ?></td>
                                                    <td width="30%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="purchaseview.php?order_id=<?php echo $row['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no purchase request.</p>
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
                        <strong>Ready to Pay</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <table class="table thead-bordered table-hover" style="width:80%">
                            <thead>
                                <tr>
                                    <th>Order#</th>
                                    <th>Placed on</th>
                                    <th>Total (RM)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php 
                                if(mysqli_num_rows($result2) > 0)
                                {
                                    while($row = mysqli_fetch_array($result2))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td width="5%"><?php echo $row['ol_id']; ?></td>
                                                <td width="40%"><?php echo $row['datetime']; ?></td>
                                                <td width="20%"><?php echo $row['price']; ?></td>
                                                <td width="20%"><?php echo $row['status']; ?></td>
                                                <td width="15%"><a href="purchasepview.php?order_id=<?php echo $row['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no purchase ready to pay.</p>
                                    <?php
                                }
                            ?>
                        </table>
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
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php 
                                    if(mysqli_num_rows($result3) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result3))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['ol_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="purchasephview.php?order_id=<?php echo $row['ol_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no purchase paid.</p>
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
                        <strong>In Proceed</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse4">More Purchase Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="span12 collapse" id="collapse4">
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Placed on</th>
                                        <th>Total (RM)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php 
                                    if(mysqli_num_rows($result4) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result4))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['ol_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="purchasehview.php?order_id=<?php echo $row['ol_id']; ?>&timeline=Shipping" class="btn btn-xs btn-info">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no purchase paid.</p>
                                        <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>