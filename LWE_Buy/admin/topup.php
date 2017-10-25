<?php

require_once '../connection/config.php';
session_start();

$counter = 0; 
$packagelistQuery = $db->prepare("
    SELECT *
    FROM payment p
    JOIN users us
    ON us.user_id = p.user_id
    WHERE status = 'Waiting for Approve'
");

$packagelistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$packagelist = $packagelistQuery->rowCount() ? $packagelistQuery : [];


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
            <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Top Up Request</h2>
                </div>
            </div>
        </div>

        <section class = "content">
            <div class="container">
                    <div class="row">
		
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php if(!empty($packagelist)): ?>
                            <table class="table thead-bordered table-hover userslist">
								<thead>
                                    <tr>
                                        <th width = "4%">#</th>
                                        <th width = "18%">Name</th>
                                        <th width = "18%">Detail</th>
                                        <th width = "10%">Amount</th>
                                        <th width = "15%">Created</th>
                                        <th width = "20%">Receipt</th>
                                        <th width = "10%">Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($packagelist as $package): 
                                {
                                    $counter++;
                                }
                                
                                ?>
                                <tbody class="users">
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $package['fname']; ?> <?php echo $package['lname']; ?></td>
                                        <td><?php echo $package['title']; ?></td>
                                        <td>RM <?php echo $package['amount']; ?></td>
                                        <td><?php echo $package['datetime']; ?></td>
                                        <td><a href="../resources/img/receipts/<?php echo $package['file']; ?>" target="_blank"><?php echo $package['file']; ?></a></td>
                                        <td><a href="#" class="btn btn-xs btn-info"><?php echo $package['status']; ?></a></td>
                                        <td><a href="updatepoint.php?user_id=<?php echo $package['user_id']; ?>&p_id=<?php echo $package['p_id']; ?>&point=<?php echo $package['amount']; ?>" class="btn btn-xs btn-warning">Top Up</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no package.</p>
                            <?php endif; ?>                                   
                        </div>
                    </div>
                </div>
        </section>

    </body>
</html>