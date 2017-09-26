<?php
session_start();
$_SESSION['user_id'] =1;
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
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php
                            require_once 'connection/config.php';
                        
                            $order_id = $_SESSION['order_id'];
                            $user_id = $_SESSION['user_id'];
                            $status = "Pending";

                            $sql = "INSERT INTO order_list (ol_id, user_id, status, datetime) VALUES ('$order_id','$user_id','$status',NOW())";
                            mysql_query($sql);
		
                        
                            $s = "INSERT INTO order_item (order_id, name, link, type, unit, remark) values";
                            for($i=0; $i<$_POST['numbers']; $i++){
                                 $s .= "('".$_POST['orderID'][$i]."','".$_POST['name'][$i]."','".$_POST['link'][$i]."','".$_POST['type'][$i]."','".$_POST['unit'][$i]."','".$_POST['remark'][$i]."'),";
                                
                            }
                            $s = rtrim($s,",");
                            if(!mysql_query($s))
                                echo mysql_error();
                            else
                                echo "<h2>Submit Successful</h2>"; 
                                                   
                        ?>
                    </div>
                </div>
                <a href='purchaseproduct-1.php' class='btn btn-default' name='back'>Back to Purchase</a>
            </section>
        </center>
        
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>