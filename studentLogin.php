<?php
$servername = "studentdb.gl.umbc.edu";
$username = "jwees1";
$password = "jwees1";
$dbname = "jwees1";
session_start();

$conn = mysql_connect($servername, $username, $password);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$val1 = $_POST['Name'];

$val2 = $_POST['ID'];

$val3 = $_POST['Major'];
$sql="";

if(isset($val1)){ 
	$sql = "REPLACE INTO jwees1.StudentRegistration SET Name ='$val1', ID = '$val2', Major = '$val3', AppointmentTime = '0000-00-00 00:00:00'";
	}
	
$retval = mysql_query( $sql, $conn );

$_SESSION['username'] = $_POST['Name'];
	   
mysql_select_db('jwees1');

mysql_close($conn);
if(isset($_POST['Name'])) {
  header('Location: advisingType.php'); 
}

ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
?>

<head>
	<title>Advising Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>

	<div style="text-align: center;">
	<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
	<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Registration Advising Login</span></div>
	<div style="background: ; padding: 15px">
	<img id="backgroundImage" src="http://userpages.umbc.edu/~jwees1/CMSC331/Project1/UMBCretrievers_LOGO.png" style="z-index:-100" width="200" height="200">
	<style type="text/css" scoped>
	td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
	
	table.center { margin-left:auto; margin-right:auto; }
	.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>
<form action="studentLogin.php" method="post">
<table class='center'>
<tr><td>Name:</td><td><input type="text" name="Name"></td></tr>
<tr><td>UMBC ID#:</td><td><input type="password" name="ID"></td></tr>
<tr><td>Major:</td><td><select name="Major">
<option value="ACTG  BFA">Acting - BFA</option>
<option value="AFST  BA">Africana Studies - BA</option>
<option value="AMST  BA">American Studies - BA</option>
<option value="ANCS  BA">Ancient Studies - BA</option>
<option value="ASIA    BA">Asian Studies - BA</option>
<option value="BIOC  BS">Biochem &amp; Molec Biology - BS</option>
<option value="BINF  BS">Bioinformatics &amp; Comp Bio - BS</option>
<option value="BIOL  BA">Biological Sciences - BA</option>
<option value="BIOL  BS">Biological Sciences - BS</option>
<option value="BTA   BA">Business Tech Admin - BA</option>
<option value="CENG  BS">Chemical Engineering</option>
<option value="CHEM  BA">Chemistry - BA</option>
<option value="CHEM  BS">Chemistry - BS</option>
<option value="CHED    BA">Chemistry Education</option>
<option value="CMPE  BS" >Computer Engineering - BS</option>
<option value="CMSC  BS" selected="selected">Computer Science - BS</option>
<option value="ANTH  BA">Cultural Anthropology - BA</option>
<option value="DANC  BA">Dance - BA</option>
<option value="DSGN   BFA">Design</option>
<option value="ECON  BA">Economics - BA</option>
<option value="EHS   BS">Emergency Health Services - BS</option>
<option value="ENGL  BA">English - BA</option>
<option value="ENSC  BS">Environmental Science - BS</option>
<option value="FIEC  BS">Financial Economics - BS</option>
<option value="GWST    BA">Gender &amp; Women's Studies - BA</option>
<option value="HAPP  BA">HealthAdmin &amp; Policy Prog - BA</option>
<option value="HIST  BA">History - BA</option>
<option value="IFSM  BS">Information Systems - BS</option>
<option value="MATH  BA">Mathematics - BA</option>
<option value="MATH  BS">Mathematics - BS</option>
<option value="MENG  BS">Mechanical Engineering - BS</option>
<option value="MCS     BA">Media &amp; Communication Studies</option>
<option value="MAGS  BA">Mngmnt of Aging Services - BA</option>
<option value="MLL   BA">Modern Lang &amp; Linguistics - BA</option>
<option value="MLL2   BA">Modern Languages &amp; Ling BA</option>
<option value="MUSC  BA">Music - BA</option>
<option value="PHIL  BA">Philosophy - BA</option>
<option value="PHYS  BS">Physics - BS</option>
<option value="PHSE    BA">Physics Education</option>
<option value="POLI  BA">Political Science - BA</option>
<option value="PSYC  BA">Psychology - BA</option>
<option value="PSYC  BS">Psychology - BS</option>
<option value="SOWK  BA">Social Work - BA</option>
<option value="SOCY  BA">Sociology - BA</option>
<option value="STAT  BS">Statistics - BS</option>
<option value="THTR  BA">Theatre - BA</option>
<option value="VAAV    BA">Visual Arts</option>
<option value="VAAV  BFA">Visual Arts BFA</option>
</select></td></tr>

<tr><td colspan=2>&nbsp;</td></tr>
<tr><td colspan=2><a>New users will autogenerate a new account</a>!</td></tr>
</table><br>
<input class="button black" type="submit" value="Submit" style="width:75px;">
</form>
</div></div></div>
<body bgcolor="#003366">

