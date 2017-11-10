<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 

$query1 = "SELECT *
            FROM payment p
            JOIN users us
            ON us.user_id = p.user_id
            WHERE status = 'Completed'";
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

        <section class = "content">
            <div class="container">
                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Credit History</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php 
                        if(mysqli_num_rows($result1) > 0)
                        {
                        ?>
                        <table class="table thead-bordered table-hover" id="receive">
                            <thead>
                                <tr>
                                    <th width = "5%">#</th>
                                    <th width = "60%">Description</th>
                                    <th width = "20%">Receipt</th>
                                    <th width = "15%">Date / Time</th>
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
                                            <td><strong><?php echo $row['title']; ?> To <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></strong></td>
                                            <td><a href="../resources/img/receipts/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a></td>
                                            <td><?php echo $row['datetime']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            }else{
                                ?>
                                    <p>There is no credit history.</p>
                                <?php
                            }
                        ?>
                        </table>                              
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>