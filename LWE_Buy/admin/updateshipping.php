<?php

require_once '../connection/config.php';
session_start();

$workstQuery = $db->prepare("
    SELECT *
    FROM warehouse wh
    JOIN work_station ws
    ON ws.wh_id = wh.wh_id
    JOIN users us
    ON us.user_id = ws.user_id
");

$workstQuery->execute();

$workst = $workstQuery->rowCount() ? $workstQuery : [];

$getstationsQuery = $db->prepare("SELECT * FROM warehouse");

$getstationsQuery->execute();

$getstations = $getstationsQuery->rowCount() ? $getstationsQuery : [];

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
            
            $arriveshippingdetQuery = $db->prepare("
            INSERT INTO shipping_update_details
            (HawbNo, 
            StationCode, 
            StationDescription, 
            CountryCode, 
            CountryDescription, 
            EventCode, 
            EventDescription, 
            ReasonCode, 
            ReasonDescription, 
            Remark) 
            VALUES (
            '$trackcode', 
            '$stationCode', 
            '$stationName', 
            '$countryCode', 
            '$countryName', 
            'ARV', 
            '$eventDesc', 
            'IS', 
            'Is Shipping',
            '$remark'
            )");

            $arriveshippingdetQuery->execute();
        }
        else
        {
            $eventDesc = 'Custom cleared and arrived at ' . $stationName . '.';
                
            $arriveshippingdetQuery = $db->prepare("
            INSERT INTO shipping_update_details
            (HawbNo, 
            StationCode, 
            StationDescription, 
            CountryCode, 
            CountryDescription, 
            EventCode, 
            EventDescription, 
            ReasonCode, 
            ReasonDescription, 
            Remark) 
            VALUES (
            '$trackcode', 
            '$stationCode', 
            '$stationName', 
            '$countryCode', 
            '$countryName', 
            'CAV', 
            '$eventDesc', 
            'IS', 
            'Is Shipping',
            '$remark'
            )");
        }
    }
    else if($eventType == 'out')
    {
        $eventAct = $_POST['eventAct'];
        
        if($eventAct == 'depart')
        {
            $eventDesc = 'Shipment departed from/to ' . $stationName . ' station.';
                
            $arriveshippingdetQuery = $db->prepare("
            INSERT INTO shipping_update_details
            (HawbNo, 
            StationCode, 
            StationDescription, 
            CountryCode, 
            CountryDescription, 
            EventCode, 
            EventDescription, 
            ReasonCode, 
            ReasonDescription, 
            Remark) 
            VALUES (
            '$trackcode', 
            '$stationCode', 
            '$stationName', 
            '$countryCode', 
            '$countryName', 
            'DPT', 
            '$eventDesc', 
            'IS', 
            'Is Shipping',
            '$remark'
            )");

            $arriveshippingdetQuery->execute();
        }
        else if($eventAct == 'register')
        {
            $desStation = $_POST['desStation'];
            $eventDesc = 'Shipment info registered at ' . $stationName . '.';
            
            $proceedshippingQuery = $db->prepare("UPDATE shipping SET status = 'Proceed' WHERE tracking_code = $trackcode");
            $proceedshippingQuery->execute();
            
            $proceedshippingdetQuery = $db->prepare("
            INSERT INTO shipping_update_details
            (HawbNo, 
            StationCode, 
            StationDescription, 
            CountryCode, 
            CountryDescription, 
            EventCode, 
            EventDescription, 
            ReasonCode, 
            ReasonDescription, 
            Remark) 
            VALUES (
            '$trackcode', 
            '$stationCode', 
            '$stationName', 
            '$countryCode', 
            '$countryName', 
            'RDL', 
            '$eventDesc', 
            'IS', 
            'In Shipping',
            '$remark'
            )");
            
            $proceedshippingdetQuery->execute();            
            
            $getrecipientQuery = $db->prepare("SELECT * FROM shipping");
            $getrecipientQuery->execute();
            $getrecipient = $getrecipientQuery->rowCount() ? $getrecipientQuery : [];
            
            if(!empty($getrecipient))
            {
                foreach($getrecipient as $gr)
                {
                    if($gr['tracking_code'] == $trackcode)
                    {
                        $recipient = $gr['recipient_name'];
                    }
                }
            }
            
            $getdestinationQuery = $db->prepare("SELECT * FROM warehouse");
            $getdestinationQuery->execute();
            $getdestination = $getdestinationQuery->rowCount() ? $getdestinationQuery : [];
            
            if(!empty($getdestination))
            {
                foreach($getdestination as $gd)
                {
                    if($gd['station_description'] == $desStation)
                    {
                        $destinationStationCode = $gd['station_code'];
                        $destinationCountryCode = $gd['country_code'];
                        $destinationCountryName = $gd['country_description'];
                    }
                }
            }
            
            $proceedshippingsumQuery = $db->prepare("
            INSERT INTO shipping_update_summary(
            HawbNo,
            DeliveryDate,
            RecipientName,
            SignedName,
            OriginStationCode, 
            OriginStationDescription, 
            OriginCountryCode, 
            OriginCountryDescription,
            DestinationStationCode, 
            DestinationStationDescription, 
            DestinationCountryCode,
            DestinationCountryDescription,
            EventCode, 
            EventDescription, 
            ReasonCode, 
            ReasonDescription, 
            Remark) 
            VALUES (
            '$trackcode', 
            '',
            '$recipient',
            '',
            '$stationCode', 
            '$stationName', 
            '$countryCode', 
            '$countryName',
            '$destinationStationCode',
            '$desStation',
            '$destinationCountryCode',
            '$destinationCountryName',
            'IP', 
            'In Proceed', 
            'IS', 
            'In Shipping', 
            '$remark'
            )");
    
            $proceedshippingsumQuery->execute();
        }
        else
        {
            $eventDesc = 'Pickup shipment checked in at ' . $stationName . '.';

            $checkshippingdetQuery = $db->prepare("
            INSERT INTO shipping_update_details
            (HawbNo, 
            StationCode, 
            StationDescription, 
            CountryCode, 
            CountryDescription, 
            EventCode, 
            EventDescription, 
            ReasonCode, 
            ReasonDescription, 
            Remark) 
            VALUES (
            '$trackcode', 
            '$stationCode', 
            '$stationName', 
            '$countryCode', 
            '$countryName', 
            'PKI', 
            '$eventDesc', 
            'IS', 
            'Is Shipping',
            '$remark'
            )");

            $checkshippingdetQuery->execute();
        }
    }
    else
    {
        $signedName = $_POST['signedName'];
        
        $endshippingQuery = $db->prepare("UPDATE shipping SET status = 'Delivered' WHERE tracking_code = $trackcode");
        $endshippingQuery->execute();

        $endshippingsumQuery = $db->prepare("UPDATE shipping_update_summary SET SignedName = '$signedName', EventCode = 'DL', EventDescription = 'Delivered', ReasonCode = 'DL', ReasonDescription = 'Delivered' WHERE HawbNo = $trackcode");
        $endshippingsumQuery->execute();
        
        $eventDesc = 'SHIPMENT DELIVERED';

        $endshippingdetQuery = $db->prepare("
        INSERT INTO shipping_update_details
        (HawbNo, 
        StationCode, 
        StationDescription, 
        CountryCode, 
        CountryDescription, 
        EventCode, 
        EventDescription, 
        ReasonCode, 
        ReasonDescription, 
        Remark) 
        VALUES (
        '$trackcode', 
        '$stationCode', 
        '$stationName', 
        '$countryCode', 
        '$countryName', 
        'DLV', 
        '$eventDesc', 
        'DL', 
        'Delivered',
        '$remark'
        )");

        $endshippingdetQuery->execute();
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

            <div class="row" ng-init="in=true">
                <div class="updateform col-xs-12 col-md-12 col-lg-12">
                <?php
                    if(!empty($workst))
                    {
                        foreach($workst as $w)
                        {
                            if($w['user_id'] == $_SESSION['user_id'])
                            {

                ?>
                    <form class="form-inline" action="updateshipping.php" method="post">
                        <h2>Station details</h2>
                        <input type="text" name="stCode" value="<?php echo $w['station_code']; ?>" hidden="hidden" />
                        <input type="text" name="CtyCode" value="<?php echo $w['country_code']; ?>" hidden="hidden" />
                        <table class="tblUpdate">
                            <tr>
                                <td class="lblUpdate"><label for="stDesc">Station Name: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" name="stDesc" id="stDesc" value="<?php echo $w['station_description']; ?>" readonly="readonly" /></td>
                            </tr>
                            
                            <tr>
                                <td class="lblUpdate"><label for="CtyDesc">Country: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" name="CtyDesc" id="CtyDesc" value="<?php echo $w['country_description']; ?>" readonly="readonly" /></td>
                            </tr>
                        </table>

                        <h2>Update details</h2>
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
                            
                            <tr ng-show="register || arrive">
                                <td class="lblUpdate">More event details: </td>
                                <td class="inputUpdate" ng-show="arrive">
                                    <input type="radio" name="eventMore" value="aiport" /> Airport&nbsp;
                                    <input type="radio" name="eventMore" value="station" /> Station&nbsp;
                                </td>
                                
                                <td class="inputUpdate" ng-show="register">
                                    <select name="desStation">
                                        <?php
                                            if(!empty($getstations))
                                            {
                                                foreach($getstations as $gs)
                                                {
                                        ?>
                                        <option value="<?php echo $gs['station_description']; ?>"><?php echo $gs['station_description']; ?></option>
                                        
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr ng-show="delivered">
                                <td class="lblUpdate"><label for="signedName">Signed Name: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" name="signedName" id="signedName" /></td>
                            </tr>
                            
                            <tr>
                                <td class="lblUpdate"><label for="remark">Remark: </label></td>
                                <td class="inputUpdate textUpdate"><input type="text" name="remark" id="remark" /></td>
                            </tr>
                            
                            <tr>
                                <td><label for="trackcode">Tracking code: </label></td> 
                                <td class="inputUpdate textUpdate"><input type="text" name="trackcode" id="trackcode"/></td>                             
                            </tr>
                        </table>
                        
                        <p class="btnUpdate"><input type="submit" name="updateshipping" value="Update" class="btn btn-default"/></p>
                    </form>
                <?php
                            }
                        }
                    }
                ?>
                </div>      
            </div>
    </body>
</html>