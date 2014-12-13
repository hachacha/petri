<?php
//room.php
include_once("UserChecker.php");
$user_id = $_COOKIE['user_id'];
?>

<head>
	<title> ROOM <?php echo $_GET['rID']; ?> </title>
	<link rel="stylesheet" type="text/css" href="styles/workStyle.css">
	<link rel="stylesheet" type="text/css" href="styles.convL.css">
	<!--<script src="jquery-1.8.3.js"></script>-->
</head>
<html>
<body ng-app="myApp">
<?php include_once("assets/misc_incl/header.php");?>
	<?php $room_id = $_GET['rID'];
		echo $room_id;
	?>
	<div id='outerTube' ng-controller="ContentCtrl">
		<?php //include_once("PostClient.php");?>
		<div id='postTube' class='theTube'>
			<div id = "displayPost" ng-repeat="content in contents">
				<!-- for tags that were used -->
				<div id='tagBar' ng-show="content.tag">
					<span class='noTag'>Title:&nbsp;&nbsp;</span>
					<!-- <a class='isTag' onclick='useTag(\"$unescapedTag\")' alt='use this tag in your comment'>".$allPosts['tag']." </a> -->
					<a class='isTag' alt='use this tag in your comment'>{{content.tag}}</a>
				</div>
				<!-- if no tag was used.... -->
				<div id="tagBar" ng-show="!content.tag">
					<a class='noTag' alt='use this tag in your comment'>no title</a>
				</div>

				<div id='IDs'>
					<button type='button' onclick='pushit()'>#{{content.post_id}}</button>
					<a ng-show="content.reply" href="#">reply to: {{content.reply}}</a>
				</div>

				<div id="delete"> 
					{{hourAgo(content.datetime)}}
				</div>
				<div id="thumbnail" ng-show="content.ipthumb + content.iNSFW.equals(0)">
					so safe
				</div>
				<div id="thumbnail" ng-show="content.ipthumb + content.iNSFW.equals(1)">
					NOT SAFE FOR WORK
				</div>
				<div id="content">
					{{content.tpc}}
					{{content.ipc}}
					{{content.fpc}}
					{{content.lpc}}
					{{content.spc}}
				</div>

			</div>
	</div>
	<div id="uInput">
	</div>
	<script src="lib/jquery.min.js"></script>
	<script src="lib/angular.js"></script>
	<script>
	var myApp = angular.module("myApp",[]);
	myApp.controller('ContentCtrl', ['$scope', '$http', function ($scope, $http) {
		var rID = window.location.search.slice(5);
		console.log(rID);
		$http.get('/new_petri/PostClient.php?rID='+rID)
   		.success(function(data) {
   			console.log(data);
    	   	$scope.contents = data;
    	   	$scope.hourAgo = function(posted_on){
    	   		an_hour = 3600;
    	   		now=new Date().getTime();
    	   		if( posted_on > (now-an_hour)){//if the post is from over an hour ago
    	   			return "you can delete me";
    	   		}
    	   		else{
    	   			var post_date = new Date(posted_on*1000);
    	   			post_date = post_date.toGMTString();
    	   			post_date = post_date.substr(0,post_date.length-4);
    	   			return  post_date; //+ "  " +this.content.post_id;	
    	   		}
			}//hourAgo func
			
		});//success

	}]);//controller
	</script>
</body>
</html>