<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$warehouselistQuery = $db->prepare("
    SELECT *
    FROM warehouse

");

$warehouselistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$warehouselist = $warehouselistQuery->rowCount() ? $warehouselistQuery : [];


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
                        <h2>Warehouse List</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php if(!empty($warehouselist)): ?>
                            <table class="table thead-bordered table-hover warehouselist">
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
                                <?php foreach($warehouselist as $warehouse): 
                                {
                                    $counter++;
                                }
                                
                                ?>
                                <tbody class="warehouse">
                                    <tr height="50">
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $warehouse['station_code']; ?></td>
                                        <td><?php echo $warehouse['station_description']; ?></td>
                                        <td><?php echo $warehouse['country_code']; ?></td>
                                        <td><?php echo $warehouse['country_description']; ?></td>
                                        <td><?php echo $warehouse['company_name']; ?></td>
                                        <td><?php echo $warehouse['station_name']; ?></td>
                                        <td><a href="warehouseview.php?wh_id=<?php echo $warehouse['wh_id'] ?>&station=<?php echo $warehouse['station_name']; ?>" class="btn btn-xs btn-info">View</a></td>
                                        <td><a href="editwarehouse.php?wh_id=<?php echo $warehouse['wh_id']; ?>" class="btn btn-xs btn-warning">Edit</a></td>
                                        <td><a href="delete.php?wh_id=<?php echo $warehouse['wh_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no warehouse records.</p>
                            <?php endif; ?>      
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>