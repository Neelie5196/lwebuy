<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM shipping
          WHERE user_id='$user_id' AND status = 'Request'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM shipping
          WHERE user_id='$user_id' AND status = 'Proceed'";
$result1 = mysqli_query($con, $query1);

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

        <div class="container">
            <center>
                <h2>Shipping Request</h2>
                <hr/>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <p style="float: right;"><a href='message.php' class='btn btn-default' name='contact'>Contact Admin</a> <a href='receiveditem.php' class='btn btn-default' name='new'>New Shipping</a></p>
                    </div>
                </div>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Request</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#request">More</button>
                    </div>
                </div>
            
                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="request">
                                <?php 
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Shipping#</th>
                                                <th>Placed on</th>
                                                <th>Total (RM)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['s_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="shippinglrview.php?shipping_id=<?php echo $row['s_id']; ?>" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }else{
                                        ?>
                                            <p>There is no shipping request.</p>
                                        <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>In Proceed</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#proceed">More</button>
                    </div>
                </div>
            
                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="proceed">
                                <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Shipping#</th>
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
                                                    <td width="5%"><?php echo $row['s_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="shippinglpview.php?shipping_id=<?php echo $row['s_id']; ?>&timeline=Proceed" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }else{
                                        ?>
                                            <p>There is no shipping in proceed.</p>
                                        <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </center>
        </div>
        
        <div><?php include('../footer.php') ?></div>
    </body>
</html>