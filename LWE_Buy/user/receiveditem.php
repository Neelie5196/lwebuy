<?php

require_once '../connection/config.php';
session_start();
$counter = 0;
$user_id = $_SESSION['user_id'];

$query1 = "SELECT *
           FROM slot s
           JOIN item i
           ON i.s_id = s.s_id
           WHERE user_id='$user_id' AND action = 'In'";
$result1 = mysqli_query($con, $query1);

$query = "SELECT * 
          FROM shipping_price";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

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
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Your Inventory</h2>
                    <hr/>
                </div>
            </div>        
            <section class="content">
                <p>Below 1kg = RM <?php echo $results['bprice']; ?>, above 1kg each 0.5kg = RM <?php echo $results['oprice']; ?></p>
                <form action="shippingrequest.php" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                ?>
                                <table class="table thead-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Order Code</th>
                                            <th>Weight</th>
                                            <th>Date / Time</th>
                                        </tr>
                                    </thead>
                                <?php 
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        $counter++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['order_code']; ?></td>
                                                <td><?php echo $row['weight']; ?></td>
                                                <td><?php echo $row['datetime']; ?></td>
                                                <td><input type="checkbox" weight="<?php echo $row['weight']; ?>" value="<?php echo $row['i_id']; ?>" name="item[]"></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                        }
                                    }else{
                                    ?>
                                        <p>There is no item in warehouse.</p>
                                    <?php
                                    }
                                ?>
                            </table>

                            <input type="hidden" id="totalweight" name="totalweight" class="form-control" value="">
                            <input type="submit" class="btn btn-success" name="shipnow" value="Ship Now" onclick="return val();">
                        </div>
                    </div>
                </form>
            </section>
        </div>
        
        <div><?php include('../footer.php') ?></div>
    </body>

    <script>
        /*Weight*/
        $(document).ready(function() {
            function recalculate() {
                var sum = 0;

                $("input[type=checkbox]:checked").each(function() {
                    sum += parseFloat($(this).attr("weight"));
                });
                document.getElementById('totalweight').value = sum;
            }

            $("input[type=checkbox]").change(function() {
                recalculate();
            });
        });
        
        
        /*Validate*/
        function val(){
            var items = document.getElementsByName('item[]');
            var hasChecked = false;
            
            for (var i = 0; i < items.length; i++)
            {
                if (items[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false)
            {
                alert("Please select at least one item");
                return false;
            }
            return true;
        }
    </script>
</html>