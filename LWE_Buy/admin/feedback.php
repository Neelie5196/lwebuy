<?php

require_once '../connection/config.php';
session_start();
$counter =$counters =0;

$cfeedbackQuery = $db->prepare("
    SELECT *
    FROM contact
    WHERE status = 'unread'
    ORDER BY datetime desc
");

$cfeedbackQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$cfeedback = $cfeedbackQuery->rowCount() ? $cfeedbackQuery : [];

$csfeedbackQuery = $db->prepare("
    SELECT *
    FROM contact
    WHERE status = 'read'
    ORDER BY datetime desc
");

$csfeedbackQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$csfeedback = $csfeedbackQuery->rowCount() ? $csfeedbackQuery : [];

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
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Customer Feedback</h2>
                <hr/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Unread</strong>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($cfeedback)): ?>
                        <table class="table thead-bordered table-hover" style="width:80%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Date / Time</th>
                                </tr>
                            </thead>
                            <?php foreach($cfeedback as $c): 
                            {
                                $counter++;
                            }
                            ?>
                            <tbody>
                                <tr>
                                    <td width="5%"><?php echo $counter; ?></td>
                                    <td width="20%"><?php echo $c['name']; ?></td>
                                    <td width="40%"><?php echo $c['subject']; ?></td>
                                    <td width="20%"><?php echo $c['datetime']; ?></td>
                                    <td width="15%"><a href="feedbackview.php?cu_id=<?php echo $c['cu_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>There is no customer feedback.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong>Read</strong>
                        <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapse">Show History</button>
                    </div>
                </div>
            </div>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="span12 collapse" id="collapse">
                            <?php if(!empty($csfeedback)): ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Date / Time</th>
                                    </tr>
                                </thead>
                                <?php foreach($csfeedback as $cs): 
                                {
                                    $counters++;
                                }
                                ?>
                                <tbody>
                                    <tr>
                                        <td width="5%"><?php echo $counters; ?></td>
                                        <td width="20%"><?php echo $cs['name']; ?></td>
                                        <td width="40%"><?php echo $cs['subject']; ?></td>
                                        <td width="20%"><?php echo $cs['datetime']; ?></td>
                                        <td width="15%"><a href="feedbackview.php?cu_id=<?php echo $cs['cu_id']; ?>" class="btn btn-xs btn-info">View</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no customer feedback.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>