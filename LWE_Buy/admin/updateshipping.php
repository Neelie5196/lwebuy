<?php

require_once '../connection/config.php';
session_start();

if (isset($_POST['updateshipping'])) 
{
    $trackcode = $_POST['trackcode'];
    
    $updateshippingQuery = $db->prepare("UPDATE shipping SET status='Proceeded' WHERE tracking_code=:trackcode");

    $updateshippingQuery->execute(['trackcode' => $trackcode]);
    /*$updateshippingQuery = $db->prepare("SELECT * FROM shipping WHERE tracking_code=:trackcode");
    
    $updateshippingQuery->execute(['trackcode' => $trackcode]);
    
    $updateshipping = $updateshippingQuery->rowCount() ? $updateshippingQuery : [];
    
    if(!empty($updateshipping))
    {
        foreach($updateshipping as $up)
        {
            if ($up['status']=="Request")
            {
                $sql = "UPDATE shipping SET status='Proceeded' WHERE tracking_code=$trackcode";
                mysql_query($sql);
                
            }
        }
    }
    else
    {
        
    }*/
}
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

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <form action="updateshipping.php" method="post">
                        <h2>
                            Tracking code: 
                            <input type="text" name="trackcode" id="trackcode"/>
                        </h2>

                        <h2>Station details</h2>
                        <table>
                            <tr class="updateshipping">
                                <td><label for="stName">Station name: </label></td>
                                <td><input type="text" name="stName" id="stName"/></td>
                            </tr>

                            <tr class="updateshipping">
                                <td><label for="stCountry">Station country: </label></td>
                                <td><input type="text" name="stCountry" id="stCountry"/></td>
                            </tr>
                        </table>

                        <h2>Update details</h2>
                        <table>
                            <tr class="updateshipping">
                                <td><label for="upActivity">Parcel Activity: </label></td>
                                <td>
                                    <input type="radio" name="upActivity" id="upActivity" value="Arrived at" checked="checked"/> In
                                    <input type="radio" name="upActivity" id="upActivity" value="Departed from"/> Out
                                    <input type="radio" name="upActivity" id="upActivity" value=" "/> Others
                                </td>
                            </tr>

                            <tr class="updateshipping">
                                <td><label for="upDesc">Desription: </label></td>
                                <td><textarea name="upDesc" id="upDesc" rows="3" cols="50"></textarea></td>
                            </tr>

                            <tr class="updateshipping">
                                <td><label for="upRemarks">Remarks: </label></td>
                                <td><input type="text" name="upRemarks" id="upRemarks"/></td>
                            </tr>
                        </table>

                        <input type="submit" name="updateshipping" value="Update" class="btn btn-default"/>
                    </form>
                </div>      
            </div>
        </center>
    </body>
</html>