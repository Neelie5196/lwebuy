<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$counters = 0; 

$query1 = "SELECT *
            FROM users us
            JOIN slot s
            ON s.user_id = us.user_id
            WHERE status= 'In Use'";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
            FROM slot
            WHERE status= 'Not in Use'";
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

        <center>
            <div class="container">
                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Manage Slot</h2>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newslot" style="float: right;">New Slot</button>
                            <br/><hr/>
                            <div class="row" style="padding-top: -10px;">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <h3>In Use</h3>
                                    <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover" id="receive">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="25%">Slot Code</th>
                                                <th width="25%">Slot Number</th>
                                                <th width="20%">Status</th>
                                                <th width="25%">User Name</th>
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
                                                        <td><?php echo $row['slot_code']; ?></td>
                                                        <td><?php echo $row['slot_num']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                        <td><a href="slotitemview.php?s_id=<?php echo $row['s_id']; ?>&slotcode=<?php echo $row['slot_code']; ?>&slotnum=<?php echo $row['slot_num']; ?>&user_id=<?php echo $row['user_id']; ?>" class="btn btn-xs btn-default">View</a></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <p>There is no slot in use.</p>
                                            <?php
                                        }
                                    ?>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <h3>Not In Use</h3>
                                    <?php 
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover" id="receives">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="25%">Slot Code</th>
                                                <th width="25%">Slot Number</th>
                                                <th width="20%">Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result2))
                                            {
                                                $counters++;
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $counters; ?></td>
                                                        <td><?php echo $row['slot_code']; ?></td>
                                                        <td><?php echo $row['slot_num']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td><a href="deleteslot.php?s_id=<?php echo $row['s_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <p>There is no available slot to use.</p>
                                            <?php
                                        }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </center>
        
        
        <div id="newslot" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="addslot.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">New Slot</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Slot Code</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="slotcode" class="form-control" placeholder="Slot Code (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Slot Number</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="slotnum" class="form-control" placeholder="Slot Number (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
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