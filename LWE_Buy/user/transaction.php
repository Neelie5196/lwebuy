<?php

require_once '../connection/config.php';
session_start();

$i= 0;
$transactionlistQuery = $db->prepare("
    SELECT *
    FROM payment
    WHERE user_id=:user_id AND status='Pending'
");

$transactionlistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$transactionlist = $transactionlistQuery->rowCount() ? $transactionlistQuery : [];

$is= 0;
$transactionslistQuery = $db->prepare("
    SELECT *
    FROM payment
    WHERE user_id=:user_id AND status='Completed'
");

$transactionslistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$transactionslist = $transactionslistQuery->rowCount() ? $transactionslistQuery : [];

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
        <section class = "content"> 
		<center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
   
            <div class="container">
                <h2>Transaction History</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Pending</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($transactionlist)): ?>
                        <table class="table thead-bordered" style="width:80%">
                            <thead>
                                <tr>
                                    <th width = "4%">#</th>
                                    <th width = "21%">Detail</th>
                                    <th width = "13%">Amount</th>
                                    <th width = "26%">Created</th>
                                    <th width = "23%">Receipt</th>
                                    <th width = "13%">Status</th>
                                </tr>
                            </thead>
                            <?php foreach($transactionlist as $transaction):
                            {                             
                                        $i++;
                            }?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $transaction['title']; ?></td>
                                    <td>RM <?php echo $transaction['amount']; ?></td>
                                    <td><?php echo $transaction['datetime']; ?></td>
                                    <td><a href="../resources/img/receipts/<?php echo $transaction['file']; ?>" target="_blank"><?php echo $transaction['file']; ?></a></td>
                                    <td><a href="#" class="btn btn-xs btn-info"><?php echo $transaction['status']; ?></a></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>There is no reload request</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Completed</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
			
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($transactionslist)): ?>
                        <table class="table thead-bordered" style="width:80%">
                            <thead>
                                <tr>
                                    <th width = "4%">#</th>
                                    <th width = "21%">Detail</th>
                                    <th width = "13%">Amount</th>
                                    <th width = "26%">Created</th>
                                    <th width = "23%">Receipt</th>
                                    <th width = "13%">Status</th>
                                </tr>
                            </thead>
                            <?php foreach($transactionslist as $transactions):
							{                             
										$is++;
							}?>
                            <tbody>
                                <tr>
									<td><?php echo $is; ?></td>
                                    <td><?php echo $transactions['title']; ?></td>
                                    <td>RM <?php echo $transactions['amount']; ?></td>
                                    <td><?php echo $transactions['datetime']; ?></td>
                                    <td><a href="../resources/img/receipts/<?php echo $transactions['file']; ?>" target="_blank"><?php echo $transactions['file']; ?></a></td>
                                    <td><a href="#" class="btn btn-xs btn-info"><?php echo $transactions['status']; ?></a></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>No Transaction Record</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </center>  
		</section>
    </body>
</html>