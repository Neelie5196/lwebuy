<?php

require_once '../connection/config.php';
session_start();
$_SESSION['order_id'] = $_GET['order_id'];
$counter = 0; 

$purchaseitemQuery = $db->prepare("
    SELECT *
    FROM order_item
    WHERE order_id=:order_id
");

$purchaseitemQuery->execute([
    'order_id' => $_SESSION['order_id']
]);

$purchaseitem = $purchaseitemQuery->rowCount() ? $purchaseitemQuery : [];

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
                <h2>Order# <?php echo $_SESSION['order_id']; ?></h2>
                <hr/>
            </div>
            <section class = "content">
                <div class="container">
                    <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                                <?php if(!empty($purchaseitem)): ?>
                                <table class="table thead-bordered table-hover purchaseitem" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Type</th>
                                            <th>Unit</th>
                                            <th>Remark</th>
                                            <th>Price (RM)</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($purchaseitem as $purchase): 
                                    {
                                        $counter++;
                                    }
                                    ?>
                                    <form action="updateprice.php" method="post">
                                        <tbody class="purchase">
                                            <tr>
                                                <td width="5%"><?php echo $counter; ?></td>
                                                <td width="15%"><?php echo $purchase['name']; ?></td>
                                                <td width="20%"><a href="<?php echo $purchase['link']; ?>" target="_blank"><?php echo $purchase['link']; ?></a></td>
                                                <td width="8%"><?php echo $purchase['type']; ?></td>
                                                <td width="8%"><?php echo $purchase['unit']; ?></td>
                                                <td width="20%"><?php echo $purchase['remark']; ?></td>
                                                <td width="9%"><input type="text" name="price" value="<?php echo $purchase['price']; ?>"></td>
                                                <td width="15%">
                                                    <input type="hidden" name="oi_id" value="<?php echo $purchase['oi_id']; ?>">
                                                    <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
                                                    <input type="submit" class="btn btn-xs btn-warning" value="Update">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </form>
                                    <?php endforeach; ?>
                                </table>
                                <?php else: 
                                
                                    if(isset($_GET['order_id'])){
                                        $order_id = $_GET['order_id'];

                                        $result = mysql_query("DELETE FROM order_list WHERE ol_id=$order_id") or die(mysql_error());

                                    }
                                    header("location: purchaselist.php");
                                ?>
                                <?php endif; ?>
                                
                            </div>
                        <form action="acceptorder.php" method="post">
                            <?php
                                $order = $_SESSION['order_id'];
                                $result = mysql_query("SELECT sum(price) FROM order_item WHERE order_id= $order") or die(mysql_error());
                                while ($rows = mysql_fetch_array($result)) {
                            ?>
                            <h2 style="text-align: right; padding-right: 70px;"><small>RM</small> <?php echo $rows['sum(price)']; ?></h2>
                            <input type="hidden" name="pricetotal" value="<?php echo $rows['sum(price)']; ?>">
                            <?php
                                }
                            ?>
                            <input type="hidden" name="ol_id" value="<?php echo $_GET['order_id']; ?>">
                            <a href="orderrequest.php" class="btn btn-default" name="back">Back</a>
                            <input type="submit" class="btn btn-success" value="Accept">
                        </form>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>