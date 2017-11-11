<?php
require_once '../connection/config.php';
session_start();

$tracking_code = $_GET['tracking_code'];
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM warehouse wh
          JOIN work_station ws
          ON ws.wh_id = wh.wh_id
          JOIN users us
          ON us.user_id = ws.user_id
          WHERE us.user_id = '$user_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM warehouse";
$result1 = mysqli_query($con, $query1);

/*$query2 = "SELECT *
           FROM shipping sh
           JOIN address ad
           ON ad.a_id = sh.a_id";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);*/

                                                
if (isset($_POST['updateshipping'])) 
{
    $trackcode = $_POST['trackcode'];
    $eventType = $_POST['eventType'];
    
    $stationCode = $_POST['stCode'];
    $stationName = $_POST['stDesc'];
    $countryCode = $_POST['CtyCode'];
    $countryName = $_POST['CtyDesc'];
    $remark = $_POST['remark'];
    
    if($eventType == 'in')
    {
        $eventAct = $_POST['eventAct'];

        if($eventAct == 'arrive')
        {
            $eventMore = $_POST['eventMore'];
            
            if($eventMore == 'airport')
            {
                $eventDesc = 'Shipment arrived at airport.';
            }
            else
            {
                $eventDesc = 'Shipment arrived at ' . $stationName . ' station.';
            }
            
            $result = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$trackcode', StationCode='$stationCode', StationDescription='$stationName', CountryCode='$countryCode', CountryDescription='$countryName', EventCode='ARV', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark='$remark'") or die(mysqli_error($con));
        }
        else
        {
            $eventDesc = 'Custom cleared and arrived at ' . $stationName . '.';
            
            $result = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$trackcode', StationCode='$stationCode', StationDescription='$stationName', CountryCode='$countryCode', CountryDescription='$countryName', EventCode='CAV', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark='$remark'") or die(mysqli_error($con));
        }
    }
    else if($eventType == 'out')
    {
        $eventAct = $_POST['eventAct'];
        
        if($eventAct == 'depart')
        {
            $eventDesc = 'Shipment departed from/to ' . $stationName . ' station.';
            
            $result = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$trackcode', StationCode='$stationCode', StationDescription='$stationName', CountryCode='$countryCode', CountryDescription='$countryName', EventCode='DPT', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark='$remark'") or die(mysqli_error($con));
        }
        else if($eventAct == 'register')
        {
            $desStation = $_POST['desStation'];
            $eventDesc = 'Shipment info registered at ' . $stationName . '.';
            
            $result1 = mysqli_query($con, "UPDATE shipping SET status = 'Proceed' WHERE tracking_code = $trackcode") or die(mysqli_error($con));
            
            $result = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$trackcode', StationCode='$stationCode', StationDescription='$stationName', CountryCode='$countryCode', CountryDescription='$countryName', EventCode='RDL', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark='$remark'") or die(mysqli_error($con));
            
            $query3 = "SELECT * FROM shipping WHERE tracking_code = '$trackcode'";
            $result3 = mysqli_query($con, $query3);
            $results3 = mysqli_fetch_assoc($result3);
            
            $recipient = $results3['recipient_name'];

            $query4 = "SELECT * FROM warehouse WHERE station_description = '$desStation'";
            $result4 = mysqli_query($con, $query4);
            $results4 = mysqli_fetch_assoc($result4);
            
            $destinationStationCode = $results4['station_code'];
            $destinationCountryCode = $results4['country_code'];
            $destinationCountryName = $results4['country_description'];
            
            $result2 = mysqli_query($con, "INSERT INTO shipping_update_summary SET HawbNo='$trackcode', DeliveryDate='', RecipientName='$recipient', SignedName='', OriginStationCode='$stationCode', OriginStationDescription='$stationName', OriginCountryCode='$countryCode', OriginCountryDescription='$countryName', DestinationStationCode='$destinationStationCode', DestinationStationDescription='$desStation', DestinationCountryCode='$destinationCountryCode', DestinationCountryDescription='$destinationCountryName', EventCode='IP', EventDescription='In Proceed', ReasonCode='IS', ReasonDescription='Is Shipping', Remark='$remark'") or die(mysqli_error($con));
        }
        else
        {
            $eventDesc = 'Pickup shipment checked in at ' . $stationName . '.';

            $result = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$trackcode', StationCode='$stationCode', StationDescription='$stationName', CountryCode='$countryCode', CountryDescription='$countryName', EventCode='PKI', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark='$remark'") or die(mysqli_error($con));
        }
    }
    else
    {
        $signedName = $_POST['signedName'];
        
        $result = mysqli_query($con, "UPDATE shipping SET status = 'Delivered' WHERE tracking_code = $trackcode") or die(mysqli_error($con));
        
        $result1 = mysqli_query($con, "UPDATE shipping_update_summary SET SignedName = '$signedName', EventCode = 'DL', EventDescription = 'Delivered', ReasonCode = 'DL', ReasonDescription = 'Delivered' WHERE HawbNo = $trackcode") or die(mysqli_error($con));
        
        $eventDesc = 'SHIPMENT DELIVERED';
        
        $result2 = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$trackcode', StationCode='$stationCode', StationDescription='$stationName', CountryCode='$countryCode', CountryDescription='$countryName', EventCode='DLV', EventDescription='$eventDesc', ReasonCode='DL', ReasonDescription='Delivered', Remark='$remark'") or die(mysqli_error($con));

    }
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
        
        <!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body background="../resources/img/bg.jpg" ng-app="">
        <div class="row">
            <?php include_once('nav.php') ?>
        </div>

        <div class="container">
            <h2>Shipping Details</h2>

            <div class="row" ng-init="in=true">
                <div class="updateform col-xs-12 col-md-12 col-lg-12 jumbotron">
                    <form action="updateshipping.php?tracking_code=<?php echo '' ?>" method="post">
                        <h3>Station details</h3>
                        <input type="text" name="stCode" value="<?php echo $results['station_code']; ?>" hidden="hidden" />
                        <input type="text" name="CtyCode" value="<?php echo $results['country_code']; ?>" hidden="hidden" />
                        <table class="tblUpdate">
                            <tr>
                                <td class="lblUpdate"><label for="stDesc">Station Name: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" class="form-control" name="stDesc" id="stDesc" value="<?php echo $results['station_description']; ?>" readonly="readonly" /></td>
                            </tr>
                            
                            <tr>
                                <td class="lblUpdate"><label for="CtyDesc">Country: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" class="form-control" name="CtyDesc" id="CtyDesc" value="<?php echo $results['country_description']; ?>" readonly="readonly" /></td>
                            </tr>
                        </table>

                        <h3>Update details</h3>
                        <table class="tblUpdate">
                            <tr>
                                <td class="lblUpdate">Event Type: </td>
                                <td class="inputUpdate">
                                    <input type="radio" name="eventType" value="in" ng-click="in=true; out=false; delivered=false; register=false" checked="checked" /> In&nbsp;
                                    <input type="radio" name="eventType" value="out" ng-click="out=true; in=false; delivered=false; arrive=false;" /> Out&nbsp;
                                    <input type="radio" name="eventType" value="delivered" ng-click="in=false; out=false; delivered=true; arrive=false; register=false" /> Delivered&nbsp;
                                </td>                                
                            </tr>
                            
                            <tr ng-show="in || out">
                                <td class="lblUpdate">Event Activity: </td>
                                
                                <td class="inputUpdate" ng-show="in">
                                    <input type="radio" name="eventAct" value="arrive" ng-click="arrive=true" /> Arrive&nbsp;
                                    <input type="radio" name="eventAct" value="custom" ng-click="arrive=false" /> Clear custom and arrive&nbsp;
                                </td>
                                
                                <td class="inputUpdate" ng-show="out">
                                    <input type="radio" name="eventAct" value="depart" ng-click="register=false" /> Depart&nbsp;
                                    <input type="radio" name="eventAct" value="register" ng-click="register=true" /> Register&nbsp;
                                    <input type="radio" name="eventAct" value="check" ng-click="register=false" /> Check in&nbsp;
                                </td>
                            </tr>
                            
                            <tr ng-show="arrive">
                                <td class="lblUpdate">More event details: </td>
                                <td class="inputUpdate" ng-show="arrive">
                                    <input type="radio" name="eventMore" value="aiport" /> Airport&nbsp;
                                    <input type="radio" name="eventMore" value="station" /> Station&nbsp;
                                </td>
                            </tr>
                            
                            <tr ng-show="register">
                                <td class="lblUpdate">Destination station: </td>
                                <td class="inputUpdate">
                                    <select name="desStation">
                                        <?php
                                             /*if($tracking_code != '')
                                             {
                                                if($results2['tracking_code'] == $tracking_code)
                                                {
                                                    $desCountry = $results2['country'];
                                                }
                                                
                                                if(mysqli_num_rows($result1) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result1))
                                                    {
                                                        if($row['country_description'] == $desCountry)
                                                        {*/
                                                        ?>
<!--
                                                            <option value="<?php /*echo $row['station_description']; ?>"><?php echo $row['station_description'];*/ ?></option>
-->
                                                        <?php
                                                        /*}
                                                    }
                                                }
                                             }
                                             else
                                             {*/
                                                if(mysqli_num_rows($result1) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result1))
                                                    {
                                                        ?>
                                                            <option value="<?php echo $row['station_description']; ?>"><?php echo $row['station_description']; ?></option>
                                                        <?php
                                                    }
                                                }
//                                             }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr ng-show="delivered">
                                <td class="lblUpdate"><label for="signedName">Signed Name: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" class="form-control" name="signedName" id="signedName" /></td>
                            </tr>
                            
                            <tr>
                                <td class="lblUpdate"><label for="remark">Remark: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" class="form-control" name="remark" id="remark" /></td>
                            </tr>
                            
                            <tr>
                                <td><label for="trackcode">Tracking code: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" class="form-control" name="trackcode" id="trackcode" value="<?php echo $tracking_code; ?>" /></td>    
                            </tr>
                        </table>
                        
                        <p class="btnUpdate">
                            <input type="submit" name="updateshipping" value="Update" class="btn btn-success"/>
                            <a href="shippinglist.php"><input type="button" value="Back" class="btn btn-default"/></a>
                        </p>
                    </form>
                </div>      
            </div>
    </body>
</html>