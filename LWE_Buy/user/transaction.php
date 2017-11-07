<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$i= 0;
$query = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status='Waiting for Approve'";
$result = mysqli_query($con, $query);

$is= 0;
$query1 = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status='Completed'";
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

    <body background="../resources/img/bg.jpg">
        <section class = "content"> 
		<center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
   
            <div class="container">
                <h2>Transaction History</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Pending</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <table class="table thead-bordered" style="width:80%">
                            <thead>
                                <tr>
                                    <th width = "4%">#</th>
                                    <th width = "21%">Detail</th>
                                    <th width = "13%">Amount</th>
                                    <th width = "26%">Created</th>
                                    <th width = "23%">Receipt</th>
                                    <th width = "13%">Status</th>
                                </tr>
                            </thead>
                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $i++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td>RM <?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['datetime']; ?></td>
                                                <td><a href="../resources/img/receipts/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a></td>
                                                <td><a href="#" class="btn btn-xs btn-info"><?php echo $row['status']; ?></a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                ?>
                                    <p>There is no reload request.</p>
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
                        <strong>Completed</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <table class="table thead-bordered" style="width:80%">
                            <thead>
                                <tr>
                                    <th width = "4%">#</th>
                                    <th width = "21%">Detail</th>
                                    <th width = "13%">Amount</th>
                                    <th width = "26%">Created</th>
                                    <th width = "23%">Receipt</th>
                                    <th width = "13%">Status</th>
                                </tr>
                            </thead>
                            <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        $is++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $is; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td>RM <?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['datetime']; ?></td>
                                                <td><a href="../resources/img/receipts/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a></td>
                                                <td><a href="#" class="btn btn-xs btn-info"><?php echo $row['status']; ?></a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                ?>
                                    <p>No Transaction Record.</p>
                                <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
        </center>  
		</section>
    </body>
</html>