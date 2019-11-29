<?php
session_start();
error_reporting(0);
include("Dbcon.php");
if(!(isset($_SESSION['customerid'])))
    header('Location:Login.php?error=nologin');


$result = mysql_query("select * from registered_payee WHERE CustomerID='".$_SESSION['customerid']."'");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOSER'S BANK</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<link href="images/bank.ico" rel="shortcut icon">
</head>
<body>
    <img id="contain" src="images/bank1.png">

    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/image1.jpg" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Loser's Bank</span></a></h1>
   
            
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
        <h2>Fund Transfer</h2>

        	<form id="form1" name="form1" method="post" action="">
        	  <p style="font-size:18px;">Fund Transfer menu enables you to make transactions between your different accounts as well as making transaction to a third party. You can even make an enquiry about your transfers and view the pending transfers through this menu.</p>
       	  </form>
     		
    </div>
    
    <div id="sidebar">
         <h2>Transfer Funds</h2>
                
                <ul>
                <li><a href="addextpayee.php">Add External Payee</a></li>
                <li><a href="viewextpayee.php">View registered Payee</a></li>
                <li><a href="makepayments.php">Make a Payment</a></li>
                <li><a href="TransMade.php?pst=Complete">Payments Made</a></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
