<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$s_id = $_GET['s_id'];

$query1 = "SELECT *
            FROM item
            WHERE s_id ='$s_id'";
$result1 = mysqli_query($con, $query1);

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
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Slot Item - <?php echo $_GET['slotcode']; ?> - <?php echo $_GET['slotnum']; ?></h2>
                    <hr/>
                </div>
            </div>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php 
                        if(mysqli_num_rows($result1) > 0)
                        {
                        ?>
                        <table class="table thead-bordered table-hover" id="receive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Name</th>
                                    <th>Order Code</th>
                                    <th>Weight</th>
                                    <th>Date / Time</th>
                                    <th>From</th>
                                </tr>
                            </thead>
                            <?php
                                while($row = mysqli_fetch_array($result1))
                                {
                                    $counter++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['order_code']; ?></td>
                                            <td><?php echo $row['weight']; ?></td>
                                            <td><?php echo $row['datetime']; ?></td>
                                            <td><?php echo $row['from_id']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            }else{
                                ?>
                                    <p>There is no item in slot.</p>
                                <?php
                            }
                        ?>
                        </table>
                    </div>
                </div>
                <center><a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a></center>
            </section>
        </div>
    </body>
</html>