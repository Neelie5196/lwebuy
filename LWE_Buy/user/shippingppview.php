<?php

require_once '../connection/config.php';
session_start();

$shipping_id = $_GET['shipping_id'];
$counter = 0;

$query = "SELECT * 
          FROM users us
          JOIN shipping s
          ON s.user_id = us.user_id
          WHERE s_id = '$shipping_id'
          ";
$result = mysql_query($query);
$results = mysql_fetch_assoc($result);

$address = $results['a_id'];

$query1 = "SELECT * 
          FROM address
          WHERE a_id = '$address'
          ";
$result1 = mysql_query($query1);
$results1 = mysql_fetch_assoc($result1);

$slotitemQuery = $db->prepare("

    SELECT *
    FROM item
    WHERE shipping_id = '$shipping_id'

");

$slotitemQuery->execute();

$slotitem = $slotitemQuery->rowCount() ? $slotitemQuery : [];


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
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Shipping# <?php echo $_GET['shipping_id']; ?></h2>
                <hr/>
                <img src="../resources/timeline/payment.PNG" alt="timeline" width="500px"/>
            </div>
        </center>
        <form action="payments.php" method="post">
            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <h4>Shipping Information: </h4>
                            <p>Recipient Name: <?php echo $results['recipient_name']; ?></p>
                            <p>Recipient Contact: <?php echo $results['recipient_contact']; ?></p>
                            <p>Delivery Address: <?php echo $results1['address']; ?>, <?php echo $results1["postcode"]; ?>, <?php echo $results1["city"]; ?>, <?php echo $results1["state"]; ?>, <?php echo $results1["country"]; ?></p>
                            <p>Total Weight: <?php echo $results['weight']; ?></p>
                            <p>Shipping Fee: RM <?php echo $results['price']; ?></p>
                            <input type="hidden" name="pricetotal" class="form-control" value="<?php echo $results['price']; ?>">
                            <input type="hidden" name="s_id" class="form-control" value="<?php echo $shipping_id; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php if(!empty($slotitem)): ?>
                            <table class="table thead-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="33%">#</th>
                                        <th width="33%">Item Name</th>
                                        <th width="33%">Item Weight</th>
                                    </tr>
                                </thead>
                                <?php foreach($slotitem as $slot): 
                                    $counter++;
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $slot['name']; ?></td>
                                        <td><?php echo $slot['weight']; ?></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no item ready to ship</p>
                            <?php endif; ?>
                        </div>
                        <center>
                            <input type="submit" class="btn btn-success" name="ppay" value="Pay Now">
                            <a href="javascript:history.go(-1)"  class="btn btn-default" name="back">Back</a>
                        </center>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>