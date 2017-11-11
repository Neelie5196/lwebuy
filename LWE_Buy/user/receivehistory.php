<?php

require_once '../connection/config.php';
session_start();
$counter=0;
$counters=0;
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM receive_request
          WHERE user_id = '$user_id' AND status = 'Request'
          ORDER BY datetime desc";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM receive_request
           WHERE user_id = '$user_id' AND status = 'Received'
           ORDER BY datetime desc";
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
                <h2>Inventory</h2>
                <hr/>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <p style="float: right;"><a href='message.php' class='btn btn-default' name='contact'>Contact Admin</a> <a href='receive-1.php' class='btn btn-default' name='new'>New Receive</a></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Request (<?php echo mysqli_num_rows($result); ?>)</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#request">More Item Details</button>
                    </div>
                </div>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="request">
                                <?php 
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Placed on</th>
                                                <th>Order Code</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $counter++;
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $counter; ?></td>
                                                    <td width="40%"><?php echo $row['name']; ?></td>
                                                    <td width="15%"><?php echo $row['datetime']; ?></td>
                                                    <td width="15%"><?php echo $row['order_code']; ?></td>
                                                    <td width="10%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="deletereceive.php?rr_id=<?php echo $row['rr_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }else{
                                        ?>
                                            <p>There is no receive request.</p>
                                        <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Received (<?php echo mysqli_num_rows($result1); ?>)</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#received">More Item Details</button>
                    </div>
                </div>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="received">
                                <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Placed on</th>
                                                <th>Order Code</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result1))
                                        {
                                            $counters++;
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $counters; ?></td>
                                                    <td width="40%"><?php echo $row['name']; ?></td>
                                                    <td width="20%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['order_code']; ?></td>
                                                    <td width="15%"><?php echo $row['status']; ?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }else{
                                        ?>
                                            <p>There is no received items.</p>
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