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
<html>
    <head>
        <title>LWE Buy</title>

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

    <body ng-app="">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>
        
        <div class="container">
            <div class="row"> 
                <div class="col-xs-4 col-md-4 col-lg-4">
                    <a href="orderrequest.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>New Orders</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query3 = "SELECT * FROM order_list";
                                        $result3 = mysqli_query($con, $query3);
                                        $count3 = 0;
                                        if(mysqli_num_rows($result3) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result3))
                                            {
                                                if ($row['status']=="Request")
                                                {
                                                    $count3 += 1;
                                                }
                                                else
                                                {
                                                    $count3 = $count3;
                                                }
                                            }
                                            echo $count3;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-4 col-md-4 col-lg-4">
                    <a href="topup.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>New Transactions</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query4 = "SELECT * FROM payment";
                                        $result4 = mysqli_query($con, $query4);
                                        $count4 = 0;
                                        if(mysqli_num_rows($result4) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result4))
                                            {
                                                if ($row['status']=="Waiting for Approve")
                                                {
                                                    $count4 += 1;
                                                }
                                                else
                                                {
                                                    $count4 = $count4;
                                                }
                                            }
                                            echo $count4;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-4 col-md-4 col-lg-4">
                    <a href="feedback.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>New Feedbacks</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query5 = "SELECT * FROM contact";
                                        $result5 = mysqli_query($con, $query5);
                                        $count5 = 0;
                                        if(mysqli_num_rows($result5) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result5))
                                            {
                                                if ($row['status']=="unread")
                                                {
                                                    $count5 += 1;
                                                }
                                                else
                                                {
                                                    $count5 = $count5;
                                                }
                                            }
                                            echo $count5;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-md-3 col-lg-3">
                    <a href="customerlist.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Existing Users</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query6 = "SELECT * FROM users";
                                        $result6 = mysqli_query($con, $query6);
                                        $count6 = 0;
                                        if(mysqli_num_rows($result6) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result6))
                                            {
                                                if ($row['type']=="customer")
                                                {
                                                    $count6 += 1;
                                                }
                                                else
                                                {
                                                    $count6 = $count6;
                                                }
                                            }
                                            echo $count6;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-3 col-md-3 col-lg-3">
                    <a href="orderhistory.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Total Orders Done</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query7 = "SELECT * FROM order_list";
                                        $result7 = mysqli_query($con, $query7);
                                        $count7 = 0;
                                        if(mysqli_num_rows($result7) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result7))
                                            {
                                                if ($row['status']=="Received")
                                                {
                                                    $count7 += 1;
                                                }
                                                else
                                                {
                                                    $count7 = $count7;
                                                }
                                            }
                                            echo $count7;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-3 col-md-3 col-lg-3">
                    <a href="shippinglist.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Total Items Shipped</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query8 = "SELECT * FROM shipping";
                                        $result8 = mysqli_query($con, $query8);
                                        $count8 = 0;
                                        if(mysqli_num_rows($result8) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result8))
                                            {
                                                if ($row['status']=="Received")
                                                {
                                                    $count8 += 1;
                                                }
                                                else
                                                {
                                                    $count8 = $count8;
                                                }
                                            }
                                            echo $count8;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-3 col-md-3 col-lg-3">
                    <a href="credithistory.php">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Total Profit</h2>

                                <h3 class="admindash">
                                    <?php
                                        $query9 = "SELECT * FROM payment";
                                        $result9 = mysqli_query($con, $query9);
                                        $count9 = 0;
                                        if(mysqli_num_rows($result9) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result9))
                                            {
                                                if ($row['status']=="Completed")
                                                {
                                                    $count9 += 1;
                                                }
                                                else
                                                {
                                                    $count9 = $count9;
                                                }
                                            }
                                            echo $count9;
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
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