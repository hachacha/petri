<?php include_once("UserChecker.php"); ?>

<html>
<head>
<title>map</title>
<link href="styles/map.css" type="text/css" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='overArch.css'>
</head>

<body ng-app="myApp">
	<?php include_once("assets/misc_incl/header.php");?>
 <div ng-controller="ContentCtrl" class="roomRun">
   <div id="col1" ng-repeat="content in contents">
       <a ng-href="room.php?rID={{content.room_id}}">room# {{content.room_id}}:&nbsp;<span class="gold">{{content.t1}}</span>,&nbsp;&nbsp;&nbsp;<span class="silver">{{content.t2}}</span>,&nbsp;&nbsp;&nbsp;<span class="bronze">{{content.t3}}</span></a>		
    </div>
 </div>
</body>

<script src="lib/jquery.min.js"></script>
<script src="lib/angular.js"></script>
<script type="text/javascript">
var myApp = angular.module("myApp",[]);
myApp.controller('ContentCtrl', ['$scope', '$http', function ($scope, $http) {
    $http.get('/new_petri/RoomClient.php')
    .success(function(data) {
    	console.log(data);
        $scope.contents = data;
    });
}]);
</script>
</body>
</html>