<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM users
          WHERE user_id='$user_id'";
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
            <h2>Contact Us</h2>
            <hr/>
        </div>
        <section class = "content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h3>Get In Touch With Us!</h3>
                                <hr/>
                                <form action="submitform.php" method="post">
                                    <input type="text" name="name" class="form-control" value="<?php echo $results['fname']; ?> <?php echo $results['lname']; ?>" placeholder="Your Name (Required)" style="border-radius: 30px;" required><br/>

                                    <input type="tel" name="contact" class="form-control" value="<?php echo $results['contact']; ?>" placeholder="Your Phone Number (Required)" style="border-radius: 30px;" required><br/>

                                    <input type="email" name="email" class="form-control" value="<?php echo $results['email']; ?>" placeholder="Your Email (Required)" style="border-radius: 30px;" required><br/>

                                    <input type="text" name="subject" class="form-control" placeholder="Subject (Required)" style="border-radius: 30px;" required><br/>

                                    <input type="text" name="tracknum" class="form-control" placeholder="Tracking Number (If Available)" style="border-radius: 30px;"><br/>

                                    <textarea cols="50" rows="5" class="form-control" name="message" placeholder="Message.............." style="border-radius: 30px;" required></textarea><br/>

                                    <input type="submit" class="btn btn-success" name="submit" value="Submit" style="float: right;">
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <center>
                                    <img src="../resources/img/home-4.png"><br/><br/>
                                    <img src="../resources/img/home-4-2.png">
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <h3>Our Offices</h3>
                        <hr/>
                        <p>Feel free to call one of our offices if you need further assistance!</p>
                        <h4 style="color: white;">Hong Kong</h4>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>Unit 9, 3/F, Hong Leong Industrial Complex, 4 Wang Kwong Road, Kowloon Bay, Kowloon, Hong Kong</p>
                            </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +852 3421 1122</em></p>
                                <p><span class="glyphicon glyphicon-print"></span><em> +852 3421 1134</em></p>
                            </div>
                        </div>
                        <h4 style="color: white;">Malaysia</h4>
                        <h5><b>Corporate Office</b></h5>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>Tower 3, Level 3A, Unit 7 (03-03A-07), UOA Business Park, No.1, Jalan Pengaturcara U1/51A, Seksyen U1, 40150 Shah Alam, Selangor Darul Ehsan. Malaysia<br/><a href="https://www.google.com/maps/place/Logistics+Worldwide+Express+(M)+Sdn+Bhd/@3.0849122,101.5840686,15z/data=!4m5!3m4!1s0x31cc4c4485dea883:0xd8713c20f8bf1f57!8m2!3d3.0859611!4d101.5867375?hl=en-AU" target="_blank">Corporate Office Google Map</a></p>
                            </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +603 8800 8838</em></p>
                                <p><span class="glyphicon glyphicon-print"></span><em> +603 8800 8839</em></p>
                            </div>
                        </div>
                        <h5><b>Corporate Office</b></h5>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>No.4, (Block B) Lorong SS 13/6C, Subang Jaya Industrial Estate, 47500 Subang, Selangor Darul Ehsan, Malaysia<br/><a href="https://www.google.com/maps/place/LWE+Logistics+Hub/@3.0679443,101.5973846,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xdac46c3287b0a919!8m2!3d3.0679443!4d101.5995733?hl=en" target="_blank">LWE Logistics Hub Google Map</a></p>
                            </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +603 8800 8830</em></p>
                                <p><span class="glyphicon glyphicon-print"></span><em> +603 8800 8831</em></p>
                            </div>
                        </div>
                        <h4 style="color: white;">China</h4>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>7th, Second Road, Industrial Estate in Xin Mu Old Village, Ping Hu Town, Loggang District, Shenzhen, Guangdong, 518111, China</p>
                            </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +86 755 2371 6515 Ext 801</em></p>
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +86 755 2371 6731</em></p>
                            </div>
                        </div>
                        <h4 style="color: white;">Taiwan</h4>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>台灣利威國際物流股份有限公司, Logistics Worldwide Express (TW) Co., Ltd, No.323, Sec. 2, Nanzhu Rd., Luzhu Dist., Taoyuan City 338, Taiwan</p>
                            </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +886 3 323 6081</em></p>
                                <p><span class="glyphicon glyphicon-print"></span><em> +886 3 323 6091</em></p>
                            </div>
                        </div>
                        <h4 style="color: white;">Singapore</h4>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>26 Kallang Avenue #06-00, Singapore 339417</p>
                            </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                <p><span class="glyphicon glyphicon-earphone"></span><em> +65 6817 5500</em></p>
                            </div>
                        </div>
                        <h4 style="color: white;">Korea</h4>
                        <div class="row">
                            <div class="col-xs-7 col-md-7 col-lg-7">
                                <p>ROOM 602, Bumhwa Building, 34 Namdaemun-Ro 1-Gil Jung-Gu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
              
        <div class="footercontainer">
            <div class="footer">
                <?php include_once('../footer.php') ?>
            </div>
        </div>
    </body>
</html>