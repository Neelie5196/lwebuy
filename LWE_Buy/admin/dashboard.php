<?php

require_once '../connection/config.php';
session_start();
$type = $_SESSION['type'];

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
        <?php
            if($type == 'admin'){
        ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="topup.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Topups</h4>

                                        <p class="admindash">
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="orderrequest.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Orders</h4>

                                        <p class="admindash">
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="shippinglist.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Shipping</h4>

                                        <p class="admindash">
                                            <?php
                                                $query6 = "SELECT * FROM shipping";
                                                $result6 = mysqli_query($con, $query6);
                                                $count6 = 0;
                                                if(mysqli_num_rows($result6) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result6))
                                                    {
                                                        if ($row['status']=="Request")
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="feedback.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Feedbacks</h4>

                                        <p class="admindash">
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="row addashrow2">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 admindashtitle">
                                    <h3>Analysis</h3>
                                </div>
                            </div>
                            
                            <hr/>
                            <table class="table thead-bordered table-hover">
                                <tr>
                                    <td class="analbl">Existing users</td>
                                    <td class="anades">
                                        <?php
                                            $query7 = "SELECT * FROM users";
                                            $result7 = mysqli_query($con, $query7);
                                            $count7 = 0;
                                            if(mysqli_num_rows($result7) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result7))
                                                {
                                                    if ($row['type']=="customer")
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
                                                echo '0';
                                            }
                                        ?>
                                    </td>
                                    <td class="right"><a href="customerlist.php"><button class="btn btn-default btn-xs">View</button></a></td>
                                </tr>
                                
                                <tr>
                                    <td>Orders done</td>
                                    <td>
                                        <?php
                                                $query8 = "SELECT * FROM order_list";
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
                                                    echo '0';
                                                }
                                            ?>
                                    </td>
                                    <td class="right"><a href="orderhistory.php"><button class="btn btn-default btn-xs">View</button></a></td>
                                </tr>
                                
                                <tr>
                                    <td>Items shipped</td>
                                    <td>
                                        <?php
                                            $query9 = "SELECT * FROM shipping";
                                            $result9 = mysqli_query($con, $query9);
                                            $count9 = 0;
                                            if(mysqli_num_rows($result9) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result9))
                                                {
                                                    if ($row['status']=="Received")
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
                                    </td>
                                    <td class="right"><a href="shippinglist.php"><button class="btn btn-default btn-xs">View</button></a></td>
                                </tr>
                                
                                <tr>
                                    <td>Profit</td>
                                    <td>
                                        <?php
                                            $query0 = "SELECT * FROM payment";
                                            $result0 = mysqli_query($con, $query0);
                                            $count0 = 0;
                                            if(mysqli_num_rows($result0) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result0))
                                                {
                                                    if ($row['status']=="Completed")
                                                    {
                                                        $count0 += $row['amount'];
                                                    }
                                                    else
                                                    {
                                                        $count0 = $count0;
                                                    }
                                                }
                                                echo $count0;
                                            }else{
                                                echo '0';
                                            }
                                        ?>
                                    </td>
                                    <td class="right"><a href="credithistory.php"><button class="btn btn-default btn-xs">View</button></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        <?php
            }else{
                ?>
                    <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="topup.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Topups</h4>

                                        <p class="admindash">
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="orderrequest.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Orders</h4>

                                        <p class="admindash">
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="shippinglist.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Shipping</h4>

                                        <p class="admindash">
                                            <?php
                                                $query6 = "SELECT * FROM shipping";
                                                $result6 = mysqli_query($con, $query6);
                                                $count6 = 0;
                                                if(mysqli_num_rows($result6) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result6))
                                                    {
                                                        if ($row['status']=="Request")
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="feedback.php">
                                <div class="row addashrow1">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="admindashtitle">New Feedbacks</h4>

                                        <p class="admindash">
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
                                                    echo '0';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="row addashrow2">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 admindashtitle">
                                    <h3>Analysis</h3>
                                </div>
                            </div>
                            
                            <hr/>
                            <table class="table thead-bordered table-hover">
                                <tr>
                                    <td>Orders done</td>
                                    <td>
                                        <?php
                                                $query8 = "SELECT * FROM order_list";
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
                                                    echo '0';
                                                }
                                            ?>
                                    </td>
                                    <td class="right"><a href="orderhistory.php"><button class="btn btn-default btn-xs">View</button></a></td>
                                </tr>
                                
                                <tr>
                                    <td>Items shipped</td>
                                    <td>
                                        <?php
                                            $query9 = "SELECT * FROM shipping";
                                            $result9 = mysqli_query($con, $query9);
                                            $count9 = 0;
                                            if(mysqli_num_rows($result9) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result9))
                                                {
                                                    if ($row['status']=="Received")
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
                                    </td>
                                    <td class="right"><a href="shippinglist.php"><button class="btn btn-default btn-xs">View</button></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </body>
</html>