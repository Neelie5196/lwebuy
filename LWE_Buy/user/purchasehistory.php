<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM order_list
          WHERE user_id='$user_id' AND status = 'received'
          ORDER BY datetime desc";
$result = mysqli_query($con, $query);

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
    </head>

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>
            
        <div class="container">
            <center>
                <h2>Purchase History</h2>
                <hr/>

            <div class="row botmar">
                <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                    <strong>Received</strong>
                </div>
            </div>
                    
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result) > 0)
                            {
                            ?>
                        <table class="table thead-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Placed on</th>
                                    <th>Total (RM)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td width="10%"><?php echo $row['ol_id']; ?></td>
                                            <td width="35%"><?php echo $row['datetime']; ?></td>
                                            <td width="20%"><?php echo $row['price']; ?></td>
                                            <td width="20%"><?php echo $row['status']; ?></td>
                                            <td width="15%"><a href="purchasehview.php?order_id=<?php echo $row['ol_id']; ?>&timeline=Received" class="btn btn-xs btn-default">View</a></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                }else{
                                ?>
                                    <p>There is no conpleted purchase order.</p>
                                <?php
                                }
                            ?>
                        </table>        
                    </div>
                </div>
            </section>
            </center>
        </div>
        
        <div><?php include('../footer.php') ?></div>
    </body>
</html>