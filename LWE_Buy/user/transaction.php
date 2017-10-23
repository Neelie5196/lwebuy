<?php

require_once '../connection/config.php';
session_start();
$i= 0;
$transactionlistQuery = $db->prepare("
    SELECT *
    FROM paypack
    WHERE user_id=:user_id AND status='completed'
");

$transactionlistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$transactionlist = $transactionlistQuery->rowCount() ? $transactionlistQuery : [];

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
            
            <section class = "content">
                <div class="row">
			
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($transactionlist)): ?>
                        <table class="table thead-bordered" style="width:80%">
                            <thead>
                                <tr>
                                    <th>#</th>
									<th>Package</th>
									<th>Amount</th>
									<th>Created</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php foreach($transactionlist as $row):
							{                             
										$i++;
							}?>
                            <tbody class="purchase">
                                <tr>
									<td><?php echo $i; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['time']; ?></td>
									<td><a href="#" class="btn btn-xs btn-info"><?php echo $row['status']; ?></a></td>
						
                                    
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