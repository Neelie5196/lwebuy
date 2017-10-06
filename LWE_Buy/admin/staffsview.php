<?php

require_once '../connection/config.php';
session_start();
$counter =0;

$usersinfoQuery = $db->prepare("
    SELECT *
    FROM users
    WHERE user_id=:user_id
");

$usersinfoQuery->execute([
    'user_id' => $_GET['users']
]);

$usersinfo = $usersinfoQuery->rowCount() ? $usersinfoQuery : [];

$stationinfoQuery = $db->prepare("
    SELECT *
    FROM warehouse wh
    JOIN work_station ws
    ON ws.wh_id = wh.wh_id
    WHERE user_id=:user_id
");

$stationinfoQuery->execute([
    'user_id' => $_GET['users']
]);

$stationinfo = $stationinfoQuery->rowCount() ? $stationinfoQuery : [];


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

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Staff Details</h2>
                    <hr/>
                </div>
            </div>
        </div>

        <section class = "content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h3 class="title">Staff <small>Information</small></h3>
                    </div>
                </div>
                <?php if(!empty($usersinfo)): ?>
                <div class="row usersinfo">
                    <?php foreach($usersinfo as $users): ?>
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron users">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>First Name</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" value="<?php echo $users['fname']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Last Name</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" value="<?php echo $users['lname']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Email</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="email" class="form-control" value="<?php echo $users['email']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Contact Number</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="tel" class="form-control" value="<?php echo $users['contact']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                            </div>
                        </div>
                        <br/>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                    <p>Error.</p>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h3 class="title">Staff <small>Work Station</small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php if(!empty($stationinfo)): ?>
                        <div class="row stationinfo">
                            <?php foreach($stationinfo as $station): ?>
                            <div class="col-xs-12 col-md-12 col-lg-12 station">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Code</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $station['station_code']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Description</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $station['station_description']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country Code</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $station['country_code']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country Description</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $station['country_description']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Company Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $station['company_name']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Station Name</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $station['station_name']; ?>" style="border-radius: 30px; width: 50%;" readonly>
                                    </div>
                                </div>
                                <br/>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                            <p>Not yet select work station.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <center><a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a></center>
            </div>
        </section>
    </body>
</html>