<?php
session_start();
error_reporting(0);
include("Dbcon.php");

if(($_REQUEST['error'])=='nologin')
    $logininfo="Please Sign In to Continue";
else if(($_REQUEST['error'])=='forgetpass')
    $logininfo="Please contact the nearest branch";
if(isset($_SESSION['customerid']))
{
	header("Location: AccAlerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: Admin.php");
}
if ((isset($_REQUEST['login'])))
{
$password = mysql_real_escape_string($_REQUEST['password']);
$logid= mysql_real_escape_string($_REQUEST['login']);
$query="SELECT * FROM customers WHERE LoginID='$logid' AND AccPass='$password'";
$res=  mysql_query($query);
if(mysql_num_rows($res) == 1)
	{
		while($recarr = mysql_fetch_array($res))
		{
			
		$_SESSION['customerid'] = $recarr['CustomerID'];
		$_SESSION['ifsccode'] = $recarr['IFSCCode'];
		$_SESSION['customername'] = $recarr['FirstName']. " ". $recarr['LastName'];
		$_SESSION['loginid'] = $recarr['LoginID'];
		$_SESSION['accstatus'] = $recarr['AccStatus'];
		$_SESSION['accopendate'] = $recarr['AccOpenDate'];
		$_SESSION['lastlogin'] = $recarr['LastLogin'];		
		}
		$_SESSION["loginid"] =$_POST["login"];
		header("Location: AccAlerts.php");
	}
else{
	$res = mysql_query("SELECT * FROM users WHERE LoginID='$logid' AND Pass='$password'");


	if(mysql_num_rows($res) == 1)
	{
		$_SESSION["adminid"] =$_POST["login"];
		header("Location: admindashboard.php");
	}
	else
	{
		$logininfo = "Invalid Username or password entered";
	}
}
}
?>
<html>
<head>
<link href="images/bank.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S  BANK</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="toptabmenu">
    <ul id="nav">
        <li><a href="Index.php">Home</a></li>
        
        <li><a href="Register1.php">Register</a></li>
        <li><a href="Branches.php">Branches</a></li>
       
        <li><a href="Contact.php">Contact Us</a></li>
    </ul>
    
</div>
</div>


<?php 
if(isset($logininfo))
    {  echo"<div class='logmainbox' style='width:450px;'><h1>$logininfo</h1></div>"; } 
?>    
<div>
        <form action="Login.php" method="POST">
            <h1>Sign In</h1>
            <div class="loginset">
                <p>
                    <label class="Ltext">Username</label>
                    <input type="text" name="login" class="loginput">
                </p>
                <p>
                    <label class="Ltext" for="password">Password</label>
                    <input type="password" name="password" class="loginput">
                </p>
            </div>
            <p class="p-container">
                <a href="Login.php?error=forgetpass">Forgot password ?</a><br/>
                <input type="submit" name="go" id="go" value="Log in" class="loginput">
            </p>
        </form>
</div>

