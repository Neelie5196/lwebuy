<?php
// including the database connection file
require_once '../connection/config.php';
session_start();
if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($con, $_POST['id']);
	
	$weight = mysqli_real_escape_string($con, $_POST['weight']);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	
	// checking empty fields
	if(empty($weight) ||  empty($price)) {	
			
		if(empty($weight)) {
			echo "<font color='red'>Weight field is empty.</font><br/>";
		}
		
		if(empty($weight)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($con, "UPDATE poslaju SET weight='$weight',price='$price' WHERE id=$id");
		
		header("Location: conprice.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM poslaju WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$weight = $res['weight'];
	$price = $res['price'];
}
?>
<html>
<head>	
        <title>Edit Data</title>

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
	<a href="conprice.php">Back</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit3.php">
			<table class="table table-bordered">
			<tr> 
				<td>Weight: </td>
				<td><input type="text" name="weight" value="<?php echo $weight;?>"></td>
			</tr>
			<tr> 
				<td>Price: </td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	</div>
</body>
</html>
