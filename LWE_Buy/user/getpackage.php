<?php
$connect = mysqli_connect("localhost", "root", "", "lwe");
session_start();


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
    <h2>Pay Your Item Here</h2>
    <div class="table">
    <form action="payhere.php" method="post">
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION["user_id"];?>">
			<input type="hidden" name="user_name" class="form-control" value="<?php echo $_SESSION["fname"];?>">
			<div class="row">
                       <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Name: </label> 
											<input type="text" name="name" class="form-control" value="<?php echo $values["item_name"];?>" style="border-radius: 30px; float: left;" readonly>
                                        </div>
                                    </div>
                                </div>
			</div>
			<div class="row">
                       <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Price: </label>
											 <input type="text" name="price" class="form-control" value="<?php echo $values["product_price"]; ?>" style="border-radius: 30px; float: left;" readonly>
                                        </div>                    
                                    </div>
                                </div>
			</div>
			<div class="row">
                       <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <label>Payment Details </label>
                                        </div> 
										<div class="col-xs-12 col-md-6 col-lg-6">
                                            <textarea name="details" cols="40" rows="5"></textarea>
											<input type="hidden" name="status" class="form-control" value="Waiting For Payment" >
                                        </div>
                                        </div>   										
                                    </div>
		
             </div>
			 <div class="row">
                       <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                    	<input type="submit" class="btn btn-success" name="pay" value="Pay" style="float: left;">
                                        </div>   										
                                </div>
		
             </div>
			</div>
            <?php 
		}
		?>
        <?php
	}
	?>
    </form>
    </div>
    </div>

	</body>
</html>