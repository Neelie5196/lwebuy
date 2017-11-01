<?php
require_once '../connection/config.php';
session_start();
$_SESSION['s_id'] = $_GET['s_id'];

$shippingdetailQuery = $db->prepare("
    SELECT *
    FROM shipping sh
    JOIN users us
    ON us.user_id = sh.user_id
    JOIN address ad
    on ad.a_id = sh.a_id
    WHERE s_id=:s_id
");

$shippingdetailQuery->execute([
    's_id' => $_SESSION['s_id']
]);

$shippingdetail = $shippingdetailQuery->rowCount() ? $shippingdetailQuery : [];
?>

<html>
    <head>
        <title>LWE Buy</title>
        
        <script src="../frameworks/js/prototype.js" type="text/javascript"></script>
        <script src="../frameworks/js/prototype-barcode.js" type="text/javascript"></script>
        <script type="text/javascript">
            function generateBarcode()
            {
                $("barcode").update();
                var value = 'ASFLF214';
                var btype = 'code128';
                var renderer ='css';

                var settings = 
                {
                  output:renderer,
                  bgColor: '#FFFFFF',
                  color: '#000000',
                  barWidth: 2,
                  barHeight: 100,
                  addQuietZone: false
                };

                $("barcode").update().show().barcode(value, btype, settings);      
            }

        $(function()
          {
            generateBarcode();
            }
         );
        </script>
        
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
    </head>
    
    <body onload="generateBarcode()">
        <div class="parceltag">
            <h1>Logistic Worldwides Express</h1>
            <hr/>
            
            <div id="barcode" class="barcode">
                
            </div>
            <?php 
                if(!empty($shippingdetail))
                {
                    foreach($shippingdetail as $sd)
                    {
            ?>
            <h3>Ship to:</h3>
            <p>
                <?php echo $sd['fname']. " " . $sd['lname'] ?>
            </p>
            <h3>Address</h3>
            <p><?php echo $sd['address'] . ", " . $sd['postcode'] . " " . $sd['city'] . ", " . $sd['state'] . ", " . $sd['country']; ?></p>
            
            <?php
                        }
                    }
                ?>
        </div>
        
        
    </body>
</html>