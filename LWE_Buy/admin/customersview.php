<?php

require_once '../connection/config.php';
session_start();
$counter = 0;

$user_id = $_GET['users'];

$query = "SELECT *
            FROM users
            WHERE user_id='$user_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$query1 = "SELECT *
            FROM address
            WHERE user_id='$user_id'";
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
                    <h2>Customer Details</h2>
                    <hr/>
                </div>
            </div>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h3 class="title">Customer <small>Information</small></h3>
                    </div>
                </div>
                <div class="row usersinfo">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron users">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>First Name</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" value="<?php echo $results['fname']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Last Name</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" value="<?php echo $results['lname']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Email</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="email" class="form-control" value="<?php echo $results['email']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Contact Number</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="tel" class="form-control" value="<?php echo $results['contact']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h3 class="title">Customer <small>Address List</small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                ?>
                                <table class="table thead-bordered table-hover" id="receive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Postcode</th>
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
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><?php echo $row['state']; ?></td>
                                                    <td><?php echo $row['city']; ?></td>
                                                    <td><?php echo $row['postcode']; ?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no address yet.</p>
                                        <?php
                                    }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <center style="padding-bottom:15px;"><a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a></center>
            </section>
        </div>
    </body>
</html>