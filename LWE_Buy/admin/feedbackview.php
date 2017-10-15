<?php

require_once '../connection/config.php';
session_start();

if(isset($_GET['cu_id']))
{    

    $cu_id = $_GET['cu_id'];
    $status = 'read';
	
	$result = mysql_query("UPDATE contact SET status = '$status' WHERE cu_id = $cu_id ") or die(mysql_error());

}

$cfeedbackQuery = $db->prepare("
    SELECT *
    FROM contact
    WHERE cu_id=:cu_id
    ORDER BY datetime desc
");

$cfeedbackQuery->execute([
    'cu_id' => $_GET['cu_id']
]);

$cfeedback = $cfeedbackQuery->rowCount() ? $cfeedbackQuery : [];

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
        <?php if(!empty($cfeedback)): ?>
        <?php foreach($cfeedback as $c): ?>
        <div class="container">
            <h2>Subject: <?php echo $c['subject']; ?></h2>
            <hr/>
        </div>
        <center>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12" style="background:#444; padding:10px; color:#fff; font-weight:bold; font-size:180%; text-align: left;">
                        <strong><?php echo $c['name']; ?></strong>
                        <input type="text" style="float: right;" class="btn btn-success" value="<?php echo $c['datetime']; ?>" readonly>
                    </div>
                </div>
            </div>
            <br/>
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Email</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" placeholder="<?php echo $c['email']; ?>" style="border-radius: 30px; width: 50%;float: left;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Contact</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" placeholder="<?php echo $c['contact']; ?>" style="border-radius: 30px; width: 50%;float: left;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Track Number</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" placeholder="<?php echo $c['tracknum']; ?>" style="border-radius: 30px; width: 50%;float: left;" readonly>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <label>Message</label>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-8">
                                <textarea cols="25" rows="5" class="form-control" placeholder="<?php echo $c['message']; ?>" style="border-radius: 30px; width: 50%; float: left;" autocomplete="off" readonly></textarea>
                            </div>
                        </div>
                        <br/>
                        <a href="javascript:history.go(-1)" class="btn btn-default" name="back">Back</a>
                    </div>
                </div>
            </section>
            <?php endforeach; ?>
            <?php else: ?>
                <p>Error.</p>
            <?php endif; ?>
        </center>
    </body>
</html>