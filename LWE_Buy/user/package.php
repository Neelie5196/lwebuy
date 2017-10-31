<?php
require_once '../connection/config.php';
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
                            <input type="hidden" name="quantity" class="form-control" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add to Bag">
                        </div>
                    </form>
                </div>
            <?php
		}
	}
	?>
    <div style="clear:both"></div>
    <h2>My Package Bag</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
    <th width="40%">Product Name</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td>RM <?php echo $values["product_price"]; ?></td>
            <td>RM <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr>
        <td colspan="2" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td><a href="getpackage.php" class>Pay Now</a></td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
    </div>
	
	</body>
</html>