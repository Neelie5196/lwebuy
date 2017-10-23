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

                                    <p>0</p>
                                    
                                    <?php endif; ?>
                                    
                                    <p>
                                        <button type="button" class="btn btn-default btntopup" data-toggle="modal" data-target="#topupModal">Top up</button>
                                    </p>

                                    <div id="topupModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form>
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
                                                        
                                                        <p>Instructions for top up:<br/>
                                                            Please bank in amount to the following bank account and submit transaction details. Thank you.</p>
                                                        <p>
                                                            Bank: <br/>
                                                            Account No.: <br/>
                                                            Account name: 
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button href="#submitModal" class="btn btn-default" data-dismiss="modal" data-toggle="modal">Submit Transaction</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>                                                    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="submitModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Submit Transaction Details</h4>
                                                </div>
                                                
                                                <form action="reload.php" method="post">
                                                    <div class="modal=body">
                                                        <div class="transcontainer">
                                                            <div class="row frmtrans">
                                                                <div class="col-xs-5 col-md-5 col-lg-5">
                                                                    <label for="transno">Transaction no.: </label>
                                                                </div>
                                                                <div class="col-xs-7 col-md-7 col-lg-7">
                                                                    <input type="text" name="transno" id="transno" required/>
                                                                </div>
                                                            </div>

                                                            <div class="row frmtrans">
                                                                <div class="col-xs-5 col-md-5 col-lg-5">
                                                                    <label for="transamt">Transaction amount (MYR): </label>
                                                                </div>
                                                                <div class="col-xs-7 col-md-7 col-lg-7">
                                                                    <input type="text" name="transamt" id="transamt" required/>
                                                                </div>
                                                            </div>

                                                            <div class="row frmtrans">
                                                                <div class="col-xs-5 col-md-5 col-lg-5">
                                                                    <label for="image">Transaction receipt: </label>
                                                                </div>
                                                                <div class="col-xs-7 col-md-7 col-lg-7">
                                                                    <input type="file" name="image" id="image" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default" name="transaction">Submit</button>
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
            
            <div class="col-xs-3 col-md-3 col-lg-3">
                <div class="row udashrow2">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <!-- shipping price -->
                        <h3>Shipping price calculator</h3> 
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <form class="center" method="post">
									<table class="table table-bordered">
                                        <tr>
                                            <td><label for="from">From</label></td>
                                            <td><select name="from">
                                                <option value="west">west</option>
                                                <option value="east">east</option>
                                            </select></td>
                                        </tr>

                                        <tr>
                                            <td><label>Weight</label></td>
                                            <td><input type="number" name="camount" required=""/></td>
                                        </tr>
                                        <tr>
                                        <td><label>Answer</label></td>
                                        <td><?php 
                                        if (isset($_POST['convert'])) {
                                            $from=$_POST['from'];
                                            $amount=$_POST['camount'];

                                            if($amount==''||is_int($amount))
                                            {
                                                echo "Please Enter Valid Amount";
                                                exit();
                                            }

                                            echo '<div class="center">';
                                            if($from=='west'){
                                                if($amount >= 10){
                                                    $result=$amount*4.5;
                                                    echo "RM".$result;
                                                }
                                                else if($amount < 1.5){
                                                    $result=$amount*6;
                                                    echo "RM".$result;
                                                }
                                                else if($amount >1.5 && $amount <3.5){
                                                    $result=$amount*5.5;
                                                    echo "RM".$result;
                                                }
                                                else if($amount >4.0 && $amount <10){
                                                    $result=$amount*5;
                                                    echo "RM".$result;
                                                }

                                            }
                                            else if ($from=='east') {
                                                if($amount>=1){
                                                    $result=$amount*19;
                                                    echo "RM".$result;
                                                }


                                            }
                                                echo '</div>';
                                            }
                                         ?></td>
                                        </tr>
									</table>
                                    
                                    <input type="submit" value="Convert" name="convert"/>
                                </form>
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
                            <div class="col-xs-6 col-md-6 col-lg-6">
									<form class="center" method="post">
									<table class="table table-bordered">
									<tr>
										<td><label for="from">From</label></td>
										<td><select name="from">
											<option value="myr">MYR</option>
											<option value="rmb">RMB</option>
											<option value="usd">USD</option>
										</select></td>
									</tr>
									<tr>
										<td><label for="to">To</label></td>
										<td><select name="to">
											<option value="myr">MYR</option>
											<option value="rmb">RMB</option>
											<option value="usd">USD</option>
										</select></td>
									</tr>
									<tr>
										<td><label>Enter Amount</label></td>
										<td><input type="number" name="camount" required=""/></td>
									</tr>
									<tr>
									<td><label>Answer</label></td>
									<td><?php 
									if (isset($_POST['convert'])) {
										$from=$_POST['from'];
										$to=$_POST['to'];
										$amount=$_POST['camount'];

										if($amount==''||is_int($amount))
										{
											echo "Please Enter Valid Amount";
											exit();
										}

										echo '<div class="center">';
										if($from=='myr'){
											if($to=='myr'){
												$result=$amount*1;
												echo "MYR to   ".$result." MYR";
											}
											else if ($to=='rmb') {
												$result=$amount*1.57;
												echo "MYR==>   ".$result." RMB";
											}
											else if ($to=='usd') {
												$result=$amount*0.24;
												echo "MYR==>   ".$result." USD";
											}
										}
										else if ($from=='rmb') {
											if($to=='myr'){
												$result=$amount*0.64;
												echo "RMB==>   ".$result." MYR";
											}
											else if ($to=='rmb') {
												$result=$amount*1;
												echo "RMB==>   ".$result." RMB";
											}
											else if ($to=='usd') {
												$result=$amount*0.15;
												echo "RMB==>   ".$result." USD";
											}
										}
										else if ($from=='usd') {
											if($to=='usd'){
												$result=$amount*1;
												echo "USD==>   ".$result." USD";
											}
											else if ($to=='rmb') {
												$result=$amount*6.65;
												echo "USD==>   ".$result." RMB";
											}
											else if ($to=='usd') {
												$result=$amount*4.24;
												echo "USD==>   ".$result." MYR";
											}
											}
											echo '</div>';
										}
									 ?></td>
									</tr>
									</table>
									<input type="submit" value="Convert" name="convert"/>
									</form>
								</body>
								</html>

								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>