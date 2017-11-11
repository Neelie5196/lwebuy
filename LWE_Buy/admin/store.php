<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$counters = 0;

$query2 = "SELECT *
            FROM ((order_list ol
            JOIN users us
            ON us.user_id = ol.user_id)
            JOIN order_item oi
            ON oi.order_id = ol.ol_id)
            WHERE statuss = 'Pending'";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
            FROM users us
            JOIN receive_request rr
            ON rr.user_id = us.user_id
            WHERE status= 'Request'";
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

        <center>
            <div class="container">
                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Store</h2>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form action="store.php" method="post">
                                <input type="text" name="search" class="form-control" autofocus placeholder="Enter Order Code here" style="border-radius: 30px; width: 30%; text-align:center;" required>
                                <br/>
                            </form>
                            <form action="slotitem.php" method="post">
                                <?php
                                    if(isset($_POST['search']))
                                    {
                                        $search = $_POST['search'];
                                        $query = "SELECT * 
                                                  FROM users us
                                                  JOIN receive_request rr
                                                  ON rr.user_id = us.user_id
                                                  WHERE order_code = '$search' AND status = 'Request'";
                                        
                                        $querys = "SELECT *
                                                  FROM ((order_list ol
                                                  JOIN users us
                                                  ON us.user_id = ol.user_id)
                                                  JOIN order_item oi
                                                  ON oi.order_id = ol.ol_id)
                                                  WHERE order_code = '$search' AND statuss = 'Pending'";
                                        
                                        $result = mysqli_query($con, $query);
                                        $result1 = mysqli_query($con, $querys);
                                        
                                        $results = mysqli_num_rows($result);
                                        $resultss = mysqli_num_rows($result1);
                                        if($results > 0){
                                            while ($line = mysqli_fetch_array($result))
                                            {
                                            ?>
                                                <div class="row">
                                                    <table class="table thead-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">User Name</th>
                                                                <th width="20%">Item Name</th>
                                                                <th width="15%">Slot Code</th>
                                                                <th width="15%">Slot Number</th>
                                                                <th width="15%">Weight (kg)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <input type="hidden" name="rr_id" value="<?php echo $line['rr_id']; ?>">
                                                                <input type="hidden" name="user_id" value="<?php echo $line['user_id']; ?>">
                                                                <input type="hidden" name="name" value="<?php echo $line['name']; ?>">
                                                                <input type="hidden" name="order_code" value="<?php echo $line['order_code']; ?>">
                                                                <td><?php echo $line['fname']; ?> <?php echo $line['lname']; ?></td>
                                                                <td><?php echo $line['name']; ?></td>
                                                                <?php
                                                                    $user_id = $line['user_id'];
                                                                    $query4 = "SELECT *
                                                                               FROM slot
                                                                               WHERE user_id= '$user_id' ";
                                                                    $result4 = mysqli_query($con, $query4);
                                                                    $results4 = mysqli_fetch_assoc($result4);
                                                
                                                                    if(!empty($results4))
                                                                    {
                                                                        ?>
                                                                            <input type="hidden" name="s_id" value="<?php echo $results4['s_id']; ?>">
                                                                            <td><?php echo $results4['slot_code']; ?></td>
                                                                            <td><?php echo $results4['slot_num']; ?></td>
                                                                        <?php
                                                                    }else{
                                                                        $query5 = "SELECT *
                                                                                   FROM slot
                                                                                   WHERE status = 'Not in Use'
                                                                                   ORDER BY RAND()
                                                                                   LIMIT 1";
                                                                        $result5 = mysqli_query($con, $query5);
                                                                        $results5 = mysqli_fetch_assoc($result5);
                                                                        
                                                                        ?>
                                                                        <td>
                                                                        <?php
                                                                            if(!empty($results5))
                                                                            {
                                                                                ?>
                                                                                    <input type="hidden" name="s_id" value="<?php echo $results5['s_id']; ?>"><?php echo $results5['slot_code']; ?>
                                                                                <?php
                                                                            }else{
                                                                                echo '<p>There is no empty slot.</p>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $results5['slot_num']; ?></td>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                
                                                                <td><input type="text" name="weight" class="form-control" style="border-radius: 30px; width: 100%;" required></td>
                                                                <td><input type="submit" class="btn btn-xs btn-warning" name="receivesave" value="Save"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php  
                                            }
                                        }else if($resultss > 0){
                                            while ($line = mysqli_fetch_array($result1)) 
                                            {
                                            ?>
                                                <div class="row">
                                                    <table class="table thead-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">User Name</th>
                                                                <th width="20%">Item Name</th>
                                                                <th width="15%">Slot Code</th>
                                                                <th width="15%">Slot Number</th>
                                                                <th width="15%">Weight (kg)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <input type="hidden" name="oi_id" value="<?php echo $line['oi_id']; ?>">
                                                                <input type="hidden" name="user_id" value="<?php echo $line['user_id']; ?>">
                                                                <input type="hidden" name="order_id" value="<?php echo $line['order_id']; ?>">
                                                                <input type="hidden" name="name" value="<?php echo $line['name']; ?>">
                                                                <input type="hidden" name="order_code" value="<?php echo $line['order_code']; ?>">
                                                                <td><?php echo $line['fname']; ?> <?php echo $line['lname']; ?></td>
                                                                <td><?php echo $line['name']; ?></td>
                                                                <?php
                                                                    $user_id = $line['user_id'];
                                                                    $query4 = "SELECT *
                                                                               FROM slot
                                                                               WHERE user_id= '$user_id' ";
                                                                    $result4 = mysqli_query($con, $query4);
                                                                    $results4 = mysqli_fetch_assoc($result4);
                                                
                                                                    if(!empty($results4))
                                                                    {
                                                                        ?>
                                                                            <input type="hidden" name="s_id" value="<?php echo $results4['s_id']; ?>">
                                                                            <td><?php echo $results4['slot_code']; ?></td>
                                                                            <td><?php echo $results4['slot_num']; ?></td>
                                                                        <?php
                                                                    }else{
                                                                        $query5 = "SELECT *
                                                                                   FROM slot
                                                                                   WHERE status = 'Not in Use'
                                                                                   ORDER BY RAND()
                                                                                   LIMIT 1";
                                                                        $result5 = mysqli_query($con, $query5);
                                                                        $results5 = mysqli_fetch_assoc($result5);
                                                                        
                                                                        ?>
                                                                        <td>
                                                                        <?php
                                                                            if(!empty($results5))
                                                                            {
                                                                                ?>
                                                                                    <input type="hidden" name="s_id" value="<?php echo $results5['s_id']; ?>"><?php echo $results5['slot_code']; ?>
                                                                                <?php
                                                                            }else{
                                                                                echo '<p>There is no empty slot.</p>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $results5['slot_num']; ?></td>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <td><input type="text" name="weight" class="form-control" style="border-radius: 30px; width: 100%;" required></td>
                                                                <td><input type="submit" class="btn btn-xs btn-warning" name="ordersave" value="Save"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php  
                                            }
                                        }else{
                                            ?>
                                                <p>This item no record in database, please contact owner..</p>
                                                <center><a href='message.php' class='btn btn-info' name='contact'>Contact User</a></center>
                                            <?php
                                        }
                                            
                                    }
                                
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <br/>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <div class="row" style="padding-top: -10px;">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <h3>Order Item</h3>
                                    <?php 
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover" id="receive">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">User</th>
                                                <th width="25%">Item</th>
                                                <th width="25%">Order Code</th>
                                                <th width="25%">Status</th>
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
                                                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['order_code']; ?></td>
                                                        <td><?php echo $row['statuss']; ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <p>There is order item need receive.</p>
                                            <?php
                                        }
                                    ?>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <h3>Receive Item Request</h3>
                                    <?php 
                                    if(mysqli_num_rows($result3) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover" id="receives">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">User</th>
                                                <th width="25%">Item</th>
                                                <th width="25%">Order Code</th>
                                                <th width="25%">Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result3))
                                            {
                                                $counters++;
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $counters; ?></td>
                                                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['order_code']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <p>There is no receive item request.</p>
                                            <?php
                                        }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>