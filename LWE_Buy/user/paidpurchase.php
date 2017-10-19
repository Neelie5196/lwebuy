<?php
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

    <body background="../resources/img/bg.jpg">
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Payment</h2>
                <hr/>
            </div>
            
            <section class = "content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                        <?php
                            require_once '../connection/config.php';
                
                            $file = rand(1000,100000)."-".$_FILES['file']['name'];
                            $file_loc = $_FILES['file']['tmp_name'];
                            $file_size = $_FILES['file']['size'];
                            $file_type = $_FILES['file']['type'];
                            $folder="../uploads/";
                            $title = $_POST['title'];
                            $order_id = $_POST['order_id'];
                            $status = 'Paid';
                
                            $new_size = $file_size/1024;
                            $new_file_name = strtolower($file);
                            $final_file=str_replace(' ','-',$new_file_name);

                            if(move_uploaded_file($file_loc,$folder.$final_file))
                            {
                                $sql="INSERT INTO lecture(unit_id,title,file,description,type,size) VALUES('$unit','$title','$final_file','$description','$file_type','$new_size')";
                                mysql_query($sql);
                                ?>
                                <script>
                                alert('successfully uploaded');
                                window.location.href='../course_view.php?id=<?php echo $unit; ?>&success';
                                </script>
                                <?php
                            }
                            else
                            {
                                ?>
                                <script>
                                alert('error while uploading file');
                                window.location.href='../course_view.php?id=<?php echo $unit; ?>&fail';
                                </script>
                                <?php
                            }
                        
                            $order_id = $_POST['orderId'];
                            $user_id = $_SESSION['user_id'];
                            $status = "Request";

                            $sql = "INSERT INTO order_list (ol_id, user_id, status, datetime) VALUES ('$order_id','$user_id','$status',NOW())";
                            mysql_query($sql);
		
                        
                            $s = "INSERT INTO order_item (order_id, name, link, type, unit, remark) values";
                            for($i=0; $i<$_POST['numbers']; $i++){
                                 $s .= "('".$_POST['orderID'][$i]."','".$_POST['name'][$i]."','".$_POST['link'][$i]."','".$_POST['type'][$i]."','".$_POST['unit'][$i]."','".$_POST['remark'][$i]."'),";
                                
                            }
                            $s = rtrim($s,",");
                            if(!mysql_query($s))
                                echo mysql_error();
                            else
                                echo "<h2>Submit Successful</h2>"; 
                        ?>                       
                        
                    </div>
                </div>
                <a href='purchaseproduct-1.php' class='btn btn-default' name='back'>Back to Purchase</a>
            </section>
        </center>
    </body>
</html>











<?php
require_once '../connection/config.php';

if(isset($_POST['order_id']))
{    
    $order_id = $_POST['order_id'];
    $status = 'Paid';
    
	
	$result = mysql_query("UPDATE order_list SET status='$status', datetime=NOW() WHERE ol_id = $order_id ") or die(mysql_error());
    ?>
    <script>
    alert('Success to Do Payment');
    window.location.href='purchaselist.php?&success';
    </script>
    <?php
}
else
{
    ?>
    <script>
    alert('Error While Do Payment, Please try again');
    window.location.href='purchasepview.php?order_id=<?php echo $order_id; ?>&fail';
    </script>
    <?php
}
?>