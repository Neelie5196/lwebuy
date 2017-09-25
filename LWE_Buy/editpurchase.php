<?php

require_once 'connection/config.php';
session_start();
$_SESSION['order_id'] = $_GET['order_id'];
$_SESSION['oi_id'] = $_GET['oi_id'];

$purchaseitemQuery = $db->prepare("
    SELECT *
    FROM order_item
    WHERE oi_id=:oi_id
");

$purchaseitemQuery->execute([
    'oi_id' => $_SESSION['oi_id']
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
                <h2>Edit Information</h2>
                <hr/>
            </div>
            
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <h3 class="title" style="text-align: left;">Product <small>Information</small></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 jumbotron">
                                    <form method="post" action="update.php">
                                        <?php if(!empty($purchaseitem)): ?>
                                        <table class="table table-bordered purchaseitem">
                                            <?php foreach($purchaseitem as $purchase): ?>
                                            <tbody class="purchase">
                                                <tr>
                                                    <td>
                                                        <label>Item Name</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="name" type="text" required value="<?php echo $purchase['name']; ?>">
                                                        <input type="hidden" name="order_id" value="<?php echo $_SESSION['order_id']; ?>">
                                                        <input type="hidden" name="oi_id" value="<?php echo $_SESSION['oi_id']; ?>">
                                                    </td>
                                                    <td>
                                                        <label>Item Link</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="link" type="text" required required value="<?php echo $purchase['link']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Item Type</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="type" type="text" required required value="<?php echo $purchase['type']; ?>">
                                                    </td>
                                                    <td>
                                                        <label>Unit</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="unit" type="number" required required value="<?php echo $purchase['unit']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Remark</label>
                                                    </td>
                                                    <td colspan="3">
                                                        <input class="form-control" name="remark" type="text" width="80"  required value="<?php echo $purchase['remark']; ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php else: ?>
                                            <p>Error.</p>
                                        <?php endif; ?>
                                        <a href="purchaseview.php?order_id=<?php echo $purchase['order_id']; ?>" class='btn btn-default' name='back'>Back to Purchase View</a>
                                        
                                        <button type="submit" class="btn btn-default" name="update">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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