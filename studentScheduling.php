<?php
$servername = "studentdb.gl.umbc.edu";
$username = "jwees1";
$password = "jwees1";
$dbname = "jwees1";

session_start();

$conn = mysql_connect($servername, $username, $password, $dbname);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$name = $name = $_SESSION['username'];
$advisor = $_SESSION['seshAdvisor'];
$date = $_SESSION['seshDate'];
$time = $_SESSION['seshTime'];

$sql = "SELECT DISTINCT(Time) AS Time FROM jwees1.IndividualAdvising WHERE Advisor = '$advisor' AND Full = 0 AND Date = '$date'";
$dateResults = mysql_query($sql, $conn);

$times = array();

while ($row = mysql_fetch_array($dateResults)) {
  $times[] = $row['Time'];
}

$_SESSION['seshTime'] = $times[$_POST['timeSelect']];

$datetime = date('Y-m-d H:i:s', strtotime("$date $time"));

if(isset($_POST['timeSelect'])) {
  $sql = "UPDATE jwees1.IndividualAdvising SET  Full =  1 WHERE DATE =  '$date' AND TIME = '$time' AND ADVISOR = '$advisor'";
  $results = mysql_query($sql, $conn);
  $sql = "UPDATE jwees1.StudentRegistration SET  AppointmentTime = '$datetime' WHERE Name = '$name'";
  $results = mysql_query($sql, $conn);
  header('Location: Success.html');
}

?>
<head>
	<title>Advising Login</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="datepicker/jquery-ui.css">
	<script src="datepicker/jquery-ui.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

	<div style="text-align: center;">
	<div id="mainDiv" style="box-sizing: border-box; display: inline-block; width: 475px; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
	<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Registration Advising Sign Up</span></div>
	<div style="background: ; padding: 15px">
	<img id="backgroundImage" src="http://userpages.umbc.edu/~jwees1/CMSC331/Project1/UMBCretrievers_LOGO.png" style="z-index:-100; margin-top:-10px" width="200" height="200">
	<style type="text/css" scoped>
	td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
	table.center { margin-left:auto; margin-right:auto; }
	.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>
<form action="test.php" method="post">
<input type="hidden" name="action" value="login">
<input type="hidden" name="hide" value="">
<table class='center'>
<h3 style="margin-top:-10px">Please select between individual<br> and group advising:</h3>
<tr>
<div style="margin-top:-5px" class="dropdown dropdown-dark">
    <select name="advisingType" id="advisingStyle" class="dropdown-select">
        <option selected>Group Advising</option>
        <option>Individual Advising</option>
    </select>
</div></tr><br><br>
<h3 style="margin-top:-5px" id="selectAdvisorText">Please select your advisor:</h3><br>
<tr>
<div style="margin-top:-5%" class="dropdown dropdown-dark">
    <select name="advisorSelect" id="advisorSelect" class="dropdown-select" >
	<option value="<?php echo $advisor ?>" selected><?php echo $advisor ?></option>
    </select>
</div></tr><br><br>
<h3 style="margin-top:-5px" id="selectDayText" >Please select a date range for advising:</h3><br>
<tr style="margin-top:-30px">
<div style="margin-top:-40px">
<h3 style="margin-left:-55px;">From: <input style="width:150px;" type="text" class="datepicker" id="datepicker1"></h3><h3 style="margin-left:-30px;">To: <input style="width:150px;" type="text" class="datepicker" id="datepicker2"></h3>
</div>
</tr><br><br>
<h3 style="margin-top:-40px" id="selectTimeText">Please select a time range for advising:</h3><br>
<tr>
<h3 style="margin-left:-55px; display:inline">From:</h3>
<div style="margin-left:10px; margin-top:-40px" class="dropdown dropdown-dark">
    <select name="timeSelect" id="timeSelect" class="dropdown-select" onchange="this.form.submit()">
	<option selected disabled hidden value=''></option>							     
	<?php foreach($times as $key => $value) { ?> <option value="<?php echo $key ?>"><?php echo $value ?></option><?php }?>
    </select>
</div><br>

<h3 display="inline" style="margin-left:-30px; display:inline; ">To:
<div style="margin-top:20px; margin-left:8px" class="dropdown dropdown-dark">
	
    <select  name="timeSelect" id="timeSelect" class="dropdown-select" onchange="this.form.submit()">
	<option selected disabled hidden value=''></option>							     
	<?php foreach($times as $key => $value) { ?> <option value="<?php echo $key ?>"><?php echo $value ?></option><?php }?>
    </select>
</div>
</h3>
</tr><br><br>
</table>
<input class="button black" type="submit" value="Submit" style="width:75px;">
</form>
</div></div></div>
<body bgcolor="#003366">


  

  <script>
  $(function() {
    $( "#datepicker1" ).datepicker();
  });
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
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
   var scale = window.innerWidth / (475*1.1);
   document.getElementById("mainDiv").style.zoom = scale;
   //document.getElementById("pageDiv").zoomed { zoom: 3; -moz-transform: scale(3); -moz-transform-origin: 0 0}
    return true;
  }
 else {
    wLeft = window.screenLeft ? window.screenLeft : window.screenX;
    wTop = window.screenTop ? window.screenTop : window.screenY;

    var left = wLeft + (window.innerWidth / 2) - (475 / 2);
    var top = wTop + (window.innerHeight / 2) - (475 / 2);
	//window.open ('advisingType.php', 'newwindow', config='height=400, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=0, location=0, directories=no, status=no, top = ' + top + ' left = ' + left + ' ');   
    return false;
  }
}

setTimeout(detectmob, 5);
  </script>