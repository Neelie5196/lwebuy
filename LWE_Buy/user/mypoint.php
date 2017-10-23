<?php

require_once '../connection/config.php';
session_start();
$pointlistQuery = $db->prepare("
    SELECT *
    FROM point
    WHERE user_id=:user_id
");

$pointlistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$pointlist = $pointlistQuery->rowCount() ? $pointlistQuery : [];

$addonlistQuery = $db->prepare("
    SELECT *
    FROM paypack
	WHERE user_id=:user_id
");

$addonlistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$addonlist = $addonlistQuery->rowCount() ? $addonlistQuery : [];
?>
<!doctype html>
<html>
    <head>
        <title>LWE Buy</title>
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
        <!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>

    </head>
	<body>
	   <div class="row">
                <?php include_once('nav.php')?>
            </div>
<div class="container" style="width:60%;">
    <h2>My Point</h2>
    <div class="table">
    <table ="table table-bordered">
	 <?php foreach($pointlist as $row):
							{                             
							}?>
			<div class="row">
                       <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Point: </label> 
											<label><?php echo $row['point']; ?></label> 
                                        </div>
                                    </div>
                                </div>
			</div>
<?php endforeach; ?>
    </table>
	 <table ="table table-bordered">
	 <?php foreach($addonlist as $pts):
							{                             
							}?>
			<div class="row">
                       <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Latest Add on: </label> 
											<label><?php echo $pts['add_on']; ?></label> 
                                        </div>
                                    </div>
                                </div>
			</div>
<?php endforeach; ?>
    </table>



		</div>
    </div>

	</body>
</html>