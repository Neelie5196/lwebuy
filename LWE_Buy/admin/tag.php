<html>
    <head>
        <title>LWE Buy</title>

        <link href="../frameworks/css/style.css" rel="stylesheet"/>
    </head>
    
    <body>
        <div class="parceltag">
            <h1>Logistic Worldwides Express</h1>
            <hr/>
            
            <div class="barcode">
                <?php
                    require_once('../frameworks/barcode/class/BCGFont.php');
                    require_once('../frameworks/barcode/class/BCGcolor.php');
                    require_once('../frameworks/barcode/class/BCGDrawing.php');
                    require_once('../frameworks/barcode/class/BCGcode128.barcode.php');
                
                    $colorFront = new BCGColor(0, 0, 0);
                    $colorBack = new BCGColor(255, 255, 255);
                
                    $code = new BCGcode128();
                    $code->setScale(1);
                    $code->setColor($colorFront, $colorBack);
                    $code->parse('123987');
                
                    $drawing = new BCGDrawing('', $colorBack);
                    $drawing->setBarcode($code);
                    $drawing->draw();
                    
                    header('Content-Type: image/png');
                    
                    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
                ?>
            </div>
            
            <h3>Ship to:</h3>
            <p>Address</p>
        </div>
    </body>
</html>