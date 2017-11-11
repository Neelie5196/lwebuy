<?php

require_once '../connection/config.php';
session_start();

$shipping_id = $_GET['shipping_id'];
$timeline = $_GET['timeline'];
$counter = 0;

$query = "SELECT * 
          FROM users us
          JOIN shipping s
          ON s.user_id = us.user_id
          WHERE s_id = '$shipping_id'
          ";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$address = $results['a_id'];

$query1 = "SELECT * 
          FROM address
          WHERE a_id = '$address'
          ";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT *
           FROM item
           WHERE shipping_id = '$shipping_id'";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
           FROM payment
           WHERE from_shipping='$shipping_id'";
$result3 = mysqli_query($con, $query3);
$results3 = mysqli_fetch_assoc($result3);

$hawb = $results['tracking_code'];

$query4 = "SELECT * 
          FROM shipping_update_summary
          WHERE HawbNo = '$hawb'
          ";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);

$query5 = "SELECT * 
           FROM shipping_update_details
           WHERE HawbNo = '$hawb'";
$result5 = mysqli_query($con, $query5);

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
                <h2>Shipping# <?php echo $_GET['shipping_id']; ?></h2>
                <hr/>
                <?php
                    if($timeline == 'Proceed'){
                        ?>
                            <img src="../resources/timeline/proceed.PNG" alt="timeline" width="500px"/>
                        <?php
                    }else if($timeline == 'Delivered'){
                        ?>
                            <img src="../resources/timeline/delivered.PNG" alt="timeline" width="500px"/>
                        <?php
                    }else
                ?>
            </div>
        </center>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h4>Shipping Information: </h4>
                        <p>Recipient Name: <?php echo $results['recipient_name']; ?></p>
                        <p>Recipient Contact: <?php echo $results['recipient_contact']; ?></p>
                        <p>Delivery Address: <?php echo $results1['address']; ?>, <?php echo $results1["postcode"]; ?>, <?php echo $results1["city"]; ?>, <?php echo $results1["state"]; ?>, <?php echo $results1["country"]; ?></p>
                        <p>Total Weight: <?php echo $results['weight']; ?></p>
                        <p>Shipping Fee: RM <?php echo $results['price']; ?></p>
                        <p><strong>Tracking Code: <?php echo $results['tracking_code']; ?></strong></p>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:120%; text-align: left;">
                                <strong>Tracking No</strong> <?php echo $hawb ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <?php
                                    if($results4 > 0){
                                        ?>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-3 col-lg-3">
                                                    <strong>Status</strong><br>
                                                    <?php echo $results4['ReasonDescription']; ?>
                                                </div>
                                                <div class="col-xs-12 col-md-2 col-lg-2">
                                                    <strong>Customer Ref</strong><br>
                                                    <?php echo $results4['XR1']; ?>
                                                </div>
                                                <div class="col-xs-12 col-md-3 col-lg-3">
                                                    <strong>Carrier No</strong><br>
                                                    <?php echo $results4['HawbNo']; ?>
                                                </div>
                                                <div class="col-xs-12 col-md-2 col-lg-2">
                                                    <strong>Send Date</strong><br>
                                                    <small>
                                                        <?php echo $results4['ShipmentDate']; ?>
                                                    </small>
                                                </div>
                                                <div class="col-xs-12 col-md-2 col-lg-2">
                                                    <strong>Delivered Date</strong><br>
                                                    <small>
                                                        <?php echo $results4['DeliveryDate']; ?>
                                                    </small>
                                                </div>
                                            </div>
                                        <?php
                                    }else{
                                        echo '<p>Tracking Summary Not found</p>';
                                    }
                                ?>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse">More Shipping Details</button>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                                        <div class="span12 collapse" id="collapse">
                                            <?php 
                                                if(mysqli_num_rows($result5) > 0)
                                                {
                                                ?>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Date</th>
                                                            <th width="30%">Location</th>
                                                            <th width="30%">Description</th>
                                                            <th width="20%">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                <?php
                                                    while($row = mysqli_fetch_array($result5))
                                                    {
                                                        ?>
                                                        <tbody>
                                                            <tr height="50">
                                                                <td><?php echo $row['TransactionDate']; ?></td>
                                                                <td><?php echo $row['StationDescription']; ?></td>
                                                                <td><?php echo $row['EventDescription']; ?></td>
                                                                <td><?php echo $row['Remark']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                        <?php
                                                        }
                                                    }else{
                                                    ?>
                                                        <p>Not Found.</p>
                                                    <?php
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php 
                            if(mysqli_num_rows($result2) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="33%">#</th>
                                        <th width="33%">Item Name</th>
                                        <th width="33%">Item Weight</th>
                                    </tr>
                                </thead>
                            <?php
                                while($row = mysqli_fetch_array($result2))
                                {
                                    $counter++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['weight']; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                }else{
                                ?>
                                    <p>There is no item ready to ship.</p>
                                <?php
                                }
                            ?>
                        </table>
                        <?php
                            if($results3 > 0){
                                ?>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <label style="float: left;">Bank in Receipt:</label> <em style="float:left;">
                                                <a href="#" class="pop">
                                                    <img src="../resources/img/receipts/<?php echo $results3['file']; ?>" style="width: 0px; height: 0px;"><?php echo $results3['title']; ?>
                                                </a></em>
                                            </td>
                                        </tr>
                                    </tfoot>
                                <?php
                            }else{

                            }
                        ?>
                    </div>
                    <center style="padding: 15px;">
                        <a href="javascript:history.go(-1)"  class="btn btn-default" name="back">Back</a>
                    </center>
                </div>
            </div>
        </section>
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