<?php
// including the database connection file
require_once '../connection/config.php';
session_start();
if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($con, $_POST['id']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$status = mysqli_real_escape_string($con, $_POST['status']);
	$add_on = mysqli_real_escape_string($con, $_POST['add_on']);
	
	// checking empty fields
	if(empty($status) ||  empty($add_on)) {	
			
		if(empty($add_on)) {
			echo "<font color='red'>Please Top up point.</font><br/>";
		}
		
		if(empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($con, "UPDATE paypack SET  name='$name', status='$status',add_on='$add_on', topuptime=now() WHERE id=$id");
		
		header("Location: topup.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM paypack WHERE id=$id");

while($package = mysqli_fetch_array($result))
{
	$name = $package['name'];
	$status = $package['status'];
	$add_on = $package['add_on'];
}
?>
<html>
<head>	
        <title>Add Point</title>

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
	
	<form name="form1" method="post" action="updatepoint.php">
			<table class="table table-bordered">
			<tr> 
				<td>Package: </td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Status: </td>
				<td><input type="text" name="status" value="Completed"></td>
			</tr>
			<tr> 
				<td>Add on: </td>
				<td><input type="text" name="add_on" value="<?php echo $add_on;?>"></td>
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
