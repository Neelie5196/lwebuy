var app = angular.module("myApp",[]);
    app.controller("getCtrl", function($scope, $http) {
        $http.get('http://api.unixus.com.my/Tracking/V2/Tracking.svc/json/156130504281743')
        .then (
            function(response) {
                $scope.units = response.data;
            },
            function(response) {
            // error handling routine
            });
    });