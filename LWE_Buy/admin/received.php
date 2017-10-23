<?php
// including the database connection file
require_once '../connection/config.php';
session_start();
?>


<html>
<head>	
        <title>Received Item</title>

        <meta name="viewport" content="width=device-width, initialscale=1.0"/>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>

</head>

<body>
		<div class="row">
            <?php include_once('nav.php')?>
        </div>
	<div class="container">
	<div class ="row">
	<div class="col-md-6">
	<br/><br/>
	
	<form name="form1" method="post" action="additem.php">
			<table class="table table-bordered">
			<tr> 
				<td>Item Code: </td>
				<td><input type="text" name="barcode"></td>
			</tr>
			<tr> 
				<td>Order ID: </td>
				<td><input type="text" name="o_id"></td>
			</tr>
			<tr>
				<td><input type="submit" name="add" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	</div>
</body>
</html>
