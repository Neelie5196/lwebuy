<?php

require_once 'connection/config.php';
session_start();
$_SESSION['order_id'] = $_GET['order_id'];
$_SESSION['user_id'] =1;
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
                        <form>
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
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($purchaseitem as $purchase): 
                                    {
                                        $counter++;
                                    }
                                    ?>
                                    <tbody class="purchase">
                                        <tr id="edit_table">
                                            <td width="5%"><?php echo $counter; ?></td>
                                            <td width="15%"><?php echo $purchase['name']; ?></td>
                                            <td width="20%"><?php echo $purchase['link']; ?></td>
                                            <td width="10%"><?php echo $purchase['type']; ?></td>
                                            <td width="10%"><?php echo $purchase['unit']; ?></td>
                                            <td width="20%"><?php echo $purchase['remark']; ?></td>
                                            <td width="5%"><?php echo $purchase['price']; ?></td>
                                            <td width="15%">
                                                <a href="" class="btn btn-xs btn-warning edit-button">Edit</a>
                                                <a href="delete.php?order_id=<?php echo $_SESSION['order_id']; ?>&oi_id=<?php echo $purchase['oi_id']; ?>" class="btn btn-xs btn-danger delete-button">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
                                <?php else: ?>
                                    <p>Error.</p>
                                <?php endif; ?>
                                <h2 style="text-align: right;"><small>RM</small> </h2>
                            </div>
                            <input type="submit" class="btn btn-default" name="submit" value="Check Out">
                        </form>
                    </div>
                </div>
            </section>
        </center>
                
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>