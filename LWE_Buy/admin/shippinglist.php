<?php

require_once '../connection/config.php';
session_start();


if(isset($_POST['genCode']))
{
    $shippingid = $_POST['shippingid'];
    $query5 = "SELECT *
              FROM payment
              WHERE from_shipping='$shippingid'";
    $result5 = mysqli_query($con, $query5);
    $results5 = mysqli_fetch_assoc($result5);
    
    if($results5['status'] != 'Waiting for Accept'){
        $defaultno = "122352562";
        $itemno = rand(100, 999);
        $tCode = $defaultno . $itemno;

        $query = "UPDATE shipping SET tracking_code = '$tCode' WHERE s_id='$shippingid'";
        $result = mysqli_query($con, $query);

    }else{
        ?>
        <script>
        alert('Please approve payment before generate!!');
        window.location.href='shippinglist.php?fail';
        </script>
        <?php
    }
}

$query1 = "SELECT *
           FROM shipping sh
           JOIN users us
           ON us.user_id = sh.user_id
           WHERE status = 'request'
           ORDER BY datetime desc";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
           FROM shipping sh
           JOIN users us
           ON us.user_id = sh.user_id
           WHERE status = 'proceed'
           ORDER BY datetime desc";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
           FROM shipping sh
           JOIN users us
           ON us.user_id = sh.user_id
           WHERE status = 'delivered'
           ORDER BY datetime desc";
$result3 = mysqli_query($con, $query3);

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
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <div class="container">
            <center>
                <h2>Shipping list</h2>
                <hr/>
            
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>New</strong>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="collapse1">
                                <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                ?>
                                <table class="table thead-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Shipping No.</th>
                                            <th>Name</th>
                                            <th>Tracking code</th>
                                            <th>Placed on</th>
                                        </tr>
                                    </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td width="5%"><?php echo $row['s_id']; ?></td>
                                                <td width="30%"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                <td width="10%">
                                                    <?php
                                                    if($row['tracking_code'] != "")
                                                    {
                                                        echo $row['tracking_code'];
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <form method="post" action="shippinglist.php">
                                                        <input type="text" value="<?php echo $row['s_id']; ?>" name="shippingid" hidden="hidden" />
                                                        <input type="submit" value="Generate tracking code" name="genCode" class="btn btn-xs btn-default" />
                                                    </form>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td width="10%"><?php echo $row['datetime']; ?></td>
                                                <td width="15%">
                                                    <a href="tag.php?s_id=<?php echo $row['s_id']; ?>" class="btn btn-xs btn-default">Print tag</a>
                                                    <a href="shippinglrview.php?shipping_id=<?php echo $row['s_id']; ?>" class="btn btn-xs btn-default">View</a>
                                                    <a href="updateshipping.php?tracking_code=<?php echo $row['tracking_code']; ?>" class="btn btn-xs btn-default">Update</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no shipping pending.</p>
                                        <?php
                                    }
                                ?>                                                    
                                </table>
                            </div>
                        </div>  
                    </div>
                </section>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Proceeded</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse2">More Shipping Details</button>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="collapse2">
                                <?php 
                                if(mysqli_num_rows($result2) > 0)
                                {
                                ?>
                                <table class="table thead-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Shipping No.</th>
                                            <th>Name</th>
                                            <th>Placed on</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                <?php
                                    while($rows = mysqli_fetch_array($result2))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td width="10%"><?php echo $rows['s_id']; ?></td>
                                                <td width="40%"><?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?></td>
                                                <td width="15%"><?php echo $rows['datetime']; ?></td>
                                                <td width="10%"><?php echo $rows['status']; ?></td>
                                                <td width="5">
                                                    <a href="tag.php?s_id=<?php echo $rows['s_id']; ?>" class="btn btn-xs btn-default">Reprint tag</a>
                                                    <a href="shippinglpview.php?shipping_id=<?php echo $rows['s_id']; ?>&timeline=Proceed" class="btn btn-xs btn-default">View</a>
                                                    <a href="updateshipping.php?tracking_code=<?php echo $rows['tracking_code']; ?>" class="btn btn-xs btn-default">Update</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no proceeded shipping.</p>
                                        <?php
                                    }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Awaiting Customer Response</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse3">More Shipping Details</button>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 in collapse">
                            <div class="span12 collapse" id="collapse3">
                                <?php 
                                if(mysqli_num_rows($result3) > 0)
                                {
                                ?>
                                <table class="table thead-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Shipping No.</th>
                                            <th>Name</th>
                                            <th>Placed on</th>
                                        </tr>
                                    </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result3))
                                    {
                                        ?>
                                        <tbody>
                                        <tr>
                                            <td width="5%"><?php echo $row['s_id']; ?></td>
                                            <td width="40%"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                            <td width="15%"><?php echo $row['datetime']; ?></td>
                                        </tr>
                                    </tbody>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                            <p>There is no pending response.</p>
                                        <?php
                                    }
                                ?>                           
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </center>
        </div>
    </body>
</html>