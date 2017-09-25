<?php

require_once 'connection/config.php';
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
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <form method="post" action="purchaseproduct-2.php">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 jumbotron">
                                        <h3 class="title">How Many Product to Purchase</h3>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" name="num" type="number" required>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-default" name="submit" value="Purchase Form">
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