<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$wh_id = $_GET['wh_id'];

$query1 = "SELECT *
            FROM users us
            JOIN work_station ws
            ON ws.user_id = us.user_id
            WHERE wh_id='$wh_id'";
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

    <body background="../resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <center>
            <div class="container">
                <div class="row" style="padding-top: 50px; padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2><?php echo $_GET['station']; ?></h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        $counter++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td width="4%"><?php echo $counter; ?></td>
                                                <td width="24%"><?php echo $row['fname']; ?></td>
                                                <td width="24%"><?php echo $row['lname']; ?></td>
                                                <td width="24%"><?php echo $row['email']; ?></td>
                                                <td width="24%"><?php echo $row['contact']; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no admin/staff in this station.</p>
                                    <?php
                                }
                            ?>
                            </table>    
                        </div>
                    </div>
                    <center><a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a></center>
                </div>
            </section>
        </center>
    </body>
</html>