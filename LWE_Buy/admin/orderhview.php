<?php

require_once '../connection/config.php';
session_start();
$order_id = $_GET['order_id'];
$counter = 0;

$query1 = "SELECT *
            FROM order_item
            WHERE order_id='$order_id'";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
            FROM payment
            WHERE from_order='$order_id'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

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
            </div>
            <section class = "content">
                <div class="container">
                    <div class="row">
                        <form action="#">
                            <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                                <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Link</th>
                                                <th>Type</th>
                                                <th>Unit</th>
                                                <th>Price (RM)</th>
                                                <th>Order Code</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result1))
                                            {
                                                $counter++;
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $counter; ?></td>
                                                    <td width="20%"><?php echo $row['name']; ?></td>
                                                    <td width="20%"><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                                                    <td width="8%"><?php echo $row['type']; ?></td>
                                                    <td width="8%"><?php echo $row['unit']; ?></td>
                                                    <td width="14%"><?php echo $row['price']; ?></td>
                                                    <td width="15%"><?php echo $row['order_code']; ?></td>
                                                    <td width="10%"><?php echo $row['statuss']; ?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>Error.</p>
                                        <?php
                                    }
                                ?>
                                </table>
                                <?php
                                    $result = mysqli_query($con, "SELECT sum(price) FROM order_item WHERE order_id= $order_id") or die(mysqli_error($con));
                                    while ($rows = mysqli_fetch_array($result)) {
                                ?>
                                <h2 style="text-align: right; padding-right: 70px;"><small>RM</small> <?php echo $rows['sum(price)']; ?></h2>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($results2 > 0){
                                        ?>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <label style="float: left;">Bank in Receipt:</label> <em style="float:left;">
                                                        <a href="#" class="pop">
                                                            <img src="../resources/img/receipts/<?php echo $results2['file']; ?>" style="width: 0px; height: 0px;"><?php echo $results2['title']; ?>
                                                        </a></em>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        <?php
                                    }else{

                                    }
                                ?>
                            </div>
                            <a href='javascript:history.go(-1)' class='btn btn-default' name='back'>Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </center>
    </body>
    <div class="modal fade" id="imagedialog" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">              
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <img src="" class="image" style="width: 100%;" >
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.pop').on('click', function() {
                $('.image').attr('src', $(this).find('img').attr('src'));
                $('#imagedialog').modal('show');   
            });		
        });
    </script>
</html>