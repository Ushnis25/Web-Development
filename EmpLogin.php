<?php
session_start();

include("Dbcon.php");
if(isset($_SESSION['employeeid']))
{
	header("Location: EmpAcc.php");
}
if(isset($_SESSION['adminid']))
{
	header("Location: Admin.php");
}

if(isset($_REQUEST['loginadmin']))
{
		//coding for login the employee account
	$password = mysql_real_escape_string($_REQUEST['password']);
$logid= mysql_real_escape_string($_REQUEST['login']);
$query = mysql_query("SELECT * FROM users WHERE LoginID='$logid' AND Pass='$password'");
$result=mysql_query($query);
	if(mysql_num_rows($result) == 1)
	{
		while($recarr=mysql_fetch_array($result))
		{
		$_SESSION['adminid'] =$recarr['UserID'];
		}
		header("Location: Admin.php");
		
	}
	else
	{
		$logininfo = "Invalid Username or password entered";
	}
}

if(isset($_REQUEST['loginemp']))
{
		//coding for login the user account
$password = mysql_real_escape_string($_REQUEST['password']);
$logid= mysql_real_escape_string($_REQUEST['login']);
$query = mysql_query("SELECT * FROM users WHERE LoginID='$logid' AND Pass='$password'");
$result=mysql_query($query);
	if(mysql_num_rows($result) == 1)
	{
		while($recarr=mysql_fetch_array($result))
		{
		$_SESSION['userid'] =$recarr['UserID'];
		}
		header("Location: EmpAcc.php");
		
	}
	else
	{
		$logininfo1 = "Invalid Username or password entered";
	}
}
?>
