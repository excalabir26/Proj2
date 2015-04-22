<?php
$servername = "studentdb.gl.umbc.edu";
$username = "jwees1";
$password = "jwees1";
$dbname = "jwees1";

session_start();

$conn = mysql_connect($servername, $username, $password, $dbname);

$type = $_POST['advisingType'];

if($type == "Group Advising") {
  header('Location: groupAdvising.php');
}

if($type == "Individual Advising") {
  header('Location: individualAdvising.php');
}

ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);

$name = $_SESSION['username'];
$studentID = $_SESSION['studentID'];
$sql = "SELECT AppointmentTime FROM jwees1.StudentRegistration WHERE Name = '$name' and ID='$studentID'";
$hasAppointment = mysql_query($sql, $conn);
$firstrow = mysql_fetch_object($hasAppointment);
$phpdate = strtotime( $firstrow->AppointmentTime);
$aptmtTime = date( 'M-d-Y', $phpdate );
$aptmtTime .= " at ";
$aptmtTime .= date('H:i:s', $phpdate );
echo'

	<head>
		<title>Advising Login</title>
		<link rel="stylesheet" href="css/style.css">
	</head>

		<div style="text-align: center;">
		<div id="mainDiv" style="box-sizing: border-box; display: inline-block; width: 475px; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
		<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Registration Advising Sign Up</span></div>
		<div style="background: ; padding: 15px">
		<img id="backgroundImage" src="http://userpages.umbc.edu/~jwees1/CMSC331/Project1/UMBCretrievers_LOGO.png" style="z-index:-100" width="200" height="200">
		<style type="text/css" scoped>
		td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
		input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
		input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; text-align:right; margin-top: 10px; margin-left:7px;}
		table.center { margin-left:auto; margin-right:auto; }
		.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
		</style>
	<form action="advisingType.php" method="post">
	<table class="center">';
if(($firstrow->AppointmentTime) == '0000-00-00 00:00:00'){
	echo '
	<h3 style="margin-top:-10px">Please select between individual<br> and group advising:</h3>
	<tr>
	<div class="dropdown dropdown-dark">
		<select name="advisingType" class="dropdown-select" onchange="this.form.submit()">
		<option selected>Select...</option>
			<option>Group Advising</option>
			<option>Individual Advising</option>
		</select>
	</div></tr><br><br>
	</form>
	</div></div></div>
	<body bgcolor="#003366">';
}else{
	echo '<h3>You currently have an advising appointment at:<br> ' . $aptmtTime . ' </h3>
			<a href="studentScheduling.php" class="button black" style="width:150px;">Reschedule</a><br><br>
			<a href="index.html" class="button red" style="width:150px;">Cancel Appointment</a>
			</form>
	</div></div></div>
	<body bgcolor="#003366">';
}
?>

<script>
function detectmob() { 
		//document.getElementById("pageDiv").zoomed { zoom: 3; -moz-transform: scale(3); -moz-transform-origin: 0 0};
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
   var scale = window.innerWidth / (400*1.1);
   document.getElementById("mainDiv").style.zoom = scale;
   //document.getElementById("pageDiv").zoomed { zoom: 3; -moz-transform: scale(3); -moz-transform-origin: 0 0}
    return true;
  }
 else {
    wLeft = window.screenLeft ? window.screenLeft : window.screenX;
    wTop = window.screenTop ? window.screenTop : window.screenY;

    var left = wLeft + (window.innerWidth / 2) - (400 / 2);
    var top = wTop + (window.innerHeight / 2) - (400 / 2);
	//window.open ('advisingType.php', 'newwindow', config='height=400, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=0, location=0, directories=no, status=no, top = ' + top + ' left = ' + left + ' ');   
    return false;
  }
}

setTimeout(detectmob, 5);
</script>