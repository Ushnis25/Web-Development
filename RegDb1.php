<?php
require 'Dbcon.php';
error_reporting(0);
if(isset($_SESSION['customerid']))
{
	header("Location: AccAlerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: Admin.php");
}
$fname=mysql_real_escape_string($_REQUEST["Fname"]);
$lname=mysql_real_escape_string($_REQUEST["Lname"]);
$uname=mysql_real_escape_string($_REQUEST["Uname"]);
$mnum=mysql_real_escape_string($_REQUEST["Mnum"]);
$email=mysql_real_escape_string($_REQUEST["Email"]);
$city=mysql_real_escape_string($_REQUEST["City"]);
$state=mysql_real_escape_string($_REQUEST["State"]);
$country=mysql_real_escape_string($_REQUEST["Country"]);
$gen=mysql_real_escape_string($_REQUEST["Gender"]);
$pwd=mysql_real_escape_string($_REQUEST["Pwd"]);
$cpwd=mysql_real_escape_string($_REQUEST["Cpwd"]);
$trpwd=mysql_real_escape_string($_REQUEST["TrPwd"]);
$trcpwd=mysql_real_escape_string($_REQUEST["TrCpwd"]);
$accstatus=mysql_real_escape_string($_REQUEST["accstatus"]);
$acctype=mysql_real_escape_string($_REQUEST["acctype"]);
$date= mysql_real_escape_string(date('d-m-Y'));

$Loc='Location:Register1.php?';
$flag=0;
{
if ((!($fname))||(substr($fname, 0, 1)==' '))
{ $Loc=$Loc."fnameset=1&"; $flag=1;}
if ((!($lname))||(substr($lname, 0, 1)==' '))
{ $Loc=$Loc."lnameset=1&"; $flag=1; }
if ((!($uname))||(substr($uname, 0, 1)==' ')||(!($uname==mysql_escape_string($uname)))||(!($uname==trim($uname))))
{ $Loc=$Loc."unameset=1&"; $flag=1; }
if ((!($pwd))||(!($pwd==mysql_escape_string($pwd))))
{ $Loc=$Loc."pwdset=1&"; $flag=1; }
if ((!($trpwd))||(!($trpwd==mysql_escape_string($trpwd))))
{ $Loc=$Loc."trpwdset=1&"; $flag=1;}
if ((!($mnum))||(substr($mnum, 0, 1)==' '))
{ $Loc=$Loc."mnumset=1&"; $flag=1;}

}
if ($flag==1)
{
    $month=$month-1;
    header($Loc.'Fname='.$fname.'&Lname='.$lname.'&Email='.$email.'&Uname='.$uname.'&city='.$city.'&state='.$state.'&country='.$country.'&gen='.$gen.'&Mnum='.$mnum.'&error=1');
    exit(0);
}
if ((!($pwd==$cpwd))||(!($trpwd==$trcpwd)))
{   
header($Loc.'Fname='.$fname.'&Lname='.$lname.'&Email='.$email.'&Uname='.$uname.'&day='.$day.'&Mnum='.$mnum.'&month='.$month.'&year='.$year.'&gen='.$gen.'&mnum='.$mnum.'&error=2'); exit(0);
}
if(isset($_POST['button']))
{
    $query="SELECT * FROM users WHERE  LoginID='".$uname."'";
    $qresult=mysql_query($query);
    $num_rows = mysql_num_rows($qresult);
    
    if($num_rows>0)
    {
        header('Location:Register1.php?error=2'); exit(0);
    }
    
    $query="SELECT * FROM accounts WHERE  AccNo= '".$mnum."'";
    $qresult=mysql_query($query);
    $num_rows = mysql_num_rows($qresult);
    
    if($num_rows>0)
    {
        header('Location:Register1.php?error=3'); exit(0);
    }
    
		
        $sql = "INSERT INTO customers(CustomerID,IFSCCode,FirstName,LastName,AccNo,LoginID,AccPass,TransPass,AccStatus,City,State,Country,AccOpenDate) VALUES('$_SESSION[customerid]','$_POST[Email]','$_POST[Fname]','$_POST[Lname]','$_POST[Mnum]','$_POST[Uname]','$_POST[Pwd]','$_POST[TrPwd]','$_POST[accstatus]','$_POST[City]','$_POST[State]','$_POST[Country]','$date')";
         if (!mysql_query($sql))
	  {
	  die('Error: ' . mysql_error());
	  }

       $sql1="INSERT INTO accounts(AccNo,CustomerID,AccStatus,AccOpenDate,AccType,AccBalance) VALUES ('$_POST[Mnum]','$_SESSION[customerid]','$_POST[accstatus]','$date','$_POST[acctype]','1000')";
        if (!mysql_query($sql1))
	  {
	  die('Error: ' . mysql_error());
	  }
		
		$sql2 = "INSERT INTO users(UserID,UserName,LoginID,Pass,CreateDate)VALUES('$_SESSION[customerid]','$_POST[Fname]','$_POST[Mnum]','$_POST[Pwd]','$date')";
		if (!mysql_query($sql2))
	  {
	  die('Error: ' . mysql_error());
	  }
        header('Location:Register1.php?success=1');
        exit(0);
   }


?>