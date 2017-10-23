<?php

require_once '../connection/config.php';
session_start();

$counter = 0; 
$packagelistQuery = $db->prepare("
    SELECT *
    FROM paypack
    WHERE status = 'Completed'
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

        <section class = "content">
            <div class="container">
			 <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Credit History</h2>
                    </div>
                </div>
                    <div class="row">
		
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php if(!empty($packagelist)): ?>
                            <table class="table thead-bordered table-hover userslist">

                                <?php foreach($packagelist as $package): 
                                {
                                    $counter++;
                                }
                                
                                ?>
                                <tbody class="users">
                                    <tr>
										<td><?php echo $counter; ?></td>
										<td><strong>Top Up&nbsp;<strong><?php echo $package['add_on']; ?><strong>&nbsp;To&nbsp;</strong><?php echo $package['user_name']; ?>&nbspat&nbsp;<?php echo $package['topuptime']; ?></td>
                                     
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no history.</p>
                            <?php endif; ?>                                   
                        </div>
                    </div>
                </div>
        </section>

    </body>
</html>