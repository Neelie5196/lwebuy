<?php

require_once '../connection/config.php';
session_start();

$query = "SELECT * 
          FROM adjust
          WHERE name = 'point'";
$result = mysql_query($query);
$results = mysql_fetch_assoc($result);

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
            <div class="col-xs-5 col-md-5 col-lg-5">
                <a href="purchaselist.php">
                    <div class="row udashrow1">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <!-- purchase -->
                            <h3>Purchase</h3>
                            
                            <div class="row">
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box1">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Pending requests</p>

                                            <p>
                                            <?php
                                                $purchasesettingQuery = $db->prepare("SELECT status FROM order_list WHERE user_id=:user_id");

                                                $purchasesettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $purchasesetting = $purchasesettingQuery->rowCount() ? $purchasesettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($purchasesetting))
                                                {
                                                    foreach($purchasesetting as $purchase)
                                                    {
                                                        if ($purchase['status']=="Request")
                                                        {
                                                            $count += 1;
                                                        }
                                                        else
                                                        {
                                                            $count = $count;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Awaiting payment</p>
                                            
                                            <p>
                                            <?php
                                                $purchasesettingQuery = $db->prepare("SELECT status FROM order_list WHERE user_id=:user_id");

                                                $purchasesettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $purchasesetting = $purchasesettingQuery->rowCount() ? $purchasesettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($purchasesetting))
                                                {
                                                    foreach($purchasesetting as $purchase)
                                                    {
                                                        if ($purchase['status']=="Ready to Pay")
                                                        {
                                                            $count += 1;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Parcels proceeded</p>
                                            
                                            <p>
                                            <?php
                                                $purchasesettingQuery = $db->prepare("SELECT status FROM order_list WHERE user_id=:user_id");

                                                $purchasesettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $purchasesetting = $purchasesettingQuery->rowCount() ? $purchasesettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($purchasesetting))
                                                {
                                                    foreach($purchasesetting as $purchase)
                                                    {
                                                        if ($purchase['status']=="Paid")
                                                        {
                                                            $count += 1;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Parcels in-house</p>
                                            
                                            <p>
                                            <?php
                                                $purchasesettingQuery = $db->prepare("SELECT status FROM order_list WHERE user_id=:user_id");

                                                $purchasesettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $purchasesetting = $purchasesettingQuery->rowCount() ? $purchasesettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($purchasesetting))
                                                {
                                                    foreach($purchasesetting as $purchase)
                                                    {
                                                        if ($purchase['status']=="received")
                                                        {
                                                            $count += 1;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-xs-5 col-md-5 col-lg-5">
                <a href="shippinglist.php">
                    <div class="row udashrow1">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <!-- shipping -->
                            <h3>Shipping</h3>
                            
                            <div class="row">
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box1">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Pending requests</p>
                                            
                                            <p>
                                            <?php
                                                $shippingsettingQuery = $db->prepare("SELECT status FROM shipping WHERE user_id=:user_id");

                                                $shippingsettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $shippingsetting = $shippingsettingQuery->rowCount() ? $shippingsettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($shippingsetting))
                                                {
                                                    foreach($shippingsetting as $shipping)
                                                    {
                                                        if ($shipping['status']=="pending")
                                                        {
                                                            $count += 1;
                                                        }
                                                        else
                                                        {
                                                            $count = $count;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Awaiting payment</p>
                                            
                                            <p>
                                            <?php
                                                $shippingsettingQuery = $db->prepare("SELECT status FROM shipping WHERE user_id=:user_id");

                                                $shippingsettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $shippingsetting = $shippingsettingQuery->rowCount() ? $shippingsettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($shippingsetting))
                                                {
                                                    foreach($shippingsetting as $shipping)
                                                    {
                                                        if ($shipping['status']=="approved")
                                                        {
                                                            $count += 1;
                                                        }
                                                        else
                                                        {
                                                            $count = $count;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Items proceeded</p>
                                            
                                            <p>
                                            <?php
                                                $shippingsettingQuery = $db->prepare("SELECT status FROM shipping WHERE user_id=:user_id");

                                                $shippingsettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $shippingsetting = $shippingsettingQuery->rowCount() ? $shippingsettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($shippingsetting))
                                                {
                                                    foreach($shippingsetting as $shipping)
                                                    {
                                                        if ($shipping['status']=="proceeded")
                                                        {
                                                            $count += 1;
                                                        }
                                                        else
                                                        {
                                                            $count = $count;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Pending response</p>
                                            
                                            <p>
                                            <?php
                                                $shippingsettingQuery = $db->prepare("SELECT status FROM shipping WHERE user_id=:user_id");

                                                $shippingsettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                                $shippingsetting = $shippingsettingQuery->rowCount() ? $shippingsettingQuery : [];
            
                                                $count = 0;
                                                if(!empty($shippingsetting))
                                                {
                                                    foreach($shippingsetting as $shipping)
                                                    {
                                                        if ($shipping['status']=="arrived")
                                                        {
                                                            $count += 1;
                                                        }
                                                        else
                                                        {
                                                            $count = $count;
                                                        }
                                                    }
                                                echo $count;
                                            ?>
                                            </p>
                                            
                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                            <p>0</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-xs-2 col-md-2 col-lg-2">
                <a href="#">
                    <div class="row udashrow1">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <!-- point -->
                            <h3>Points</h3>
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 udashrow1box1">
                                    <?php
                                        $pointbalanceQuery = $db->prepare("SELECT * FROM point WHERE user_id=:user_id");

                                        $pointbalanceQuery->execute(['user_id' => $_SESSION['user_id']]);

                                        $pointbalance = $pointbalanceQuery->rowCount() ? $pointbalanceQuery : [];
                                        
                                        if(!empty($pointbalance)):
                                            foreach($pointbalance as $point):
                                    ?>
                                    
                                    <p><?php echo $point['point']; ?></p>
                                    
                                    <?php
                                        endforeach;
                                        
                                        else:
                                    ?>

                                    <p>0</p>
                                    
                                    <?php endif; ?>
                                    
                                    <p>
                                        <button type="button" class="btn btn-default btntopup" data-toggle="modal" data-target="#topupModal">Top up</button>
                                    </p>

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
                                                            <input type="hidden" name="amount" value="{{reloadamt*<?php echo $results['value']; ?> | number:2}}">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-6 col-md-6 col-lg-6">
                <div class="row udashrow2">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <!-- address -->
                        <h3>Warehouse details</h3>
                        
                        <form method="post" action="dashboard.php">
                            <?php
                                $warehousesettingQuery = $db->prepare("SELECT * FROM warehouse");

                                $warehousesettingQuery->execute();

                                $warehousesetting = $warehousesettingQuery->rowCount() ? $warehousesettingQuery : [];

                                foreach($warehousesetting as $warehouse):
                            ?>

                            <input type="submit" name="getwarehouse" value="<?php echo $warehouse['country_description']; ?>"/>
                            
                            <?php
                                endforeach;
                            ?>
                        </form>
                        
                        <div>
                            <?php
                                $wh_id = 0;
                            
                                if (isset($_POST['getwarehouse']))
                                {
                                    $wh_country = $_POST['getwarehouse'];
                                    
                                    $warehousesettingQuery = $db->prepare("SELECT * FROM warehouse country_description=:wh_country");

                                    $warehousesettingQuery->execute(['wh_country' => $wh_country]);


                                    $warehousesetting = $warehousesettingQuery->rowCount() ? $warehousesettingQuery : [];

                                    foreach($warehousesetting as $warehouse):
                            ?>
                            <div class="row warehousedetr">
                                <div class="col-xs-1 col-md-1 col-lg-1">
                                    <label for="stName">Name: </label>
                                </div>

                                <div class="col-xs-11 col-md-11 col-lg-11">
                                    <input type="text" id="stName" name="stName" value="<?php echo $warehouse['station_name']; ?>" class=" warehousedetfield" disabled/>
                                </div>
                            </div>
                            
                            <div class="row warehousedetr">
                                <div class="col-xs-1 col-md-1 col-lg-1">
                                    <label for="stAddress">Address: </label>
                                </div>

                                <div class="col-xs-11 col-md-11 col-lg-11  ">
                                    <input type="text" id="stAddress" name="stAddress" value="<?php echo $warehouse['station_description']; ?>" class=" warehousedetfield" disabled/>
                                </div>
                            </div>
                            
                            <div class="row warehousedetr">
                                <div class="col-xs-1 col-md-1 col-lg-1">
                                    <label for="stCty">Country: </label>
                                </div>

                                <div class="col-xs-11 col-md-11 col-lg-11 ">
                                    <input type="text" id="stCty" name="stCty" value="<?php echo $warehouse['country_description']; ?>" class=" warehousedetfield" disabled/>
                                </div>
                            </div>
                            
                            <?php
                                    endforeach;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>