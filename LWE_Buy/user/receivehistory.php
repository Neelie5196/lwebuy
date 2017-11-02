<?php

require_once '../connection/config.php';
session_start();
$counter=0;
$counters=0;

$receivelistQuery = $db->prepare("
    SELECT *
    FROM receive_request
    WHERE user_id = :user_id AND status = 'Request'
    ORDER BY datetime desc
");

$receivelistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$receivelist = $receivelistQuery->rowCount() ? $receivelistQuery : [];

$receiveslistQuery = $db->prepare("
    SELECT *
    FROM receive_request
    WHERE user_id = :user_id AND status = 'Received'
    ORDER BY datetime desc
");

$receiveslistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$receiveslist = $receiveslistQuery->rowCount() ? $receiveslistQuery : [];

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
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Receive</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <p style="float: right;"><a href='message.php' class='btn btn-info' name='contact'>Contact Admin</a> <a href='receive-1.php' class='btn btn-default' name='new'>New Receive</a></p>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Request</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#request">More Item Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="request">
                            <?php if(!empty($receivelist)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                        <th>Order Code</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($receivelist as $receive): 
                                {
                                    $counter++;
                                }
                                
                                ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $counter; ?></td>
                                        <td width="40%"><?php echo $receive['name']; ?></td>
                                        <td width="15%"><?php echo $receive['datetime']; ?></td>
                                        <td width="15%"><?php echo $receive['order_code']; ?></td>
                                        <td width="10%"><?php echo $receive['status']; ?></td>
                                        <td width="15%"><a href="deletereceive.php?rr_id=<?php echo $receive['rr_id']; ?>" class="btn btn-xs btn-danger">Delete</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no receive request.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Received</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#received">More Item Details</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                        <div class="span12 collapse" id="received">
                            <?php if(!empty($receiveslist)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Placed on</th>
                                        <th>Order Code</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php foreach($receiveslist as $receives): 
                                {
                                    $counters++;
                                }
                                ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $counters; ?></td>
                                        <td width="40%"><?php echo $receives['name']; ?></td>
                                        <td width="20%"><?php echo $receives['datetime']; ?></td>
                                        <td width="20%"><?php echo $receives['order_code']; ?></td>
                                        <td width="15%"><?php echo $receives['status']; ?></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no received item.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>