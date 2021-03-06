<?php

require_once '../connection/config.php';
session_start();

$package = $_GET['users'];

$query = "SELECT *
            FROM package
            WHERE id='$package'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h3>Package Information</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <form action="updatepackage.php" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Package Name</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <input type="text" name="pname" class="form-control" value="<?php echo $results['name'] ?>" style="border-radius: 30px; float: left;" required>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <br>
                             <div class ="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <label>Package Price</label>
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <input type="hidden" name="p_id" value="<?php echo $results['id'] ?>">
                                            <input type="text" name="pprice" class="form-control" value="<?php echo $results['price'] ?>" style="border-radius: 30px; float: left;" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-success" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>