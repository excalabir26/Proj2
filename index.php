<head>
	<title>Advising Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<div id="myContainer">
<div style="text-align: center;">
<div id="mainDiv" style="box-sizing: border-box; display: inline-block; width: 400px; max-width: 980px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Registration Advising Login</span></div>
<div style="background: ; padding: 15px">
	<img id="backgroundImage" src="http://userpages.umbc.edu/~jwees1/CMSC331/Project1/UMBCretrievers_LOGO.png" style="z-index:-100" width="200" height="200">
	<style type="text/css" scoped>
	td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
	input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; text-align:right; margin-top: 10px; margin-left:7px;}
	table.center { margin-left:auto; margin-right:auto; }
	.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>
	<h3 style="margin-top:-10px">Please select between student <br>and advisor login:</h3>
	<a href="http://userpages.umbc.edu/~jwees1/CMSC331/Project1/studentLogin.php" class="button black" style="width:100px;">Student Login</a><br>
	<br><a href="index.html" class="button black" style="width:100px;">Advisor Login</a>
</div></div></div>
</div>
<body bgcolor="#003366">

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
	window.open ('advisingType.php', 'newwindow', config='height=400, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=0, location=0, directories=no, status=no, top = ' + top + ' left = ' + left + ' ');   
    return false;
  }
}

setTimeout(detectmob, 5);
</script>

<style>
    //div.zoomed { zoom: 3; -moz-transform: scale(3); -moz-transform-origin: 0 0}
    //#mainDiv{
//    zoom: 1.5;
//    -moz-transform: scale(0.5);
//}

</style>
