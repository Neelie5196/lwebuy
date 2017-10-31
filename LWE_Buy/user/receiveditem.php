<?php

require_once '../connection/config.php';
session_start();
$counter = 0;


$slotitemQuery = $db->prepare("

    SELECT *
    FROM slot s
    JOIN item i
    ON i.s_id = s.s_id
    WHERE user_id=:user_id

");

$slotitemQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$slotitem = $slotitemQuery->rowCount() ? $slotitemQuery : [];

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

    <body background="../resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Received Item</h2>
                    <hr/>
                </div>
            </div>
        </div>

        <section class = "content">
            <div class="container">
                <form action="shippingrequest.php" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php if(!empty($slotitem)): ?>
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
                                <?php foreach($slotitem as $slot): 
                                {
                                    $counter++;
                                }

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $slot['name']; ?></td>
                                        <td><?php echo $slot['order_code']; ?></td>
                                        <td><?php echo $slot['weight']; ?></td>
                                        <td><?php echo $slot['datetime']; ?></td>
                                        <td><input type="checkbox" weight="<?php echo $slot['weight']; ?>" name="item[]"></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no item in warehouse.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn btn-success" name="shipnow" value="Ship Now" style="float:right;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>