<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 

$query1 = "SELECT * FROM warehouse";
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

        <center>
            <div class="container">
                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Manage Warehouse</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newwarehouse" style="float: right;">New     Warehouse</button><br/><hr/>
                            <?php 
                            if(mysqli_num_rows($result1) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" id="receive">
                                <thead>
                                    <tr>
                                        <th width="2%">#</th>
                                        <th width="5%">Station Code</th>
                                        <th width="20%">Station Description</th>
                                        <th width="5%">Country Code</th>
                                        <th width="20%">Country Description</th>
                                        <th width="24%">Company Name</th>
                                        <th width="24%">Station Name</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        $counter++;
                                        ?>
                                        <tbody>
                                            <tr height="50">
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['station_code']; ?></td>
                                                <td><?php echo $row['station_description']; ?></td>
                                                <td><?php echo $row['country_code']; ?></td>
                                                <td><?php echo $row['country_description']; ?></td>
                                                <td><?php echo $row['company_name']; ?></td>
                                                <td><?php echo $row['station_name']; ?></td>
                                                <td><a href="warehouseview.php?wh_id=<?php echo $row['wh_id'] ?>&station=<?php echo $row['station_name']; ?>" class="btn btn-xs btn-info">View</a></td>
                                                <td><a href="editwarehouse.php?wh_id=<?php echo $row['wh_id']; ?>" class="btn btn-xs btn-warning">Edit</a></td>
                                                <td><a href="delete.php?wh_id=<?php echo $row['wh_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no warehouse records.</p>
                                    <?php
                                }
                            ?>
                            </table>   
                        </div>
                    </div>
                </div>
            </section>
        </center>
        <div id="newwarehouse" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="addwarehouse.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">New Warehouse</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Station Code</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="stationcode" class="form-control" placeholder="StationCode (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Station Description</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="stationdescription" class="form-control" placeholder="StationDescription (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Country Code</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="countrycode" class="form-control" placeholder="CountryCode (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Country Description</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="countrydescription" class="form-control" placeholder="CountryDescription (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Company Name</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="companyname" class="form-control" placeholder="CompanyName (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Station Name</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="stationname" class="form-control" placeholder="StationName (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="new-warehouse">Create</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>                                                    
                </div>
            </div>
        </div>
    </body>
</html>