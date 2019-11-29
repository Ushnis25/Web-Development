<?php
session_start();
error_reporting(0);
include("Dbcon.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:Login.php?error=nologin');

$results = mysql_query("SELECT * FROM accounts WHERE  CustomerID='$_SESSION[customerid]'");
?>
<html>
<head>
<link href="images/bank.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Loser's Bank</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <img id="contain" src="images/bank1.png">
   
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/netbanking1.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Losers' Bank</span></a></h1>
            
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div id="toptabmenu">
    <ul>
            <li><a href="AccAlerts.php">My accounts</a></li>
            <li><a href="TransferFunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspass.php">Personalise</a></li>
            <li><a href="Logout.php">logout</a></li>
    </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <h2 align="center">ACCOUNTS SUMMARY</h2>
     		 <table width="616" border="1">
     		   <tr>
     		     <th scope="col">ACCOUNT TYPE</th>
     		     <th scope="col">NAME</th>
     		     <th scope="col">ACCOUNT NUMBER</th>
     		     <th scope="col">BRANCH</th>
     		     <th scope="col">CURRENCY</th>
     		     <th scope="col">A/C BALANCE</th>
   		     </tr> 
             <?php
			 while($arrow = mysql_fetch_array($results))
			{
				echo "<tr><td>$arrow[AccType]</td>
     		     <td>$_SESSION[customername]</td>
     		     <td>$arrow[AccNo]</td>
     		     <td>$_SESSION[IFSCCode]</td>
     		     <td>INR</td>
     		     <td>$arrow[AccBalance]</td></tr>";
			}
		   ?>
     		 </table>
    </div>
    
    <div id="sidebar">
        <h2>My Accounts</h2>
               
                <ul>
                <li><a href="AccSummary.php">Accounts summary</a></li>
                <li><a href="ministatements.php">Mini statement</a></li>
                <li><a href="accdetails.php">Account details</a></li>
                <li><a href="stateacc.php">Statements of accounts</a><p>&nbsp;</p></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
