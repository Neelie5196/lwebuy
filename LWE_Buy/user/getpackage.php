<?php
// including the database connection file
require_once '../connection/config.php';
session_start();

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM package WHERE id=$id");

while($pack = mysqli_fetch_array($result))
{
	$name = $pack['name'];
	$price = $pack['price'];
}
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
        <h2>Pay Your Item Here</h2>
        <div class="table">
            <form name="form1" method="post" action="payhere.php" enctype="multipart/form-data">
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION["user_id"];?>">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <label>Title: </label> 
                                <input type="text" name="title" class="form-control" value="<?php echo $name;?>" style="border-radius: 30px; float: left;" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <label>Amount: </label> 
                                <input type="text" name="amount" class="form-control" value="<?php echo $price;?>" style="border-radius: 30px; float: left;" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <label>Image: </label> 
                                <input type="file" name="file" required>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="status" value="Waiting for Approve">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <input type="submit" class="btn btn-success" name="pay" value="Pay" style="float: left;">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
    <div><?php include('../footer.php') ?></div>
</body>
</html>