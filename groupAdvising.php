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

$sql = " SELECT DISTINCT(Date) AS Date FROM jwees1.GroupAdvising WHERE SeatsAvailable > 0 ";
$groupResults = mysql_query($sql, $conn);

$groupDay = array();

while ($row = mysql_fetch_array($groupResults)) {
  $groupDay[] = $row['Date'];
}

$length = count($groupTimes);

$_SESSION['seshDate'] = $groupDay[$_POST['dateSelect']];

//print($groupDay[$_POST['dateSelect']]);

if(isset($_POST['dateSelect'])) {
  header('Location: groupTime.php');
}

?>

<head>
<title>Advising Login</title>
</head>

	<div style="text-align: center;">
	<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
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
<form action="groupAdvising.php" method="post">
<input type="hidden" name="action" value="login">
<input type="hidden" name="hide" value="">
<table class='center'>
<a>Please select between individual and group advising</a>!
<tr><select name="advisingType" id="advisingStyle" style="border-radius: 5px; background-color:#2EB82E">
    <option selected>Group Advising</option>
    <option>Individual Advising</option>
  </select></tr><br><br>
<a id="selectDayText">Please select a day for advising!</a><br>
<tr><select name="dateSelect" id="daySelect" style="border-radius: 5px; background-color:#2EB82E;" onchange="this.form.submit()">
<option selected disabled hidden value=''></option>
<?php foreach($groupDay as $key => $value) { ?><option value="<?php echo $key ?>"><?php echo $value ?></option><?php }?>
  </select></tr><br><br>
</form>
</div></div></div>
<body bgcolor="#003366">

<script>
function fillAdvisingSelect(){
	var e = document.getElementById("advisingStyle");
    var choice = e.options[e.selectedIndex].text;
	if(choice == "Group Advising"){
		/* var parent = document.getElementById("advisors");
		var child = document.getElementById("selectAdvisorText");
		var child2 = document.getElementById("advisorSelect");
		parent.removeChild(child);
		child2.parentNode.removeChild(child2); */
		document.getElementById("selectAdvisorText").style.visibility = "hidden";
		document.getElementById("advisorSelect").style.visibility = "hidden";
		document.getElementById("selectDayText").style.visibility = "visible";
		document.getElementById("daySelect").style.visibility = "visible";
	} else {
		document.getElementById("selectDayText").style.visibility = "hidden";
		document.getElementById("daySelect").style.visibility = "hidden";
		document.getElementById("selectAdvisorText").style.visibility = "visible";
		document.getElementById("advisorSelect").style.visibility = "visible";
	}
}

function daySelects(){
	document.getElementById("selectDayText").style.visibility = "visible";
	document.getElementById("daySelect").style.visibility = "visible";
}

function timeSelects(){
	document.getElementById("selectTimeText").style.visibility = "visible";
	document.getElementById("timeSelect").style.visibility = "visible";
}


</script>