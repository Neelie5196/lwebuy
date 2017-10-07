<?php

require_once '../connection/config.php';
session_start();

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
                                                        if ($purchase['status']=="pending")
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

                                            <p>Error</p>

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
                                                        if ($purchase['status']=="approved")
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

                                            <p>Error</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Pending parcel</p>
                                            
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
                                                        if ($purchase['status']=="purchased")
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

                                            <p>error</p>

                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Parcel received</p>
                                            
                                            <p>
                                            <?php
                                                $purchasesettingQuery = $db->prepare("SELECT status FROM shipping WHERE user_id=:user_id");

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

                                            <p>error</p>

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

                                            <p>Error</p>

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

                                            <p>Error</p>

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

                                            <p>Error</p>

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

                                            <p>Error</p>

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
                                        $creditsettingQuery = $db->prepare("SELECT * FROM credit WHERE user_id=:user_id");

                                        $creditsettingQuery->execute(['user_id' => $_SESSION['user_id']]);

                                        $creditsetting = $creditsettingQuery->rowCount() ? $creditsettingQuery : [];
                                        
                                        if(!empty($creditsetting)):
                                            foreach($creditsetting as $credit):
                                    ?>
                                    
                                    <p><?php echo $credit['amount']; ?></p>
                                    
                                    <?php
                                        endforeach;
                                        
                                        else:
                                    ?>

                                    <p>Error</p>
                                    
                                    <?php endif; ?>
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
                        
                        <?php
                            $wh_id = $_SESSION['user_id'] % 2;

                            $warehousesettingQuery = $db->prepare("SELECT * FROM warehouse WHERE wh_id=:wh_id");

                            $warehousesettingQuery->execute(['wh_id' => $wh_id]);

                            $warehousesetting = $warehousesettingQuery->rowCount() ? $warehousesettingQuery : [];
                            
                            foreach($warehousesetting as $warehouse):
                        ?>
                            
                        <form>
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
                        </form>
                        
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-3 col-md-3 col-lg-3">
                <div class="row udashrow2">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <!-- shipping price -->
                        <h3>Shipping price calculator</h3>
                        
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                calculator here
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-3 col-md-3 col-lg-3">
                <div class="row udashrow2">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <!-- currency -->
                        <h3>Currency calculator</h3>
                        
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                calculator here
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>