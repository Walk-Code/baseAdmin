<?php

?>

<script type="text/javascript">
    console.log(1111);
    //jq

    var app = angular.module('app', ['ngSanitize']);//引入解析html module
    app.controller("Mybody", function ($scope, $http) {
        httpUtilsInit($scope, $http);

        $scope.test = function () {
            $scope.ajax({
                method: 'GET',
                url: '/scheduleManagement/list?page=0&searchText=&startDate=&endDate=&nature=0&trialStatus=0&classStatus=0&evaluation=0&type=0',
                data: $.param({

                }),
                loadingShow : true,
                success: function (status, data) {
                    
                },
                error: function (status, data) {
                    
                }
            });
        };

        $scope.test();
    });
</script>