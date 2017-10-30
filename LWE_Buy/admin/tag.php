<?php
    
?>
<html>
    <head>
        <title>LWE Buy</title>
        
        <script src="../frameworks/js/prototype.js" type="text/javascript"></script>
        <script src="../frameworks/js/prototype-barcode.js" type="text/javascript"></script>
        <script type="text/javascript">
    
            function generateBarcode(){
            $("barcode").update();
            var value = 'Hello World';
            var btype = 'code128';
            var renderer ='css';

            var settings = {
              output:renderer,
              bgColor: '#FFFFFF',
              color: '#000000',
              barWidth: 2,
              barHeight: 100,
              addQuietZone: false
            };

            $("barcode").update().show().barcode(value, btype, settings);      
          }

            $(function(){
            generateBarcode();
            });
        </script>
        
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
    </head>
    
    <body onload="generateBarcode()">
        <div class="parceltag">
            <h1>Logistic Worldwides Express</h1>
            <hr/>
            
            <div id="barcode" class="barcode">
                
            </div>
            
            <h3>Ship to:</h3>
            <p>Address</p>
        </div>
    </body>
</html>