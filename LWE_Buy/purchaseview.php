<?php

require_once 'connection/config.php';
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
        <link href="frameworks/css/bootstrap.min.css" rel="stylesheet"/>

        <!--stylesheet-->
        <link href="frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body background="resources/img/bg.jpg">
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
                        <form action="#">
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
                                    <tbody class="purchase">
                                        <tr>
                                            <td width="5%"><?php echo $counter; ?></td>
                                            <td width="15%"><?php echo $purchase['name']; ?></td>
                                            <td width="20%"><a href="<?php echo $purchase['link']; ?>" target="_blank"><?php echo $purchase['link']; ?></a></td>
                                            <td width="8%"><?php echo $purchase['type']; ?></td>
                                            <td width="8%"><?php echo $purchase['unit']; ?></td>
                                            <td width="20%"><?php echo $purchase['remark']; ?></td>
                                            <td width="9%"><?php echo $purchase['price']; ?></td>
                                            <td width="15%">
                                                <a href="editpurchase.php?order_id=<?php echo $_SESSION['order_id']; ?>&oi_id=<?php echo $purchase['oi_id']; ?>" class="btn btn-xs btn-warning">Edit</a>
                                                <a href="delete.php?order_id=<?php echo $_SESSION['order_id']; ?>&oi_id=<?php echo $purchase['oi_id']; ?>" class="btn btn-xs btn-danger delete-button">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
                                <?php else: ?>
                                    <p>Error.</p>
                                <?php endif; ?>
                                <?php
                                    $order = $_SESSION['order_id'];
                                    $result = mysql_query("SELECT sum(price) FROM order_item WHERE order_id= $order") or die(mysql_error());
                                    while ($rows = mysql_fetch_array($result)) {
                                ?>
                                <h2 style="text-align: right; padding-right: 70px;"><small>RM</small> <?php echo $rows['sum(price)']; ?></h2>
                                <?php
                                    }
                                ?>
                            </div>
                            <a href="purchaselist.php" class="btn btn-default" name="back">Back</a>
                            <input type="button" class="btn btn-default" name="submit" value="Check Out">
                        </form>
                    </div>
                </div>
            </section>
        </center>
        
        <script>
        
        
        </script>
        
                
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>