<?php

require_once '../connection/config.php';
session_start();
$user_id = $_GET['users'];

$query = "SELECT *
        FROM users
        WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$query1 = "SELECT *
        FROM warehouse wh
        JOIN work_station ws
        ON ws.wh_id = wh.wh_id
        WHERE user_id='$user_id'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

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
                    <h2>User Details</h2>
                    <hr/>
                </div>
            </div>
        </div>

        <section class = "content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h3 class="title">User <small>Information</small></h3>
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
                        <h3 class="title">User <small>Work Station</small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <div class="row stationinfo">
                            <div class="col-xs-12 col-md-12 col-lg-12 station">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Code</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $results1['station_code']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Description</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $results1['station_description']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country Code</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $results1['country_code']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country Description</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $results1['country_description']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Company Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $results1['company_name']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $results1['station_name']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <center style="padding-bottom:15px;"><a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a></center>
            </div>
        </section>
    </body>
</html>