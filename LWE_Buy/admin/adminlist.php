<?php

require_once '../connection/config.php';
session_start();
$counter = 0; 
$userslistQuery = $db->prepare("
    SELECT *
    FROM users
    WHERE type = 'admin'

");

$userslistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$userslist = $userslistQuery->rowCount() ? $userslistQuery : [];


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

        <center>
            <div class="container">
                <div class="row" style="padding-top: 50px; padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Admin List</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php if(!empty($userslist)): ?>
                            <table class="table thead-bordered table-hover userslist">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <?php foreach($userslist as $users): 
                                {
                                    $counter++;
                                }
                                
                                ?>
                                <tbody class="users">
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td width="20%"><?php echo $users['fname']; ?></td>
                                        <td width="20%"><?php echo $users['lname']; ?></td>
                                        <td width="20%"><?php echo $users['email']; ?></td>
                                        <td width="20%"><?php echo $users['contact']; ?></td>
                                        <td width="20%"><a href="usersview.php?users=<?php echo $users['user_id']; ?>" class="btn btn-xs btn-info">View Detail</a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                            <?php else: ?>
                                <p>There is no admin users.</p>
                            <?php endif; ?>      
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>