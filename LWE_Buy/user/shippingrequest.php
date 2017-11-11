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

$query3 = "SELECT *
           FROM users
           WHERE user_id='$user_id'";
$result3 = mysqli_query($con, $query3);
$results3 = mysqli_fetch_assoc($result3);

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
            
            <form action="payments.php" method="post" class="botmar">
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <strong>Address</strong>
                        <button style="float: right;" class="btn btn-default" type="button" data-toggle="modal" data-target="#newaddress">Add New Address</button>
                    </div>
                </div>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                        <div class="col-xs-2 col-md-2 col-lg-2 adcontainer">
                                            <div>
                                                <p>
                                                    <?php echo $row["address"]; ?>,<br/>
                                                    <?php echo $row["postcode"]; ?>, <?php echo $row["city"]; ?>,<br/>
                                                    <?php echo $row["state"]; ?>, <?php echo $row["country"]; ?><br/>
                                                </p>
                                                <p><input type="checkbox" value="<?php echo $row["a_id"]; ?>" name="address" class="address"></p>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Recipient Information</strong>
                    </div>
                </div>

                <div class="row botmar">
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Recipient Name</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" name="rname" class="form-control" style="border-radius: 30px; width: 80%;" value="<?php echo $results3['fname']; ?> <?php echo $results3['lname']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Recipient Contact</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" name="rcontact" class="form-control" style="border-radius: 30px; width: 80%;" value="<?php echo $results3['contact']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php 
                                if(mysqli_num_rows($result2) > 0)
                                {
                                ?>
                            <table class="table thead-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="33%">#</th>
                                        <th width="33%">Item Name</th>
                                        <th width="33%">Weight (KG)</th>
                                    </tr>
                                </thead>
                            <?php
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
                        
                            <div class="row">
                                <div class="col-xs-11 col-md-11 col-lg-11 right">
                                    <p>
                                        <?php
                                                $over = '';
                                                $over1 = '0.5';
                                                if($totalweight <= 1){
                                                    ?>
                                                        <input type="hidden" name="pricetotal" class="form-control" value="<?php echo $results1['bprice']; ?>">
                                                        <h4>Total Shipping Fee: RM <?php echo $results1['bprice']; ?></h4>
                                                    <?php
                                                }else{
                                                    while ($over < $totalweight){
                                                        $over += $over1;
                                                    }
                                                    ?>
                                                        <input type="hidden" name="pricetotal" class="form-control" value="<?php echo number_format((float)$over*$results1['bprice'], 2, '.', ''); ?>">
                                                        <h4>Total Shipping Fee: RM <?php echo number_format((float)$over*$results1['bprice'], 2, '.', ''); ?></h4>
                                                    <?php
                                                }
                                            ?>
                                    </p>
                                </div>

                                <div class="col-xs-1 col-md-1 col-lg-1 right">
                                    <input type="hidden" name="weight" class="form-control" value="<?php echo $totalweight; ?>">
                                    <input type="submit" class="btn btn-success" name="pay" value="Pay Now" onclick="return val();">
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
                            <input type="hidden" name="user_id" class="form-control upper" value="<?php echo $user_id ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="address" class="form-control upper" placeholder="Delivery Address (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Postcode</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="postcode" class="form-control upper" placeholder="Postcode (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>City</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="city" class="form-control upper" placeholder="City (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>State</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="state" class="form-control upper" placeholder="State (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-xs-8 col-md-8 col-lg-8">
                                        <input type="text" name="country" class="form-control upper" placeholder="Country (Required)" style="border-radius: 30px; width: 100%;float: left;" required>
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
        </div>
        
        <div><?php include('../footer.php') ?></div>
    </body>
    <script>
        $('input.address').on('change', function() {
            $('input.address').not(this).prop('checked', false);  
        });
        
        function val(){
            var address = document.getElementsByName('address');
            var hasChecked = false;

            for (var i = 0; i < address.length; i++)
            {
                if (address[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false)
            {
                alert("Please select an address");
                return false;
            }
            return true;
        }
    </script>
</html>