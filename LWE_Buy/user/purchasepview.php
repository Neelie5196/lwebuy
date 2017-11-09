<?php

require_once '../connection/config.php';
session_start();
$order_id = $_GET['order_id'];
$counter = 0; 

$query = "SELECT *
          FROM order_item
          WHERE order_id='$order_id'";
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

    <body>
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Order# <?php echo $order_id; ?></h2>
                <hr/>
                <img src="../resources/timeline/payments.PNG" alt="timeline" width="600px"/>
            </div>
            <br/>
            <section class = "content">
                <div class="container">
                    <div class="row">
                        <form action="payment.php" method="post">
                            <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                                <table class="table thead-bordered table-hover" style="width:100%">
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
                                    <?php 
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $counter++;
                                                ?>
                                                <tbody class="purchase">
                                                    <tr>
                                                        <td width="5%"><?php echo $counter; ?></td>
                                                        <td width="20%"><?php echo $row['name']; ?></td>
                                                        <td width="20%"><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                                                        <td width="5%"><?php echo $row['type']; ?></td>
                                                        <td width="5%"><?php echo $row['unit']; ?></td>
                                                        <td width="20%"><?php echo $row['remark']; ?></td>
                                                        <td width="10%"><?php echo $row['price']; ?></td>
                                                        <td width="15%">
                                                            <a href="delete1.php?order_id=<?php echo $order_id; ?>&oi_id=<?php echo $row['oi_id']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-xs btn-danger delete-button">Delete</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            if(isset($order_id)){
                                                $order_id = $order_id;

                                                $result = mysqli_query($con, "DELETE FROM order_list WHERE ol_id=$order_id") or die(mysql_error());
                                                ?>
                                                    <script>
                                                        window.location.href='purchaselist.php';
                                                    </script>
                                                <?php
                                            }
                                        }
                                    ?>                        
                                </table>
                                <?php
                                    $query2 = "SELECT sum(price) FROM order_item WHERE order_id= '$order_id'";
                                    $result2 = mysqli_query($con, $query2);
                                    $results2 = mysqli_fetch_assoc($result2);
                                
                                    if($results2 > 1){
                                ?>
                                <h2 style="text-align: right; padding-right: 150px;" name="total"><small>RM</small> <?php echo $results2['sum(price)']; ?></h2>
                                <small style="float: right; padding-right: 150px;">*Price not include shipping charge</small>
                                <input type="hidden" name="pricetotal" value="<?php echo $results2['sum(price)']; ?>">
                                <?php
                                    }
                                ?>
                                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            </div>
                            <a href="javascript:history.go(-1)" class="btn btn-default" name="back">Back</a>

                            <input type="submit" class="btn btn-success" value="Pay Now">
                        </form>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>