<?php

require_once '../connection/config.php';
session_start();

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
        <style>
            .vl {
                border-left: 1px solid lightgrey;
                height: 400px;
            }
            .details p{
                font-size: 100%;
            }
        </style>
    </head>

    <body background="../resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h2>Payment</h2>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h2 style="float: right;">RM <?php echo $_POST['pricetotal']; ?></h2>
                </div>
            </div>
            <hr/>
        </div>
        <section class = "content">
            <div class="container">
                <div class="row">
                    <center>
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <form action="paidpurchase.php" method="post" enctype="multipart/form-data">
                                        <h3>Upload Banking Receipt</h3>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" name="title" class="form-control" placeholder="Title" style="border-radius: 30px; width: 50%;" required><br/>
                                                <input type="file" name="file" />
                                                <input type="hidden" name="order_id" class="form-control" value="<?php echo $_POST['order_id']; ?>">
                                                <br/>
                                                <input type="submit" class="btn btn-success" name="submit" value="Upload">
                                            </div>
                                        </div>
                                    </form>
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Banking Details </p>
                                            <div class="details">
                                                <p>Bank: Maybank</p>
                                                <p>Acount No: 123456789</p>
                                                <p>Name: Logistics Worldwide Express(M) Sdn Bhd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-1 col-lg-1">
                                    <div class="vl"></div>
                                </div>
                                <div class="col-xs-12 col-md-5 col-lg-5">
                                    <form action="#" method="post">
                                        <h3>Pay by LEW Point</h3>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <div class="details">
                                                    <p>LWE point: ######</p>
                                                    <p><button type="button" class="btn btn-default btntopup" data-toggle="modal" data-target="#topupModal">Top Up</button></p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a>
                    </center>
                </div>
            </div>
        </section>
        <div id="topupModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="reload.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">Credit Reload</h4>
                        </div>

                        <div class="modal-body">
                            <p>Enter credit amount to reload</p>
                            <p>
                                <input type="number" name="reloadamt" ng-model="reloadamt" ng-init="reloadamt=1"/>
                            </p>
                            <p>
                                Amount to be paid: RM {{reloadamt*1.57}}
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" name="pay">Pay now</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>                                                    
                </div>
            </div>
        </div>
    </body>
</html>