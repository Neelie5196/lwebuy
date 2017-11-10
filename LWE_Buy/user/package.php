<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
    FROM point
    WHERE user_id= '$user_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

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
		<div class="table">
		<table class="table table-bordered">
			<div class="row">
                     <div class="col-md-12">
					<div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
					<h5 class="text-danger">Current Point:</h5>
					<h5 class="text-info"><?php 
												if($results['user_id'] != 0){
													echo $results['point'];
												}else{
													echo '<p>0</p>';
												}?></h5>
					</div>
			</div>
			</div>
    </table>
	</div>
	<hr>
			<h2 align="center">Value Package</h2>
			<?php
			$query = "SELECT * FROM package ORDER BY id ASC";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{
					?>
					<div class="col-md-3">
					<form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
					<h5 class="text-info"><?php echo $row["name"]; ?></h5>
					<h5 class="text-danger">Rm <?php echo $row["price"]; ?></h5>
					<a href= getpackage.php?id=<?php echo $row["id"]; ?>  class="btn btn-default">Pay Now</a>
					</div>
					</form>
					</div>
					<?php
				}
			}
			?>

		</div>
	
	</body>
</html>