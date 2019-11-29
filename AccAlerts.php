<?php
session_start();
error_reporting(0);

include("Dbcon.php");
$dts = date("Y-m-d h:i:s");
mysql_query("UPDATE customers SET LastLogin='$dts' WHERE CustomerID='".$_SESSION['customerid']."'");
$sqlq = mysql_query("select * from transactions where PaymentStat='Pending'");
$mailreq = mysql_query("select * from mail where ReceiverID='".$_SESSION['customerid']."'");
?>
<html>
<head>
<link href="images/bank.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANK</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <img id="contain" src="images/bank1.png">
    
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
     
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="Index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>Hi <?php echo $_SESSION[customername]; ?> !!! Welcome To Your Account</span></a></h1>
            
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div id="toptabmenu">
    <ul>
            <li><a href="AccAlerts.php">My accounts</a></li>
            <li><a href="TransferFunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspassword.php">Personalise</a></li>
            <li><a href="Logout.php">logout</a></li>
    </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <h2>Alerts and messages</h2>
     		 <table width="548" border="0" id="maintable">
     		   <tr>
     		     <td width="293">Customer Name</td>
     		     <td width="245"><?php echo $_SESSION[customername]; ?></td>
   		     </tr>
     		   <tr>
     		     <td>Branch code</td>
     		     <td><?php echo $_SESSION[ifsccode];?></td>
   		     </tr>
     		   <tr>
     		     <td>User logged in</td>
     		     <td><?php echo $_SESSION[lastlogin]; ?> </td>
   		     </tr>
     		   <tr>
     		     <td>Pending payments</td>
     		     <td><?php echo mysql_num_rows($sqlq); ?></td>
   		     </tr>
     		   <tr>
     		     <td>Unread mails</td>
     		     <td><?php echo mysql_num_rows($mailreq); ?></td>
   		     </tr>
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


<?php include'Footer.php' ?>
    </div>
</body>
</html>
