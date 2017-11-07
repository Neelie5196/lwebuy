<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT * 
          FROM adjust
          WHERE name = 'point'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

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
                                                $query1 = "SELECT status FROM order_list WHERE user_id='$user_id'";
                                                $result1 = mysqli_query($con, $query1);
                                                $count1 = 0;
                                                if(mysqli_num_rows($result1) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result1))
                                                    {
                                                        if ($row['status']=="Request")
                                                        {
                                                            $count1 += 1;
                                                        }
                                                        else
                                                        {
                                                            $count1 = $count1;
                                                        }
                                                    }
                                                    echo $count1;
                                                }else{
                                                    echo '<p>0</p>';
                                                }
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Awaiting payment</p>
                                            
                                            <p>
                                            <?php
                                                $query2 = "SELECT status FROM order_list WHERE user_id='$user_id'";
                                                $result2 = mysqli_query($con, $query2);
                                                $count2 = 0;
                                                if(mysqli_num_rows($result2) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result2))
                                                    {
                                                        if ($row['status']=="Ready to pay")
                                                        {
                                                            $count2 += 1;
                                                        }
                                                        else
                                                        {
                                                            $count2 = $count2;
                                                        }
                                                    }
                                                    echo $count2;
                                                }else{
                                                    echo '<p>0</p>';
                                                }
                                            ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Parcels proceeded</p>
                                            
                                            <p>
                                            <?php
                                                $query3 = "SELECT status FROM order_list WHERE user_id='$user_id'";
                                                $result3 = mysqli_query($con, $query3);
                                                $count3 = 0;
                                                if(mysqli_num_rows($result3) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result3))
                                                    {
                                                        if ($row['status']=="Paid")
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
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Parcels in-house</p>
                                            
                                            <p>
                                            <?php
                                                $query4 = "SELECT * FROM slot sl JOIN item it ON sl.s_id = it.s_id WHERE user_id='$user_id'";
                                                $result4 = mysqli_query($con, $query4);
                                                $count4 = 0;
                                                if(mysqli_num_rows($result4) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result4))
                                                    {
                                                        if ($row['action']=="In")
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
                                            </p>
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
                                                $query5 = "SELECT status FROM shipping WHERE user_id='$user_id'";
                                                $result5 = mysqli_query($con, $query5);
                                                $count5 = 0;
                                                if(mysqli_num_rows($result5) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result5))
                                                    {
                                                        if ($row['status']=="Request")
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
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Awaiting payment</p>
                                            
                                            <p>
                                            <?php
                                                $query6 = "SELECT status FROM shipping WHERE user_id='$user_id'";
                                                $result6 = mysqli_query($con, $query5);
                                                $count6 = 0;
                                                if(mysqli_num_rows($result6) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result6))
                                                    {
                                                        if ($row['status']=="Pending Payment")
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
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Items proceeded</p>
                                            
                                            <p>
                                            <?php
                                                $query7 = "SELECT status FROM shipping WHERE user_id='$user_id'";
                                                $result7 = mysqli_query($con, $query7);
                                                $count7 = 0;
                                                if(mysqli_num_rows($result7) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result7))
                                                    {
                                                        if ($row['status']=="Proceed")
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
                                            </p>                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3 col-md-3 col-lg-3 udashrow1box2">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <p>Delivered Items</p>
                                            
                                            <p>
                                            <?php
                                                $query8 = "SELECT status FROM shipping WHERE user_id='$user_id'";
                                                $result8 = mysqli_query($con, $query8);
                                                $count8 = 0;
                                                if(mysqli_num_rows($result8) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result8))
                                                    {
                                                        if ($row['status']=="Delivered")
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
                                            </p>
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
                                        $query9 = "SELECT * FROM point WHERE user_id='$user_id'";
                                        $result9 = mysqli_query($con, $query9);
                                        $results9 = mysqli_fetch_assoc($result9);
                                    
                                        if($results9 > 0){
                                            ?>
                                                <p><?php echo $results9['point']; ?></p>
                                            <?php
                                        }else{
                                            echo '<p>0</p>';
                                        }
                                    ?>                                    
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
                        
	
                        <div>
                            <div class="row warehousedetr">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <label for="stName">Name: </label>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-12">
                                  <input type="text" id="name" autocomplete="off"  style="border-radius: 30px; width: 30%;">
                                </div>			
                            </div>
							<div class="row warehousedetr">                  
                                <div class="col-xs-11 col-md-11 col-lg-11">
								 <label for="stName">Address: </label>
									<div id ="name-data"></div>	
                                </div>			
                            </div>
                             <div class="row warehousedetr">                  
                                <div class="col-xs-11 col-md-11 col-lg-11">
									 <input type= "submit" id ="name-submit" class="btn btn-success" value="Get" >
									 
                                </div>			
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/global.js"></script>
	<script type="text/javascript" src="js/typeahead.js"></script>
	<script>
    $(document).ready(function () {
        $('#name').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>