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

$date = $_SESSION['seshDate'];
$time = $_SESSION['seshTime'];
$name = $_SESSION['username'];
$sql = " SELECT DISTINCT(Time) AS Time FROM jwees1.GroupAdvising WHERE SeatsAvailable > 0 AND DATE = '$date'";
$results = mysql_query($sql, $conn);

$times = array();

while ($row = mysql_fetch_array($results)) {
  $times[] = $row['Time'];
}
$length = count($times);

if(!isset($time)){
    $time = $times[$_POST['timeSelect']];
}

$datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
$_SESSION['seshTime'] = $times[$_POST['timeSelect']];
$name = $_SESSION['username'];
if(isset($_POST['timeSelect'])) {
  $sql = "UPDATE jwees1.GroupAdvising SET  `SeatsAvailable` =  `SeatsAvailable` -1 WHERE DATE =  '$date' AND TIME = '$time'";
  $results = mysql_query($sql, $conn);
  $sql = "UPDATE jwees1.StudentRegistration SET  AppointmentTime = '$datetime' WHERE Name = '$name'";
  $results = mysql_query($sql, $conn);
  header('Location: Success.html');
}

ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
mysql_close($conn);
?>

<head>
	<title>Advising Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>

	<div style="text-align: center;">
	<div style="box-sizing: border-box; display: inline-block; width: 475px; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
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
<form action="groupTime.php" method="post">
<input type="hidden" name="action" value="login">
<input type="hidden" name="hide" value="">
<table class='center'>
<h3 style="margin-top:-10px">Please select between individual<br> and group advising:</h3>
<tr>
<div class="dropdown dropdown-dark">
    <select name="advisingType" class="dropdown-select">
        <option selected>Group Advising</option>
        <option>Individual Advising</option>
    </select>
</div></tr><br><br>
<h3 style="margin-top:-5px" id="selectDayText">Please select a day for advising:</h3><br>
<tr>
<div style="margin-top:-15px" class="dropdown dropdown-dark">
    <select  name="dateSelect" id="daySelect" class="dropdown-select">
	<option value="<?php echo $date ?>" selected><?php echo $date ?></option>
    </select>
</div></tr><br><br>
<h3 style="margin-top:-5px" id="selectTimeText">Please select a time for advising:</h3><br>
<tr>
<div style="margin-top:-15px" class="dropdown dropdown-dark">
    <select name="timeSelect" id="timeSelect" class="dropdown-select" onchange="this.form.submit()">
        <option selected disabled hidden value=''></option>						     
  	<?php foreach($times as $key => $value) { ?> <option value="<?php echo $key ?>"><?php echo $value ?></option><?php }?>
    </select>
</div></tr><br><br>
</form>
</div></div></div>
<body bgcolor="#003366">
