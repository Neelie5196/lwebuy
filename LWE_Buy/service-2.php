<?php

require_once 'connection/config.php';
session_start();
$_SESSION['user_id'] =1;

?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link href="frameworks/css/bootstrap.min.css" rel="stylesheet"/>

        <!--stylesheet-->
        <link href="frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body background="resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

     <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="">Our Service
        <small>Information</small>
      </h1>

      <!-- Service One -->
      <div class="row">
        <div class="col-md-3">
          <a href="#">
            <img class="img" src="resources/service/i.e.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>International Express</h3>
		  <p>International Express is an international door-to-door solution for your time-sensitive goods.
			 Our system is seamlessly integrated with our global logistic partners. Your shipments are delivered to your customers’ doorstep by local fulfilment experts.
			 Full tracking details are provided, and proof of delivery is available upon request.</p>
		  <p></p>	
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Service Two -->
      <div class="row">
        <div class="col-md-3">
          <a href="#">
            <img class="img" src="resources/service/i.p.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>International Parcels</h3>
          <p>International Parcels is an economical and time definite delivery solution that is designed for small parcel shipments.
			 This solution is intelligently integrated and optimised to ensure that your International Parcel shipments are delivered within a specific time frame.
			 This solution also comes with a full online tracking service at an affordable cost.</p>
        </div>
      </div>
      <!-- /.row -->

   <hr>

      <!-- Service Three -->
      <div class="row">
        <div class="col-md-3">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="resources/service/i.pa.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>Postal Packets</h3>
          <p>International Parcels is an economical and time definite delivery solution that is designed for small parcel shipments.
			 This solution is intelligently integrated and optimised to ensure that your International Parcel shipments are delivered within a specific time frame.
	         This solution also comes with a full online tracking service at an affordable cost.</p>
        </div>
      </div>
      <!-- /.row -->

	  <hr>
    

    </div>
        
        <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
        <script src="frameworks/js/jquery.min.js"></script>

        <!-- All Bootstrap plug-ins file -->
        <script src="frameworks/js/bootstrap.min.js"></script>
    </body>
</html>