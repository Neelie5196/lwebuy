<?php
require_once '../connection/config.php';
session_start();
$counter = 0;
$user_id = $_SESSION['user_id'];
$item = $_POST['item'];
$totalweight = $_POST['totalweight'];

$query = "SELECT * FROM address WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

$query2 = "SELECT *
           FROM item
           WHERE i_id IN (".implode(',',$item).")";
$result2 = mysqli_query($con, $query2);

$query1 = "SELECT * 
          FROM shipping_price";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

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

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Shipping Request</h2>
                    <hr/>
                </div>
            </div>
        </div>
        <form action="payments.php" method="post">
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
                                                <input type="checkbox" value="<?php echo $row["a_id"]; ?>" name="address">
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Recipient Information</strong>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Recipient Name</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" name="rname" class="form-control" style="border-radius: 30px; width: 80%;" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Recipient Contact</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" name="rcontact" class="form-control" style="border-radius: 30px; width: 80%;" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <table class="table thead-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="33%">#</th>
                                        <th width="33%">Item Name</th>
                                        <th width="33%">Weight (KG)</th>
                                    </tr>
                                </thead>
                                <?php 
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result2))
                                        {
                                            $counter++;
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <input type="hidden" value="<?php echo $counter; ?>" name="counter"/>
                                                    <input type="hidden" name="i_id[]" class="form-control" value="<?php echo $row['i_id']; ?>">
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['weight']; ?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                    ?>
                                        <p>There is no item in warehouse.</p>
                                    <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6" style="padding-bottom: 20px;">
                            <div class="row">
                                <div class="col-xs-8 col-md-8 col-lg-8">
                                    <?php
                                        $over = '';
                                        $over1 = '0.5';
                                        if($totalweight <= 1){
                                            ?>
                                                <input type="hidden" name="pricetotal" class="form-control" value="<?php echo $results1['bprice']; ?>">
                                                <h4 style="float: right; ">Total Shipping Fee: RM <?php echo $results1['bprice']; ?></h4>
                                            <?php
                                        }else{
                                            while ($over < $totalweight){
                                                $over += $over1;
                                            }
                                            ?>
                                                <input type="hidden" name="pricetotal" class="form-control" value="<?php echo number_format((float)$over*$results1['bprice'], 2, '.', ''); ?>">
                                                <h4 style="float: right; ">Total Shipping Fee: RM <?php echo number_format((float)$over*$results1['bprice'], 2, '.', ''); ?></h4>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <input type="hidden" name="weight" class="form-control" value="<?php echo $totalweight; ?>">
                                    <input type="submit" class="btn btn-success" name="pay" value="Pay Now" onclick="return val();" style="float:right;">
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <div id="newaddress" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="addaddress.php" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">New Address</h4>
                        </div>
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id ?>">
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