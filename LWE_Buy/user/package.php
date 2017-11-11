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
		<div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 right">
                    <h3>
                        Current Point:
                        <?php 
                            if($results['user_id'] != 0){
                                echo $results['point'];
                            }else{
                                echo '0';
                            }?>
                    </h3>
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <center>
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Value Package</h2>
                    </div>
                </center>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <?php
                        $query = "SELECT * FROM package ORDER BY id ASC";
                        $result = mysqli_query($con, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <div class="col-xs-2 col-md-2 col-lg-2 adcontainer">
                                <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div>
                                        <p><?php echo $row["name"]; ?><br/>
                                        Rm <?php echo $row["price"]; ?></p>
                                        <a href= getpackage.php?id=<?php echo $row["id"]; ?>  class="btn btn-default">Pay Now</a>
                                    </div>
                                </form>
                                </div>
                                <?php
                            }
                        }
                    ?>    
                </div>
            </div>
		</div>
        <div><?php include('../footer.php') ?></div>
	</body>
</html>