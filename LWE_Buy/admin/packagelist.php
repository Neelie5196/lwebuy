<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 

$query1 = "SELECT * FROM package";
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
                        <h2>Package List</h2>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newpackage" style="float: right;">New Package</button><br/><hr/>
                            <?php 
                            if(mysqli_num_rows($result1) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" id="receive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price (RM)</th>
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
                                                <td width="20%"><?php echo $row['name']; ?></td>
                                                <td width="20%"><?php echo $row['price']; ?></td>
                                                <td width="20%"><a href="editpackage.php?users=<?php echo $row['id']; ?>" class="btn btn-xs btn-default">Edit</a> <a href="deletepack.php?user_id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no package.</p>
                                    <?php
                                }
                            ?>
                            </table>                                  
                        </div>
                    </div>
                </div>
            </section>
        </center>
        <div id="newpackage" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="addpackage.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">New Package Information</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Package Point</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="name" class="form-control" style="border-radius: 30px; float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Package Price</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="price" class="form-control" style="border-radius: 30px; float: left;" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Add</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>                                                    
                </div>
            </div>
        </div>
    </body>
</html>