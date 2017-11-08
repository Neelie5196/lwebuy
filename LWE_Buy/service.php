<?php

require_once 'connection/config.php';

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
          <h3>International Deliveries</h3>
          <p>International Express</p>
		  <p>International Express is an international door-to-door solution for your time-sensitive goods.
			 Our system is seamlessly integrated with our global logistic partners. Your shipments are delivered to your customers’ doorstep by local fulfilment experts.
			 Full tracking details are provided, and proof of delivery is available upon request.</p>
		  <p>International Parcels</p>
		  <p>Postal Packets</p>	
          <a class="btn btn-info" href="service-2.php">View Details</a>
		    
        </div>
 
      </div>
	   <hr>
      <!-- /.row -->

      <!-- Service Two -->
      <div class="row">
        <div class="col-md-3">
          <a href="#">
            <img class="img" src="resources/service/inbound.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>Inbound Express</h3>
          <p>With Inbound Express (otherwise known as IPX), LWE will help its customers to import their goods purchased from overseas and have it delivered right to their doorstep. 
		     LWE can arrange for a pick up from suppliers, and provide assistance on shipping documentation and customs clearance. 
			 LWE strives to ensure smooth and safe delivery of all transacted goods.
			 When there are cases of a supplier providing cheaper courier charges locally, customers may opt for the supplier to ship their goods directly to LWE’s carefully curated warehouses. 
			 From the warehouse, LWE will manage the logistics to get the product to you. Having your suppliers’ ship to LWE’s local warehouses will also allow you to manage your shipping costs.</p>
     
        </div>
      </div>
      <!-- /.row -->

   <hr>

      <!-- Service Three -->
      <div class="row">
        <div class="col-md-3">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="resources/service/ff.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>Freight Forwarding</h3>
          <p>For heavier or larger shipments, LWE provides global and cost effective services to ensure your needs are met. 
		     We offer a wide range of logistic options that we are sure you will find suitable for your business.
			 LWE also provides proper packing services to ensure that the shipment is secured during transit. 
			 Once the shipment arrives to its destination, LWE can also assist in managing customs clearance to have the shipment delivered to your preferred location. 
			 LWE has a dedicated team as well as the technology infrastructure to ensure that your distribution preference can be properly executed.</p>
  
        </div>
      </div>
      <!-- /.row -->

      <hr></hr>

      <!-- Service Four -->
      <div class="row">

        <div class="col-md-3">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="resources/service/warehouse.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>Warehousing</h3>
          <p>LWE provides warehousing capabilities to manage customers’ inventory and stock. This allows our customers to focus on developing the business side of things.
			 We are also able to pre-ship your goods in bulk and arrange for it to be stored at a specific destination. Individual orders can also be fulfilled locally. 
			 Fast moving products can also be absorbed into our efficient last mile delivery system.
             LWE can also arrange for bonded warehouses to serve as your regional distribution centre within South East Asia. 
			 Bulk goods will be shipped from the country of origin directly into the bonded warehouses. Then the goods will be separated and shipped out to their specific destinations. 
			 This method saves our customers from import taxes as goods are shipped in bulk to a warehouse, prior to the goods being shipped out individually.</p>
     
        </div>
      </div>
      <!-- /.row -->

     <hr>
	  
	   <!-- Service Five -->
      <div class="row">

        <div class="col-md-3">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="resources/service/drop.jpg" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <h3>Drop Shipping</h3>
          <p>This service will benefit customers who are purchasing overseas stocks to be imported back to their home country, prior to shipping them out individually to their respective buyers.
			 Once LWE picks up your stocks from the nominated origin country, we can have your stocks stored temporarily. 
			 The stocks will then be processed into individual orders, and shipped directly to your buyers. This solution is ideal as it saves time and cost.</p>
  
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