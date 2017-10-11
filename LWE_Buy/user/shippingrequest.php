<?php

require_once '../connection/config.php';
session_start();
$i= 0;
$purchaselistQuery = $db->prepare("
    SELECT *
    FROM order_list 
    WHERE user_id=:user_id AND STATUS ='received'
");

$purchaselistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchaselist = $purchaselistQuery->rowCount() ? $purchaselistQuery : [];

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
                <h2>Request to ship</h2>
                <hr/>
            </div>
            
            <section class = "content">
                <div class="row">
			<div class="container">
			<div class="row">
			 <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($purchaselist)): ?>
                        <table class="table thead-bordered" style="width:50%">
                            <thead>
                                <tr>
									<th>Unshipped</th>
                                </tr>
                            </thead>
                            <?php foreach($purchaselist as $row):
							{                             
										$i++;
							}?>
                            <tbody class="purchase">
                                <tr>
                                    <td><?php echo $row['ol_id']; ?></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>All shipped</p>
                        <?php endif; ?>
                    </div>
			</div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <h3>Send Parcel</h3>
                            <hr/>
                            	<form method="post" action="addparcel.php">
								<table class="table table-bordered">
								<tr> 
									<td>From: </td>
									<td><input type="text" name="from" ></td>
								</tr>
								<tr> 
									<td>To: </td>
									<td><input type="text" name="to"></td>
								</tr>
								<tr> 
									<td>Parcel Content: </td>
									<td><input type="text" name="content"></td>
								</tr>
								<tr> 
									<td>Parcel Value: </td>
									<td><input type="text" name="value"></td>
								</tr>
								<tr>
									<td><input type="submit" name="create" value="Add Parcel"></td>
								</tr>
							</table>
						</form>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </center>  
		</section>
    </body>
</html>