<?php

require_once '../connection/config.php';
session_start();

$query = "SELECT * 
          FROM adjust
          WHERE name = 'point'";
$result = mysql_query($query);
$results = mysql_fetch_assoc($result);

$query1 = "SELECT * 
          FROM adjust
          WHERE name = 'currency'";
$result1 = mysql_query($query1);
$results1 = mysql_fetch_assoc($result1);

$query2 = "SELECT * 
          FROM shipping_price";
$result2 = mysql_query($query2);
$results2 = mysql_fetch_assoc($result2);

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

        <div class="row"> 
            <div class="col-xs-4 col-md-4 col-lg-4">
                <a href="orderrequest.php">
                    <div class="row udashrow1">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <h2>New Orders</h2>
                            
                            <h3 class="admindash">
                                <?php
                                    $count = 0; 
            
                                    $ordersQuery = $db->prepare("SELECT * FROM order_list");
                                        
                                    $ordersQuery->execute();
                                        
                                    $orders = $ordersQuery->rowCount() ? $ordersQuery : [];
            
                                    $count = 0;
                                    if(!empty($orders))
                                    {
                                        foreach($orders as $o)
                                        {
                                            if ($o['status']=="Request")
                                            {
                                                $count += 1;
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "Error";
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
                                    $count = 0; 
            
                                    $reloadQuery = $db->prepare("SELECT * FROM payment");
                                        
                                    $reloadQuery->execute();
                                        
                                    $reload = $reloadQuery->rowCount() ? $reloadQuery : [];
            
                                    $count = 0;
                                    if(!empty($reload))
                                    {
                                        foreach($reload as $r)
                                        {
                                            if ($r['status']=="Waiting for Approve")
                                            {
                                                $count += 1;
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "Error";
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
                                    $count = 0; 
            
                                    $feedbackQuery = $db->prepare("SELECT * FROM contact");
                                        
                                    $feedbackQuery->execute();
                                        
                                    $feedback = $feedbackQuery->rowCount() ? $feedbackQuery : [];
            
                                    $count = 0;
                                    if(!empty($feedback))
                                    {
                                        foreach($feedback as $f)
                                        {
                                            if ($f['status']=="unread")
                                            {
                                                $count += 1;
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "Error";
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
                                    $count = 0; 
            
                                    $usersQuery = $db->prepare("SELECT * FROM users");
                                        
                                    $usersQuery->execute();
                                        
                                    $users = $usersQuery->rowCount() ? $usersQuery : [];
            
                                    $count = 0;
                                    if(!empty($users))
                                    {
                                        foreach($users as $u)
                                        {
                                            if ($u['type']=="customer")
                                            {
                                                $count += 1;
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "Error";
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
                                    $count = 0; 
            
                                    $ordersQuery = $db->prepare("SELECT * FROM order_list");
                                        
                                    $ordersQuery->execute();
                                        
                                    $orders = $ordersQuery->rowCount() ? $ordersQuery : [];
            
                                    $count = 0;
                                    if(!empty($orders))
                                    {
                                        foreach($orders as $o)
                                        {
                                            if ($o['status']!="Request")
                                            {
                                                $count += 1;
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "Error";
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
                                    $count = 0; 
            
                                    $shippingQuery = $db->prepare("SELECT * FROM shipping");
                                        
                                    $shippingQuery->execute();
                                        
                                    $shipping = $shippingQuery->rowCount() ? $shippingQuery : [];
            
                                    $count = 0;
                                    if(!empty($shipping))
                                    {
                                        foreach($shipping as $s)
                                        {
                                            if ($s['status']=="received")
                                            {
                                                $count += 1;
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "Error";
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
                                    $count = 0; 
            
                                    $creditQuery = $db->prepare("SELECT * FROM payment");
                                        
                                    $creditQuery->execute();
                                        
                                    $credit = $creditQuery->rowCount() ? $creditQuery : [];
            
                                    $count = 0;
                                    if(!empty($credit))
                                    {
                                        foreach($credit as $c)
                                        {
                                            if ($c['status']=="Completed")
                                            {
                                                $count += $c['amount'];
                                            }
                                            else
                                            {
                                                $count = $count;
                                            }
                                        }
                                        
                                    echo $count;
                                        
                                    }
                                    else
                                    {
                                        echo "0";
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
    </body>
</html>