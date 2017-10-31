<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM address WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

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

    <body background="../resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Shipping Request</h2>
                    <hr/>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                    <strong>Address</strong>
                    <button style="float: right;" class="btn btn-default" type="button" data-toggle="modal" data-target="#newaddress">Add New Address</button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                    <div class="col-md-3">
                                        <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
                                            <h5 class="text-info">
                                                <?php echo $row["address"]; ?>,<br/>
                                                <?php echo $row["postcode"]; ?>, <?php echo $row["city"]; ?>,<br/>
                                                <?php echo $row["state"]; ?>, <?php echo $row["country"]; ?><br/>
                                            </h5>
                                            <input type="checkbox" name="address">
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <br/>
        <section class = "content">
            <div class="container">
                <form action="shippingrequest.php" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <table class="table thead-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="33%">Item Name</th>
                                        <th width="33%">Weight (KG)</th>
                                        <th width="33%">Price (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>###</td>
                                        <td>###</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <p style="float: right; ">Total Shipping Fee:</p>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <input type="submit" class="btn btn-success" name="pay" value="Pay Now" style="float:right;">
                                </div>
                            </div>                            
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <div id="newaddress" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="addslot.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">New Address</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Address</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="address" class="form-control" placeholder="Delivery Address (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Postcode</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="postcode" class="form-control" placeholder="Postcode (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>City</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="city" class="form-control" placeholder="City (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>State</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="state" class="form-control" placeholder="State (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label>Country</label>
                                </div>
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <input type="text" name="country" class="form-control" placeholder="Country (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="new-address">Add New</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>                                                    
                </div>
            </div>
        </div>
    </body>
</html>