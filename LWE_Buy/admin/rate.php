<?php

require_once '../connection/config.php';
session_start();

$query = "SELECT * 
          FROM adjust
          WHERE name = 'point'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$query1 = "SELECT * 
          FROM adjust
          WHERE name = 'currency'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * 
          FROM shipping_price";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html data-ng-app="">
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
        
    </head>

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>
        <div class="container">
            <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Adjust Rate</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <form action="updateratio.php" method="post">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Point Ratio</h2>
                                <hr/>
                                <center>
                                    <h4>
                                        1 points = RM <input type="number" name="pointratio" step="0.01" value="<?php echo $results['value']; ?>" style="width: 20%;" />
                                        <br/><br/>
                                        <input type="hidden" name="adjust_id" value="<?php echo $results['id']; ?>"/>
                                        <input type="submit" class="btn btn-success" name="update-point" value="Save">
                                    </h4>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="updateratio.php" method="post">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Currency Ratio</h2>
                                <hr/>
                                <center>
                                    <h4>
                                        RM 1.00 = RMB <input type="number" name="currencyratio" step="0.01" value="<?php echo $results1['value']; ?>" style="width: 20%;" />
                                        <br/><br/>
                                        <input type="hidden" name="adjust_id" value="<?php echo $results1['id']; ?>"/>
                                        <input type="submit" class="btn btn-success" name="update-currency" value="Save">
                                    </h4>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row udashrow1">
                <form action="updateratio.php" method="post">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Weight Ratio</h2>
                        <hr/>
                        <center>
                            <h4>
                                Weight ≤ 1KG = RM <input type="number" step="0.01" name="bweight" ng-model="bweight" ng-init="bweight=<?php echo $results2['bprice']; ?>" style="width: 20%;" />
                                <br/><br/>
                                Over 1KG = RM {{bweight/2 | number:2}}/500g
                                <br/><br/>
                                <input type="hidden" name="sp_id" value="<?php echo $results2['sp_id']; ?>"/>
                                <input type="hidden" name="oweight" value="{{bweight/2 | number:2}}"/>
                                <input type="submit" class="btn btn-success" name="update-weight" value="Save">
                            </h4>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>