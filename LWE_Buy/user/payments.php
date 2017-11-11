<?php
require_once '../connection/config.php';
session_start();

if(isset($_POST['pay'])){
    $user_id = $_SESSION['user_id'];
    $rname = $_POST['rname'];
    $rcontact = $_POST['rcontact'];
    $a_id = $_POST['address'];
    $weight = $_POST['weight'];
    $price = $_POST['pricetotal'];
    $status = "Pending Payment";
    $action = 'Packing';
    $i_id = $_POST['i_id'];

    $result = mysqli_query($con, "INSERT INTO shipping SET user_id='$user_id', recipient_name='$rname', recipient_contact='$rcontact', a_id='$a_id', weight='$weight', price='$price', status='$status'") or die(mysqli_error($con));
    $s_id = mysqli_insert_id($con);

    $result = mysqli_query($con, "UPDATE item SET shipping_id ='$s_id', action='$action' WHERE i_id IN (".implode(',',$i_id).")") or die(mysqli_error($con));
}

if(isset($_POST['ppay'])){
    $s_id = $_POST['s_id'];
}

$query = "SELECT * 
          FROM adjust
          WHERE name = 'point'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);



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

		<!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		
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

    <body background="../resources/img/bg.jpg" ng-app="">
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
        <section class="content">
            <div class="container">
                <div class="row">
                    <center style="padding-bottom: 15px;">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <form action="paidshipping.php" method="post" enctype="multipart/form-data">
                                        <h3>Upload Banking Receipt</h3>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label>Transaction receipt: </label>
                                                <input type="file" name="file" required/>
                                                <input type="hidden" name="amount" class="form-control" value="<?php echo $_POST['pricetotal']; ?>">
                                                <input type="hidden" name="s_id" class="form-control" value="<?php echo $s_id; ?>">
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
                                                <p>Account No: 123456789</p>
                                                <p>Account Name: Logistics Worldwide Express(M) Sdn Bhd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-1 col-lg-1">
                                    <div class="vl"></div>
                                </div>
                                <div class="col-xs-12 col-md-5 col-lg-5">
                                    <form action="paidshipping.php" method="post">
                                        <h3>Pay by LEW Point</h3>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <div class="details">
                                                    <?php
                                                        $query9 = "SELECT * FROM point WHERE user_id='$user_id'";
                                                        $result9 = mysqli_query($con, $query9);
                                                        $results9 = mysqli_fetch_assoc($result9);

                                                        if($results9 > 0){
                                                            ?>
                                                                <input type="hidden" name="point" class="form-control" value="<?php echo $results9['point']; ?>">
                                                                <p>LWE point: <?php echo $results9['point']; ?></p>
                                                            <?php
                                                        }else{
                                                            echo '<p>0</p>';
                                                        }
                                                    ?>
                                                    <p><button type="button" class="btn btn-default btntopup" data-toggle="modal" data-target="#topupModal">Top Up</button></p>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="hidden" name="s_id" class="form-control" value="<?php echo $s_id; ?>">
                                                <input type="hidden" name="paypoint" class="form-control" value="<?php echo number_format((float)$_POST['pricetotal']/$results['value'], 2, '.', ''); ?>">
                                                <p>RM <?php echo $_POST['pricetotal']; ?> = <?php echo number_format((float)$_POST['pricetotal']/$results['value'], 2, '.', ''); ?> point</p>
                                                <input type="submit" class="btn btn-success" name="pay" value="Pay Now">
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
                    <form action="reload.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Point Reload</h4>
                        </div>

                        <div class="modal-body">
                            <p>Enter point amount to reload</p>
                            <p>
                                <input type="number" name="reloadamt" ng-model="reloadamt" ng-init="reloadamt=1"/>
                            </p>

                            <p>
                                <input type="hidden" name="amount" value="{{reloadamt*<?php echo $results['value']; ?>}}">
                                Amount to be paid: RM {{reloadamt*<?php echo $results['value']; ?> | number:2}}
                            </p>

                            <p>Instructions for top up:<br/>
                                Please bank in amount to the following bank account and submit transaction details. Thank you.</p>
                            <p>
                                Bank: Maybank<br/>
                                Account No.: 123456789<br/>
                                Account name: Logistics Worldwide Express(M) Sdn Bhd
                            </p>

                            <label for="file">Transaction receipt: </label>
                            <input type="file" name="file" id="file" required/>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="transaction">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>                                                    
                </div>
            </div>
        </div>
    </body>
</html>