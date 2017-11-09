<?php

require_once '../connection/config.php';
session_start();
$user_id = $_GET['users'];

$query = "SELECT *
        FROM users
        WHERE user_id='$user_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$query1 = "SELECT *
        FROM warehouse wh
        JOIN work_station ws
        ON ws.wh_id = wh.wh_id
        WHERE user_id='$user_id'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM warehouse";
$result2 = mysqli_query($con, $query2);

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
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h3>User Information</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <form action="updateusers.php" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>First name</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <input type="text" name="fname" class="form-control" style="border-radius: 30px; float: left;" value="<?php echo $results['fname']; ?>" required>
                                            <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Last name</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <input type="text" name="lname" class="form-control" style="border-radius: 30px; float: left;" value="<?php echo $results['lname']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Contact Number</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <input type="tel" name="contact" class="form-control" style="border-radius: 30px; float: left;" value="<?php echo $results['contact']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <input type="email" name="email" class="form-control" style="border-radius: 30px; float: left;" value="<?php echo $results['email']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Type</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <select name="type" class="form-control" style="border-radius: 30px;">
                                              <option selected><?php echo $results['type']; ?></option>
                                              <option>admin</option>
                                              <option>staff</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <?php 
                                if($results1 > 0){
                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                                        <label>Work Station</label>
                                                        <input type="hidden" name="ws_id" class="form-control" value="<?php echo $results1['ws_id']; ?>">
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                                        <select name="workstation" class="form-control" style="border-radius: 30px;">
                                                            <option selected><?php echo $results1['station_name']; ?></option>
                                                            <?php 
                                                                if(mysqli_num_rows($result2) > 0)
                                                                {
                                                                    while($row = mysqli_fetch_array($result2))
                                                                    {
                                                                        ?>
                                                                            <option value="<?php echo $row['wh_id']; ?>">
                                                                                <?php echo $row['station_name']; ?>
                                                                            </option>
                                                                        <?php
                                                                    }
                                                                }else{
                                                                    ?>
                                                                        <p>There is no warehouse records.</p>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                                        <label>Work Station</label>
                                                        <input type="hidden" name="ws_id" class="form-control" value="<?php echo $results1['ws_id']; ?>">
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                                        <select name="workstation" class="form-control" style="border-radius: 30px;">
                                                            <option selected>Please Select</option>
                                                            <?php 
                                                                if(mysqli_num_rows($result2) > 0)
                                                                {
                                                                    while($row = mysqli_fetch_array($result2))
                                                                    {
                                                                        ?>
                                                                            <option value="<?php echo $row['wh_id']; ?>">
                                                                                <?php echo $row['station_name']; ?>
                                                                            </option>
                                                                        <?php
                                                                    }
                                                                }else{
                                                                    ?>
                                                                        <p>There is no warehouse records.</p>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                            <br/>
                            <input type="submit" class="btn btn-success" name="new-users" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>