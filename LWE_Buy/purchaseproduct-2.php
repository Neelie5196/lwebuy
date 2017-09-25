<?php

require_once 'connection/config.php';
session_start();
$_SESSION['user_id'] =1;

$orderQuery = "SELECT * FROM order_list";

$orderResult = $db->query($orderQuery);

$orderRowCount = $orderResult-> rowCount()+1;

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
                <h2>Purchase Product</h2>
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
                                    <form method="post" action="addpurchase.php?user_id=<?php echo $_SESSION['user_id']; ?>&order_id=<?php echo $orderRowCount; ?>">
                                        <?php 
                                            $numbers = $_POST['num'];
                                            for($i=1; $i<=$numbers; $i++)
                                            {
                                        ?>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        Product <?php echo $i; ?>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <input type="hidden" value="<?php echo $numbers; ?>" name="numbers"/>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label>Item Name</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="name[]" type="text" required>
                                                        <input type="hidden" value="<?php echo $orderRowCount; ?>" name="orderID[]">
                                                    </td>
                                                    <td>
                                                        <label>Item Link</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="link[]" type="text" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Item Type</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="type[]" type="text" required>
                                                    </td>
                                                    <td>
                                                        <label>Unit</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="unit[]" type="number" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Remark</label>
                                                    </td>
                                                    <td colspan="3">
                                                        <input class="form-control" name="remark[]" type="text" width="80">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php
                                            }
                                        ?>
                                        <a href='purchaseproduct-1.php' class='btn btn-default' name='back'>Back to Purchase</a>
                                        <input type="submit" class="btn btn-default" name="submit" value="Submit Request">
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