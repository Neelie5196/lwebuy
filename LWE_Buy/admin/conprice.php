<?php
//including the database connection file
require_once '../connection/config.php';
session_start();
$result = mysqli_query($con, "SELECT * FROM poslaju WHERE place='west'");
$result1 = mysqli_query($con, "SELECT * FROM skynet");
$result2 = mysqli_query($con, "SELECT * FROM abx");
$result3 = mysqli_query($con, "SELECT * FROM poslaju WHERE place='east'");
?>

<html>
<head>	
        <title>LWE Buy</title>
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
			<h1>West Malaysia Postage Fee</h1>
			<div class="col-md-6">
			<table class="table table-bordered">
			<img style="float:left" src="../resources/img/abx.png" class="img-responsive" alt="Cinque Terre" width="60" height="50"> 
			<h3>&nbsp PosLaju<a href="add.html">Add New Data</a></div></h3>
		
		<thead>
						<tr>
							<th>Weight/kg</th>
							<th>Price</th>
							<th>Action</th>
						</tr> 
					 </thead>
			<tbody>
			<?php 
			while($res = mysqli_fetch_array($result)) { 		
				echo "<tr>";
				echo "<td>".$res['weight']."</td>";
				echo "<td>".$res['price']."</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			}
			?>
			<tbody>
			</table>
			</div>
		
			<div class="col-md-6">
						<table class="table table-bordered">
							<img style="float:left" src="../resources/img/skynet.jpg" class="img-responsive" alt="Cinque Terre" width="60" height="50"> 							
							<h3>&nbsp SkyNet</h3>
							  <thead>
								 <tr>
									 <th>Weight/kg</th>
									 <th>Price</th>
									 <th>Action</th>
								 </tr> 
							  </thead>
							  <tbody>
						<?php 
						while($res = mysqli_fetch_array($result1)) { 		
							echo "<tr>";
							echo "<td>".$res['weight']."</td>";
							echo "<td>".$res['price']."</td>";
							echo "<td><a href=\"edit1.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
						}
						?>
							  </tbody>
							</table>
				</div>
			</div>

				<br>
				<div class="row">
				<h1>East Malaysia Postage Fee</h1>
					<div class="col-md-6">
						<table class="table table-bordered">
						<img style="float:left" src="../resources/img/abx.png" class="img-responsive" alt="Cinque Terre" width="60" height="50"> 
						<h3>&nbsp Abx</h3>
							
							  <thead>
								 <tr>
									 <th>Weight/kg</th>
									 <th>Price</th>
									 <th>Action</th>
								 </tr> 
							  </thead>
							  <tbody>
						<?php 
						while($res = mysqli_fetch_array($result2)) { 		
							echo "<tr>";
							echo "<td>".$res['weight']."</td>";
							echo "<td>".$res['price']."</td>";
							echo "<td><a href=\"edit2.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
						}
						?>
							  </tbody>
							</table>
				</div>
				
					<div class="col-md-6">
						<table class="table table-bordered">
							 <img style="float:left" src="../resources/img/poslaju.png" class="img-responsive" alt="Cinque Terre" width="60" height="50"> 
							 <h3>&nbsp Pos Laju</h3>
							  <thead>
								 <tr>
									 <th>Weight/kg</th>
									 <th>Price</th>
									 <th>Action</th>
								 </tr> 
							  </thead>
							  <tbody>
						<?php 
						while($res = mysqli_fetch_array($result3)) { 		
							echo "<tr>";
							echo "<td>".$res['weight']."</td>";
							echo "<td>".$res['price']."</td>";
							echo "<td><a href=\"edit3.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
						}
						?>
							  </tbody>
							</table>
				</div>
		</div>
		
		
		
	</div>
</body>
</html>
