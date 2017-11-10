<?php

require_once '../connection/config.php';
session_start();

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
                <h2>Add Inventory</h2>
                <hr/>
            </div>
            
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <h3 class="title" style="text-align: left;">Item <small>Information</small></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 jumbotron">
                                    <form method="post" action="addreceive.php">
                                        <?php 
                                            $numbers = $_POST['num'];
                                            for($i=1; $i<=$numbers; $i++)
                                            {
                                        ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        Item <?php echo $i; ?>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <input type="hidden" value="<?php echo $numbers; ?>" name="numbers"/>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label>Item Name:</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="name[]" type="text" required>
                                                        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id[]">
                                                        <input type="hidden" value="Request" name="status[]">
                                                    </td>
                                                    <td>
                                                        <label>Tracking Code:</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="ordercode[]" type="text" required>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php
                                            }
                                        ?>
                                        <a href='receive-1.php' class='btn btn-default' name='back'>Back</a>
                                        <input type="submit" class="btn btn-success" name="submit" value="Submit Request">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>